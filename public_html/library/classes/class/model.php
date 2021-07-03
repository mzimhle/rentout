<?php

require_once 'File.php';

//custom account item class as account table abstraction
class class_model extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'model';
	protected $_primary			= 'model_code';
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
        $data['model_added']		= date('Y-m-d H:i:s');
        $data['model_code']		= $this->createCode();
		
		return parent::insert($data);	
    }
	

	
	/**
	 * Update the database record
	 * example: $table->update($data, $where);
	 * @param query string $where
	 * @param array $data
     * @return boolean
	 */
    public function update(array $data, $where) {
        // add a timestamp
         $data['model_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('model' => 'model'))
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
						->where('model_deleted = 0')
						->order('model_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByMake($code)
	{
		$select = $this->_db->select()	
						->from(array('model' => 'model'))
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
						->where('model_deleted = 0')
					   ->where('model.make_code = ?', $code);
		
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
						->from(array('model' => 'model'))
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
						->where('model_deleted = 0')
					   ->where('model.model_code = ?', $code)
					   ->limit(1);
		
	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	public function search($query, $limit = 20) {
		
		$query = str_replace(' ', '', $query);
		$query = str_replace('  ', '', $query);
		$query = str_replace('   ', '', $query);
		$query = str_replace(',', '', $query);
		$query = strtolower($query);
		
		$select = $this->_db->select()	
						->from(array('model' => 'model'))
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
						->where('model_deleted = 0 and make_deleted = 0 and brand_deleted = 0')						
						->where('model_active = 1 and make_active = 1 and brand_active = 1')						
					   ->where("lower(concat(brand_name,make_name, model_trim,model_year)) like lower(?) or lower(concat(model_year,model_trim,make_name,brand_name)) like lower(?)", "%$query%")
					   ->limit($limit)
					   ->order("LOCATE('$query', brand_name)");
		
		$result = $this->_db->fetchAll($select);	
        return ($result == false) ? false : $result = $result;					

	}
	
	public function searchModels(array $queryarray, $limit = 20) {
		
		$select = $this->_db->select()
						->from(array('model' => 'model'))
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
						->where('model_deleted = 0 and make_deleted = 0 and brand_deleted = 0')						
						->where('model_active = 1 and make_active = 1 and brand_active = 1');										   
					   for($i = 0; $i < count($queryarray); $i++) {
						if($i == 0) {
							$select->where("lower(concat(model_year,model_trim,make_name,brand_name)) like lower(?)", $queryarray[$i]);
						} else {
							$select->where("lower(concat(model_year,model_trim,make_name,brand_name)) like lower(?)", $queryarray[$i]);
						}
					   }
					   $select->limit($limit);
					   $select->order("LOCATE('".$queryarray[0]."', brand_name)");

		$result = $this->_db->fetchAll($select);	
        return ($result == false) ? false : $result = $result;					

	}
	
	public function getSearch($search, $start, $length)
	{	
		if($search == '') {
		$select = $this->_db->select()	
						->from(array('model' => 'model'), array('model_added', 'model_code', 'model_name', 'model_trim', 'model_year', 'model_active'))
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code', array('make_name'))
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code', array('brand_name'))
						->joinLeft(array('car' => 'car'), 'car.model_code = model.model_code and car_deleted = 0 and car_active = 1', array('car_count' =>new Zend_Db_Expr('COUNT(car.car_code)')))							
						->where('make_deleted = 0 and brand_deleted = 0 and model_deleted = 0')
						->order('brand_name desc')
						->group('model.model_code');			 
		} else {
		$select = $this->_db->select()	
						->from(array('model' => 'model'), array('model_added', 'model_code', 'model_name', 'model_trim', 'model_year', 'model_active'))
						->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code', array('make_name'))
						->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code', array('brand_name'))
						->joinLeft(array('car' => 'car'), 'car.model_code = model.model_code and car_deleted = 0 and car_active = 1', array('car_count' =>new Zend_Db_Expr('COUNT(car.car_code)')))						
						->where('make_deleted = 0 and brand_deleted = 0 and model_deleted = 0')
						->where("lower(concat(model_name, model_trim, model_year, brand_name, make_name)) like lower(?)", "%$search%")
						->order('make_added desc')
						->group('model.model_code');			
		}

		$result_count = $this->_db->fetchRow("select count(*) as query_count from ($select) as query");

		if ($start == '' || $length == '') { 
			$result = $this->_db->fetchAll($select);
		} else { 
			$result = $this->_db->fetchAll($select . " limit $start, $length");
		}

		return ($result === false) ? false : $result = array('count'=>$result_count['query_count'],'displayrecords'=>count($result),'records'=>$result);	
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code)
	{
		$select = $this->_db->select()	
						->from(array('model' => 'model'))	
					   ->where('model_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<15;$i++){
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
		
		$modelData = $this->getByCode($code);

		if($modelData && isset($modelData) && trim($modelData['model_image_path']) != '') {			
			
			if(array_key_exists($imagesize, $this->_File->logo)) {
			
				$PATH 	= $_SERVER['DOCUMENT_ROOT'].$modelData['model_image_path'].$this->_File->logo[$imagesize]['code'].$modelData['model_image_name'].$modelData['model_image_ext'];
				$MIME	= $this->_File->file_content_type($modelData['model_image_path'].$this->_File->logo[$imagesize]['code'].$modelData['model_image_name'].$modelData['model_image_ext']);

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