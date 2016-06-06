<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class connection
{
    protected $db       = null;
    private $database_host  = 'localhost';
    private $database_user  = 'root';
    private $database_pass  = '';
    private $database_db    = 'test';
    private $database_type  = 'mysql';
    public $stmt     = null;
    
    public function __construct(){
        if ($this->db === false) {
            $this->connect();
        }
    }
    
	/**
	 * Connect with database
	 */
    private function connect(){
        $dsn = $this->database_type . ":dbname=" . $this->database_db . ";host=" . $this->database_host;
        try {
            $this->db = new PDO($dsn, $this->database_user, $this->database_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {        
            throw $e;
            //your log handler
        }
    }
    
    public function query($query, array $params = array()){ 
        try{ 
            $this->connect(); 
            $this->stmt        = $this->db->prepare($query); 
            $this->bind($query, $params); 
            $this->stmt->execute(); 
            return true; 
        }catch(Exception$e){ 
            throw $e; 
        } 
    }
    
    public function getAll($query, array $params = array()){ 
        $this->query($query, $params); 
        $array = $this->stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $array; 
    }
    
    protected function bind($query, array $params){ 
        if(strpos($query, "?")){ 
            array_unshift($params, null); 
            unset($params[0]); 
        } 
        
        foreach($params as $key => $val){ 
            switch(gettype($val)){ 
                case "boolean": 
                    $type = PDO::PARAM_BOOL; 
                    break; 
                case "integer": 
                    $type = PDO::PARAM_INT; 
                    break; 
                case "string": 
                    $type = PDO::PARAM_STR; 
                    break; 
                case "null": 
                    $type = PDO::PARAM_NULL; 
                    break; 
                default: 
                    $type = PDO::PARAM_STR; 
                    break; 
            } 
            $this->stmt->bindValue($key, $val, $type); 
        } 
    }
    
    public function getInsertID(){ 
        return $this->db->lastInsertId(); 
    }
    
}
?>