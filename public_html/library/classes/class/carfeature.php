<?php

//custom account item class as account table abstraction
class class_carfeature extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'carfeature';
	protected $_primary			= 'carfeature_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['carfeature_added']		= date('Y-m-d H:i:s');
        $data['carfeature_code']		= $this->createCode();
		
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
         $data['carfeature_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('carfeature' => 'carfeature'))
						->joinLeft(array('car' => 'car'), 'car.car_code = carfeature.car_code')
						->joinLeft(array('feature' => 'feature'), 'feature.feature_code = carfeature.feature_code')
						->where('carfeature_deleted = 0 and car_deleted = 0 and feature_deleted = 0')
						->order('carfeature_deleted desc');

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
						->from(array('carfeature' => 'carfeature'))
						->joinLeft(array('car' => 'car'), 'car.car_code = carfeature.car_code')
						->joinLeft(array('feature' => 'feature'), 'feature.feature_code = carfeature.feature_code')
						->where('carfeature_deleted = 0 and car_deleted = 0 and feature_deleted = 0')
					   ->where('carfeature.carfeature_code = ?', $code)
					   ->limit(1);
		
	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByCar($code, $featurecode = null)
	{
		if($featurecode == null) {
			$select = $this->_db->select()	
							->from(array('carfeature' => 'carfeature'))
							->joinLeft(array('car' => 'car'), 'car.car_code = carfeature.car_code')
							->joinLeft(array('feature' => 'feature'), 'feature.feature_code = carfeature.feature_code')
							->where('carfeature_deleted = 0 and car_deleted = 0 and feature_deleted = 0')
							->where('carfeature.car_code = ?', $code);
			 $result = $this->_db->fetchAll($select);	
		} else {			
			$select = $this->_db->select()	
							->from(array('carfeature' => 'carfeature'))
							->joinLeft(array('car' => 'car'), 'car.car_code = carfeature.car_code')
							->joinLeft(array('feature' => 'feature'), 'feature.feature_code = carfeature.feature_code')
							->where('carfeature_deleted = 0 and car_deleted = 0 and feature_deleted = 0')
							->where('carfeature.car_code = ?', $code)
							->where('carfeature.feature_code = ?', $featurecode)
							->limit(1);
			$result = $this->_db->fetchRow($select);	
		}
					   
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
						->from(array('carfeature' => 'carfeature'))	
					   ->where('carfeature_code = ?', $code)
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
	
}
?>