<?php 
class Database{
        
    private static $instance = null;
    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpass;
    private $dbh;
    private $stmt;

    private function __construct() {
        $this->dbhost = DB_HOST; // set the hostname
        $this->dbname = DB_NAME; // set the database name
        $this->dbuser = DB_USER; // set the mysql username
        $this->dbpass = DB_PASS; // set the mysql password

        $dsn = "mysql:host=".$this->dbhost.";dbname=".$this->dbname."";

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
        } catch (PDOException $e) {
            echo '<strong>Mohon Maaf terjadi Kesalahan. Koneksi ke Database GAGAL.</strong><br>';
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                $type = PDO::PARAM_STR;
            }
        }
            $this->stmt->bindValue($param,$value,$type);
        }

        public function execute() {
            $this->stmt->execute();
        }

        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function rowCount() {
            return $this->stmt->rowCount();
        }
}
