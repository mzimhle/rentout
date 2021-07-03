<?php

require_once 'File.php';

//custom account item class as account table abstraction
class class_car extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'car';
	protected $_primary			= 'car_code';
	public $_File							= null;
	
	function init()	{
		$this->_File						= new File(array('png', 'jpg', 'jpeg'));
	}
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['car_added']		= date('Y-m-d H:i:s');
        $data['car_code']		= $this->createCode();
		
		return parent::insert($data);	
    }
	
	/**
	 * Update the database record
	 * example: $table->update($data, $where);
	 * @param query string $where
	 * @param array $data
     * @return boolean
	 */
    public function update(array $data, $where)
    {
        // add a timestamp
         $data['car_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('car' => 'car'))
						->joinLeft(array('model' => 'model'), 'model.model_code = car.model_code')
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')	
						->joinLeft(array('group' => 'group'), 'group.group_code = car.group_code')
						->joinLeft(array('price' => 'price'), 'price.group_code = group.group_code')
						->joinLeft(array('image' => 'image'), "image_type = 'CAR' and image.item_code = car.car_code and image_primary = 1 and image_deleted = 0", array('image_primary', 'image_code', 'image_name', 'image_path', 'image_ext'))
						->joinLeft(array('participant' => 'participant'), 'participant.participant_code = car.participant_code')
						->where('car_deleted = 0 and group_deleted = 0 and model_deleted = 0 and make_deleted = 0 and brand_deleted = 0 and participant_deleted = 0')
						->where("price.price_enddate is null or price.price_enddate = ''")
						->order('car_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByCode($code)
	{
		$select = $this->_db->select()	
						->from(array('car' => 'car'))
						->joinLeft(array('model' => 'model'), 'model.model_code = car.model_code')
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')	
						->joinLeft(array('group' => 'group'), 'group.group_code = car.group_code')
						->joinLeft(array('price' => 'price'), 'price.group_code = group.group_code')
						->joinLeft(array('image' => 'image'), "image_type = 'CAR' and image.item_code = car.car_code and image_primary = 1 and image_deleted = 0", array('image_primary', 'image_code', 'image_name', 'image_path', 'image_ext'))
						->joinLeft(array('participant' => 'participant'), 'participant.participant_code = car.participant_code')
						->where('car_deleted = 0 and group_deleted = 0 and model_deleted = 0 and make_deleted = 0 and brand_deleted = 0 and participant_deleted = 0')
						->where("price.price_enddate is null or price.price_enddate = ''")
					   ->where('car.car_code = ?', $code)
					   ->group('car.car_code')
					   ->limit(1);
		
	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	public function search($query, $limit = 20) {
		
		$select = $this->_db->select()
						->from(array('car' => 'car'), array('car.car_code', 'car.car_year', 'car.car_description'))
						->joinLeft(array('model' => 'model'), 'model.model_code = car.model_code', array('model_name'))
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code', array('make_name'))
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code', array('brand_name'))
						->joinLeft(array('participant' => 'participant'), 'participant.participant_code = car.participant_code', array("concat(participant_name, ' ', participant_surname, ' ( ', participant_email, ' )') as car_owner"))
						->joinLeft(array('group' => 'group'), 'group.group_code = car.group_code', array('group_name'))
						->joinLeft(array('price' => 'price'), 'price.group_code = group.group_code', array('price_code', 'price_cost', new Zend_Db_Expr("MAX(price_id) AS price_id")))
						->where('car_deleted = 0 and group_deleted = 0 and model_deleted = 0 and make_deleted = 0 and brand_deleted = 0 and participant_deleted = 0')						
					   ->where("concat(brand_name, make_name, model_name, car_year) like lower(?)", "%$query%")
					   ->group('car.car_code')
					   ->limit($limit)
					   ->order("LOCATE('$query', brand_name)");
		
		$result = $this->_db->fetchAll($select);	
        return ($result == false) ? false : $result = $result;					

	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code)
	{
		$select = $this->_db->select()	
						->from(array('car' => 'car'))	
					   ->where('car_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<10;$i++){
			$reference .= $codeAlphabet[rand(0,$count)];
		}
		
		/* First check if it exists or not. */
		$itemCheck = $this->getCode($reference);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createCode();
		} else {
			return $reference;
		}
	}
	
	public function download($code, $imagesize = 'thumb') {
		
		$random = md5(date('Y-m-d H:i:s'));
		
		$carData = $this->getByCode($code);

		if($carData && isset($carData) && trim($carData['image_path']) != '') {			
			
			if(array_key_exists($imagesize, $this->_File->logo)) {
			
				$PATH 	= $_SERVER['DOCUMENT_ROOT'].$carData['image_path'].$this->_File->logo[$imagesize]['code'].$carData['image_name'].$carData['image_ext'];
				$MIME	= $this->_File->file_content_type($carData['image_path'].$this->_File->logo[$imagesize]['code'].$carData['image_name'].$carData['image_ext']);

				header("Pragma: public");
				header('Cache-Control: max-age=86400');
				header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
				header("Content-Type: " . $MIME);
				header('Content-Disposition: attachment; filename="'.$random.'"');
	 
				readfile($PATH); // outputs the content of the file;
			
				exit;
			}
		}
		
		$PATH 	= $_SERVER['DOCUMENT_ROOT'].'/images/no-image.jpg';
		
		$MIME	= $this->_File->file_content_type('/images/no-image.jpg');
		
		header("Expires: on, 01 Jan 1970 00:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Description: File Transfer");
		header("Content-Type: " . $MIME);
		header("Content-Length: " .(string)(filesize($PATH)) );
		header('Content-Disposition: attachment; filename="Avatar"');
		header("Content-Transfer-Encoding: binary\n");

		readfile($PATH); // outputs the content of the file;			
	}	
}
?>