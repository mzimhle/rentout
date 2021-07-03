<?php

//custom account item class as account table abstraction
class class_price extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name		= 'price';
	protected $_primary	= 'price_code';
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['price_added']		= date('Y-m-d H:i:s');
		$data['price_startdate']	= date('Y-m-d H:i:s');
        $data['price_code']		= $this->createCode();
		
		if(isset($data['group_code']) && trim($data['group_code']) != '') {
			
			$priceData = $this->getByGroup($data['group_code']);
			
			if($priceData) {
				
				/* Increase id to the latest one. */
				$data['price_id'] = $priceData['price_id']+1;
				
				/* Update previous item. */
				$udata = array();
				$udata['price_enddate'] = date('Y-m-d H:i:s');
				
				$where	= $this->getAdapter()->quoteInto('price_code = ?', $priceData['price_code']);
				$this->update($udata, $where);	
			
			}
		} else {
			return false;
		}
		
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
         $data['price_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll($grouped = true) {
	
		if(!$grouped) {
			$select = $this->_db->select()	
							->from(array('price' => 'price'))
							->joinLeft(array('group' => 'group'), 'group.group_code = price.group_code')
							->where('price_deleted = 0 and group_deleted = 0')
							->order('group_name');
		} else {
			$select = $this->_db->select()	
							->from(array('price' => 'price'), array('price_code', 'group_code', 'price_cost', 'price_startdate', 'price_enddate', new Zend_Db_Expr("MAX(price_id) AS price_id")))
							->joinLeft(array('group' => 'group'), 'group.group_code = price.group_code')
							->where('price_deleted = 0 and group_deleted = 0')
							->group('group.group_code')
							->order('group_name');							
		}

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByGroup($code, $all = false) {
		if(!$all) {
			$select = $this->_db->select()	
							->from(array('price' => 'price'), array('price_code', 'group_code', 'price_id', 'price_cost', 'price_startdate', 'price_enddate', new Zend_Db_Expr("MAX(price_id) AS price_id")))
							->joinLeft(array('group' => 'group'), 'group.group_code = price.group_code')
							->where('price_deleted = 0 and group_deleted = 0')
							->where('price.group_code = ?', $code)
							->group('group.group_code')
							->limit(1);
			$result = $this->_db->fetchRow($select);
		} else {
			$select = $this->_db->select()	
							->from(array('price' => 'price'), array('price_code', 'group_code', 'price_cost', 'price_startdate', 'price_enddate', new Zend_Db_Expr("MAX(price_id) AS price_id")))
							->joinLeft(array('group' => 'group'), 'group.group_code = price.group_code')
							->where('price_deleted = 0 and group_deleted = 0')
							->group('group.group_code')
							->order('group_name');
			$result = $this->_db->fetchAll($select);								
		}
	   
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getByCode($code) {
		$select = $this->_db->select()	
						->from(array('price' => 'price'))
						->joinLeft(array('group' => 'group'), 'group.group_code = price.group_code')
						->where('price_deleted = 0 and group_deleted = 0')
					   ->where('price.price_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function getCode($code) {
		$select = $this->_db->select()	
						->from(array('price' => 'price'))	
					   ->where('price_code = ?', $code)
					   ->limit(1);

	   $result = $this->_db->fetchRow($select);	
       return ($result == false) ? false : $result = $result;					   
	}
	
	function createCode() {
		/* New reference. */
		$reference = "";
		$codeAlphabet = '123456789';
		
		$count = strlen($codeAlphabet) - 1;
		
		for($i=0;$i<5;$i++){
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