<?php

require_once 'payment.php';
require_once 'price.php';
require_once 'car.php';
require_once 'PDF.php';

//custom account item class as account table abstraction
class class_booking extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected	$_name 			= 'booking';
	protected	$_primary			= 'booking_code';
	
	public $_payment			= null;
	public $_price				= null;
	public $_car					= null;	
	public $_PDFCROWD		= null;
	
	function init()	{

		$this->_payment		= new class_payment();
		$this->_price				= new class_price();
		$this->_car				= new class_car();
		$this->_PDFCROWD	= new CLASS_PDFCROWD();
		
	}

	public function updateBooking($data, $where, $code) {
		
		$bdata 	= array();				
		$bdata['participant_code']		= trim($data['participant_code']);		
		$bdata['car_code']					= trim($data['car_code']);						
		$bdata['price_code']				= trim($data['price_code']);				
		$bdata['booking_startdate']	= trim($data['booking_startdate']);		
		$bdata['booking_enddate']		= trim($data['booking_enddate']);				
		$bdata['booking_message']	= trim($data['booking_message']);	
		
		/* Update the booking. */
		$this->update($bdata, $where);
		
		$bookingData = $this->getByCode($code);

		if($bookingData) {
			
			$this->createInvoice($bookingData['booking_code']);
			
			return $bookingData['booking_code'];
		} else {
			return false;
		}
	}
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	 public function insert(array $data)
    {
        // add a timestamp
        $data['booking_added']	= date('Y-m-d H:i:s');
        $data['booking_code']	= $this->createCode();
		$data['booking_reference'] = $this->createReference();
		
		if(isset($data['car_code'])) {
			
			$carData = $this->_car->getByCode($data['car_code']);
			
			if($carData) {
				
				$data['price_id'] = $carData['price_id'];
				$data['price_code'] = $carData['price_code'];
				
			} else {
				return false;
			}			
		} else {
			return false;
		}
		
		$success = parent::insert($data);	

		if($success) {
			
			$bookingData = $this->getByCode($success);
			
			if($bookingData) {
				$this->createInvoice($bookingData['booking_code']);
			}
		}

		return 	$success;	
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
        $data['booking_updated'] = date('Y-m-d H:i:s');
        
		if(isset($data['car_code'])) {
			
			$carData = $this->_car->getByCode($data['car_code']);
			
			if($carData) {
				
				$data['price_id'] = $carData['price_id'];
				$data['price_code'] = $carData['price_code'];
				
			} else {
				return false;
			}			
		}
		
		return parent::update($data, $where);

    }
	
	public function createInvoice($bookingcode) {

		global $smarty;

		$bookingData = $this->getByCode($bookingcode);

		if($bookingData) {
			
			$paymentData = $this->_payment->getByBooking($bookingData['booking_code']);
			
			$smarty->assign('bookingData', $bookingData);
			if($paymentData) $smarty->assign('paymentData', $paymentData);

			$html = $smarty->fetch(realpath(__DIR__.'/../../../../public_html/').'/templates/booking/invoice/invoice.html');

			/* Save file. */
			$directory	= realpath(__DIR__.'/../../../../public_html/').'/media/booking/'.$bookingData['car_code'].'/';
			$filename	= $directory.$bookingData['booking_reference'].'.html';
			$pdffile		= $directory.$bookingData['booking_reference'].'.pdf';

			if(!is_dir($directory)) mkdir($directory, 0777, true);	
			
			if(file_put_contents($filename, $html)) {
					
				$pdfdata 	= $this->_PDFCROWD->_PDF->convertFile($filename);

				if(file_put_contents($pdffile, $pdfdata)) {
				
					$data = array();
					$data['booking_html'] 	= "/media/booking/".$bookingData['car_code']."/".$bookingData['booking_reference'].".html";
					$data['booking_pdf'] 	= "/media/booking/".$bookingData['car_code']."/".$bookingData['booking_reference'].".pdf";
					
					/*Update. */
					$where		= $this->getAdapter()->quoteInto('booking_code = ?', $bookingData['booking_code']);
					$success	= $this->update($data, $where);
			
				}
			} else { 
				return false;
			}
		} else {
			return false;
		}
	}
	
	/**
	 * get job by job booking Id
 	 * @param string job id
     * @return object
	 */
	public function getByCode($code)
	{
			
		$select = $this->_db->select()	
					->from(array('booking' => 'booking'))	
					->joinLeft(array('car' => 'car'), 'car.car_code = booking.car_code')	
					->joinLeft(array('model' => 'model'), 'model.model_code = car.model_code')
					->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
					->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
					->joinLeft(array('price' => 'price'), 'price.price_code = booking.price_code', array('price_vat' =>new Zend_Db_Expr('(datediff(booking_startdate, booking_enddate) * price.price_cost) * 0.14'), 'price_vat_total' => new Zend_Db_Expr('(datediff(booking_startdate, booking_enddate) * price.price_cost) + ((datediff(booking_startdate, booking_enddate) * price.price_cost) * 0.14)'), 'price_cost' => new Zend_Db_Expr('(datediff(booking_startdate, booking_enddate) * price.price_cost)')))
					->joinLeft(array('payment' => 'payment'), 'payment.booking_code = booking.booking_code and payment_deleted = 0', array('payment_amount' =>new Zend_Db_Expr('SUM(payment.payment_amount)'), 'payment_final' => new Zend_Db_Expr('((datediff(booking_startdate, booking_enddate) * price.price_cost) + ((datediff(booking_startdate, booking_enddate) * price.price_cost) * 0.14)) + SUM(IFNULL(payment.payment_amount, 0))')))
					->joinLeft(array('participant' => 'participant'), 'participant.participant_code = booking.participant_code')
					->joinLeft(array('mailinglist' => 'mailinglist'), "mailinglist.mailinglist_reference = participant.participant_code and mailinglist.mailinglist_category = 'participant'")
					->joinLeft(array('group' => 'group'), 'group.group_code = price.group_code')
					->joinLeft(array('owner' => 'participant'), 'owner.participant_code = car.participant_code', array("concat(owner.participant_name, ' ', owner.participant_surname) as car_owner", "participant_code as owner_code", "participant_cellphone as owner_cellphone", "participant_email as owner_email"))
					->where('booking_deleted = 0 and car_deleted = 0 and price_deleted = 0 and group_deleted = 0 and booking_deleted = 0 and participant.participant_deleted = 0 and owner.participant_deleted = 0')
					->where('booking.booking_code = ?', $code)
					->group('booking.booking_code')
					->limit(1);

	   $result = $this->_db->fetchRow($select);
       return ($result == false) ? false : $result = $result;
	}

	/**
	 * get job by job bookingtype Id
 	 * @param string job id
     * @return object
	 */
	public function getAll($where = NULL, $order = NULL)
	{
		$select = $this->_db->select()	
					->from(array('booking' => 'booking'))	
					->joinLeft(array('car' => 'car'), 'car.car_code = booking.car_code')	
					->joinLeft(array('model' => 'model'), 'model.model_code = car.model_code')
					->joinLeft(array('make' => 'make'), 'make.make_code = model.make_code')
					->joinLeft(array('brand' => 'brand'), 'brand.brand_code = make.brand_code')
					->joinLeft(array('price' => 'price'), 'price.price_code = booking.price_code', array('price_vat' =>new Zend_Db_Expr('(datediff(booking_startdate, booking_enddate) * price.price_cost) * 0.14'), 'price_vat_total' => new Zend_Db_Expr('(datediff(booking_startdate, booking_enddate) * price.price_cost) + ((datediff(booking_startdate, booking_enddate) * price.price_cost) * 0.14)'), 'price_cost' => new Zend_Db_Expr('(datediff(booking_startdate, booking_enddate) * price.price_cost)')))
					->joinLeft(array('payment' => 'payment'), 'payment.booking_code = booking.booking_code and payment_deleted = 0', array('payment_amount' =>new Zend_Db_Expr('SUM(payment.payment_amount)'), 'payment_final' => new Zend_Db_Expr('((datediff(booking_startdate, booking_enddate) * price.price_cost) + ((datediff(booking_startdate, booking_enddate) * price.price_cost) * 0.14)) + SUM(IFNULL(payment.payment_amount, 0))')))
					->joinLeft(array('participant' => 'participant'), 'participant.participant_code = booking.participant_code')
					->joinLeft(array('group' => 'group'), 'group.group_code = price.group_code')
					->joinLeft(array('owner' => 'participant'), 'owner.participant_code = car.participant_code', array("concat(owner.participant_name, ' ', owner.participant_surname) as car_owner", "participant_code as owner_code", "participant_cellphone as owner_cellphone"))
					->where('booking_deleted = 0 and car_deleted = 0 and price_deleted = 0 and group_deleted = 0 and booking_deleted = 0 and participant.participant_deleted = 0 and owner.participant_deleted = 0')
					->where($where)
					->group('booking.booking_code')
					->order($order);
					
	   $result = $this->_db->fetchAll($select);
        return ($result == false) ? false : $result = $result;
	}
	
	function checkBookingByCar($carcode, $startdate, $enddate, $code = null) {
		
		if($code == null) {
			$sql = "select 
							cb.booking_code,
							cb.participant_code,
							cb.price_code,
							cb.car_code,
							cb.booking_startdate, 
							cb.booking_enddate 
						from 
							booking cb
						where
							cb.car_code = ?
							and cb.booking_code in(
							select 
								booking_code
							from
								booking
							where
								(booking_startdate <= ? and booking_enddate >= ?) OR
								(booking_startdate <= ? and booking_enddate >= ?) OR
								(booking_startdate >= ? and booking_enddate <= ?))";
								
			$result = $this->_db->fetchRow($sql, array($carcode, $startdate, $enddate, $enddate, $startdate, $startdate, $enddate));
			
		} else {
			$sql = "select 
							cb.booking_code, 
							cb.participant_code,
							cb.price_code,
							cb.car_code,
							cb.booking_startdate, 
							cb.booking_enddate 
						from 
							booking cb,
							booking ci
						where
							cb.car_code = ?
							and cb.booking_code in(
							select 
								booking_code
							from
								booking
							where
								(booking_startdate <= ? and booking_enddate >= ?) OR
								(booking_startdate <= ? and booking_enddate >= ?) OR
								(booking_startdate >= ? and booking_enddate <= ?))
							and cb.booking_code != ?;";
							
			$result = $this->_db->fetchRow($sql, array($carcode, $startdate, $enddate, $enddate, $startdate, $startdate, $enddate, $code));
		}

        return ($result == false) ? false : $result = $result;							
	}	
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getReference($code)
	{
		$select = $this->_db->select()	
						->from(array('booking' => 'booking'))	
					   ->where('booking_reference = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
        return ($result == false) ? false : $result = $result;					   
	}

	function createReference() {
		/* New reference. */
		$reference = "";
		$codeNumbers = '0123456789';
		$codeAlphabet = 'RENTOUT';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<3;$i++){
			$reference .= $codeAlphabet[rand(0,$count)];
		}
		
		$count = strlen($codeNumbers) - 1;
		
		for($i=0;$i<4;$i++){
			$reference .= $codeNumbers[rand(0,$count)];
		}
		
		/* First check if it exists or not. */
		$itemCheck = $this->getReference($reference);
		
		if($itemCheck) {
			/* It exists. check again. */
			$this->createReference();
		} else {
			return $reference;
		}
	}

		/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($reference)
	{
		$select = $this->_db->select()	
					->from(array('booking' => 'booking'))	
					   ->where('booking_code = ?', $reference)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		//$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet = "0123456789";

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
}
?>