<?php
session_start();
require_once 'connection.php';
class common extends connection 
{
    public function __construct(){
        parent::__construct();
    }
    
    public function isUserLoggedIn(){
        if(!isset($_SESSION['user_id'])){
            header('Location: index.php');
        }
    }
    
    public function checkLogin($email, $password){
        $query  = "SELECT * FROM user WHERE email=? AND password=? LIMIT 1";
        $row    = $this->getAll($query, array($email, md5($password)));
        return $row;
    }
    
	public function createInsert($tableName, array $data){
		$columnString	= implode(',',array_keys($data));
		$valueString 	= implode(',', array_fill(0, count($data), '?'));
		$arrayValues	= array_values($data);
		$query    = "INSERT INTO $tableName ({$columnString}) VALUES ({$valueString})";
		$res      = $this->query($query, $arrayValues);
		return $this->getInsertID();
	}
    
    public function getMenuItems($inputBoard, $date){
        $query  	= "SELECT * FROM menu_items WHERE input_board=? AND created_on=?";
        $rows   	= $this->getAll($query, array($inputBoard, $date));
        $arrData	= array();
        foreach ($rows as $row){
        	$arrData[]	= $row;
        }
        return $arrData;
    }
	
	public function deleteRecordes($inputBoard, $date){
		$query    = "DELETE FROM `menu_items` WHERE input_board=? AND created_on=?";
		$res      = $this->query($query, array($inputBoard, $date));
	}
    

}
?>