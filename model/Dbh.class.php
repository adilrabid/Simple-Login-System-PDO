<?php

class Dbh {
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;
    private $tbname;

    public function __construct(){
        // ** Create table and necessary columns if they don't exists
        $q_get_Table = "SHOW TABLES;";
        
        $get_Table = $this->connection()->query($q_get_Table);

        while ($table = $get_Table->fetch()) {
           $this->tbname = $table['Tables_in_simple_login_system'];
        }
        
        if(empty($this->tbname) && $this->tbname != 'accounts'){
            // if there is no table called accounts
            $q_create_Table = "CREATE TABLE accounts ( 
                                id INT AUTO_INCREMENT NOT NULL,
                                username VARCHAR(100) NOT NULL,
                                email VARCHAR(50) NOT NULL,
                                pass VARCHAR(255) NOT NULL,
                                register_date TIMESTAMP,
                                PRIMARY KEY (id) );";
        
            $this->connection()->query($q_create_Table);

        }
    }


    protected function connection(){

        $this->dbhost = $_SERVER['HTTP_HOST'];    
        $this->dbuser = 'root';    
        $this->dbpass = '';    
        $this->dbname = 'simple_login_system';     
        
        $dsn = "mysql:host=".$this->dbhost.";dbname=".$this->dbname;
        $pdo = new PDO ($dsn, $this->dbuser, $this->dbpass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $pdo;

    }
}
