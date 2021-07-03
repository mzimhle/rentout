<?php

//custom account item class as account table abstraction
class class_mileagetype extends Zend_Db_Table_Abstract
{
   //declare table variables
    protected $_name				= 'mileagetype';
	protected $_primary			= 'mileagetype_code';
	
	/**
	 * Insert the database record
	 * example: $table->insert($data);
	 * @param array $data
     * @return boolean
	 */ 

	public function insert(array $data) {
        // add a timestamp
        $data['mileagetype_added']		= date('Y-m-d H:i:s');
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
         $data['mileagetype_updated'] = date('Y-m-d H:i:s');
        
        return parent::update($data, $where);
    }
	
	public function getAll(){
	
		$select = $this->_db->select()	
						->from(array('mileagetype' => 'mileagetype'))
						->where('mileagetype_deleted = 0')
						->order('mileagetype_deleted desc');

	   $result = $this->_db->fetchAll($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	public function getByName($name){

		$select = $this->_db->select()	
						->from(array('mileagetype' => 'mileagetype'))
						->where('mileagetype_deleted = 0')
						->where('mileagetype_name = ?', $name)
						->order('mileagetype_deleted desc');

	   $result = $this->_db->fetchRow($select);
       return ($result == false) ? false : $result = $result;
	   
	}
	
	/**
	 * get domain by domain Account Id
 	 * @param string domain id
     * @return object
	 */
	public function pairs( array $index = array())
	{
		if(count($index) == 0) {
			$select = $this->_db->select()	
					->from(array('mileagetype' => 'mileagetype'), array('mileagetype_code', 'mileagetype_name'))
					->where('mileagetype_deleted = 0 and mileagetype_active = 1');
		} else {
			$select = $this->_db->select()	
					->from(array('mileagetype' => 'mileagetype'), array('mileagetype_code', 'mileagetype_name'))
					->where('mileagetype_unit in (?)', $index)
					->where('mileagetype_deleted = 0 and mileagetype_active = 1');			
		}
		
	   $result = $this->_db->fetchPairs($select);	
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
						->from(array('mileagetype' => 'mileagetype'))
						->where('mileagetype_deleted = 0')
					   ->where('mileagetype.mileagetype_code = ?', $code)
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
						->from(array('mileagetype' => 'mileagetype'))	
					   ->where('mileagetype_code = ?', $code)
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