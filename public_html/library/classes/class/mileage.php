<?php

//custom account item class as account table abstraction
class class_mileage extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'mileage';
	protected $_primary			= 'mileage_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['mileage_added']		= date('Y-m-d H:i:s');
        $data['mileage_code']		= $this->createCode();
		
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
         $data['mileage_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll() {
	
		$select = $this->_db->select()	
						->from(array('mileage' => 'mileage'))
						->joinLeft('car', 'car.car_code = mileage.car_code')
						->joinLeft('booking', 'booking.booking_code = mileage.booking_code and booking_deleted = 0')
						->joinLeft('mileagetype', 'mileagetype.mileagetype_code = mileage.mileagetype_code')
						->where('mileage_deleted = 0 and car_deleted = 0 and mileagetype_deleted = 0')
						->order('mileage_added desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	public function getByCar() {

		$select = $this->_db->select()	
						->from(array('mileage' => 'mileage'))
						->joinLeft('car', 'car.car_code = mileage.car_code')
						->joinLeft('booking', 'booking.booking_code = mileage.booking_code and booking_deleted = 0')
						->joinLeft('mileagetype', 'mileagetype.mileagetype_code = mileage.mileagetype_code')
						->where('mileage_deleted = 0 and car_deleted = 0 and mileagetype_deleted = 0')
						->order('mileage_added desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;

	}
	
	public function getByBooking() {

		$select = $this->_db->select()
						->from(array('mileage' => 'mileage'))
						->joinLeft('booking', 'booking.booking_code = mileage.booking_code')
						->joinLeft('mileagetype', 'mileagetype.mileagetype_code = mileage.mileagetype_code')
						->where('mileage_deleted = 0 and car_deleted = 0 and mileagetype_deleted = 0')
						->order('mileage_added desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;

	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByCode($code) {
		$select = $this->_db->select()	
						->from(array('mileage' => 'mileage'))
						->joinLeft('car', 'car.car_code = mileage.car_code')
						->joinLeft('booking', 'booking.booking_code = mileage.booking_code and booking_deleted = 0')						
						->joinLeft('mileagetype', 'mileagetype.mileagetype_code = mileage.mileagetype_code')
						->where('mileage_deleted = 0 and car_deleted = 0 and mileagetype_deleted = 0')
					   ->where('mileage.mileage_code = ?', $code)
					   ->limit(1);
		
	   $result = $this->_db->fetchRow($select);	
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
						->from(array('mileage' => 'mileage'))	
					   ->where('mileage_code = ?', $code)
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