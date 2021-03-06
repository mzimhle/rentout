<?php

//custom account item class as account table abstraction
class class_notice extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'notice';
	protected $_primary			= 'notice_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['notice_added']		= date('Y-m-d H:i:s');
        $data['notice_code']		= $this->createCode();
		
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
         $data['notice_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('notice' => 'notice'))
						->joinLeft(array('booking' => 'booking'), 'booking.booking_code = notice.booking_code')
						->where('notice_deleted = 0 and booking_deleted = 0')
						->where('notice_active = 1 and booking_active = 1')
						->group('notice.notice_code')
						->order('notice_deleted desc');

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
						->from(array('notice' => 'notice'))
						->joinLeft(array('booking' => 'booking'), 'booking.booking_code = notice.booking_code')
						->where('notice_deleted = 0 and booking_deleted = 0')
						->where('notice_active = 1 and booking_active = 1')
						->where('notice.notice_code = ?', $code)
						->limit(1);
		
	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByBooking($code) {
		
		$select = $this->_db->select()	
						->from(array('notice' => 'notice'))
						->joinLeft(array('booking' => 'booking'), 'booking.booking_code = notice.booking_code')
						->where('notice_deleted = 0 and booking_deleted = 0')
						->where('notice_active = 1 and booking_active = 1')
						->where('notice.booking_code = ?', $code);

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
						->from(array('notice' => 'notice'))	
					   ->where('notice_code = ?', $code)
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