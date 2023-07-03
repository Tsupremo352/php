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
            try{
                $pdo = new PDO($this->dsn, $this->user, $this->pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->setPDO($pdo);
            }catch(PDOException $e){
                echo "Error al conectar a base de datos\n {$e->getMessage()}";
            }
        }

        public static function select($table){
            $self           = new self();
            $pdo            = $self->getPDO();
            $queryString    = "select * from $table";
            $stmt           = $pdo->prepare($queryString);
            $stmt->execute();
            return $stmt;
        }

        public static function showTables(){
            $self           = new self();
            $pdo            = $self->getPDO();
            $query = "SELECT table_name FROM information_schema.tables WHERE table_schema='public'";
            $stmt = $pdo->query($query);
            $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
            foreach ($tables as $table) {
                echo $table . "<br>";
            }
        }

        public static function query($queryString){
            $self   = new self();
            $pdo    = $self->getPDO();
            $pdo->prepare($queryString);
        }
    }
?>