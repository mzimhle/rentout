<?php



//custom account item class as account table abstraction
class class_payment extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'payment';
	protected $_primary			= 'payment_code';
	
	public $_booking			= null;
	
	function init() {
		
	}
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
		
		require_once 'booking.php';
		
		$bookingObject	= new class_booking();
		
        // add a timestamp
        $data['payment_added']		= date('Y-m-d H:i:s');
        $data['payment_code']		= $this->createCode();	 
		
		$bookingcode = parent::insert($data);	
		
		if(isset($data['booking_code'])) {
			/* Generate invoice. */
			$bookingObject->createInvoice($data['booking_code']);				
		} else {
			return false;
		}
		
		return $bookingcode;
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
         $data['payment_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll()	{
	
		$select = $this->_db->select()	
						->from(array('payment' => 'payment'))
						->joinLeft(array('booking' => 'booking'), 'booking.booking_code = payment.booking_code')
						->joinLeft(array('document' => 'document'), "document.document_item = payment.payment_code and document_type = 'PAYMENT'")
						->where('payment_deleted = 0 and booking_deleted = 0')
						->order('payment_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByBooking($code){
		$select = $this->_db->select()	
						->from(array('payment' => 'payment'))
						->joinLeft(array('booking' => 'booking'), 'booking.booking_code = payment.booking_code')
						->joinLeft(array('document' => 'document'), "document.document_item = payment.payment_code and document_type = 'PAYMENT'")
						->where('payment_deleted = 0 and booking_deleted = 0')
					   ->where('payment.booking_code = ?', $code);
		
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
						->from(array('payment' => 'payment'))
						->joinLeft(array('booking' => 'booking'), 'booking.booking_code = payment.booking_code')
						->joinLeft(array('document' => 'document'), "document.document_item = payment.payment_code and document_type = 'PAYMENT'")
						->where('payment_deleted = 0 and booking_deleted = 0')
					   ->where('payment.payment_code = ?', $code)
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
						->from(array('payment' => 'payment'))	
					   ->where('payment_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<20;$i++){
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