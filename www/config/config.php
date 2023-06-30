<?php
    class Connection{
        private $host   = "db";
        private $dbname = "php";
        private $user   = "root";
        private $pass   = "0352";
        private $dsn    = "";
        private $pdo;
        public function setPDO($pdo){
            $this->pdo=$pdo;
        }
        public function getPDO(){
            return $this->pdo;
        }

        public function __construct(){
            $this->dsn  = "pgsql:host={$this->host};dbname={$this->dbname}";
        }

        public static function connect(){
            $instance= new self();
            try{
                $pdo = new PDO($instance->dsn, $instance->user, $instance->pass);
                $instance->setPDO($pdo);
            }catch(PDOException $e){
                echo "Error al conectar a base de datos\n {$e->getMessage()}";
            }
        }
    }
?>