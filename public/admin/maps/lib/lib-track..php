<?php 
class track {
    protected $pdo = null;
    protected $stmt = null;

    function __construct()
    {
        try {
            $str = "mysql:host" . DB_HOST . ";charset=" . DB_CHARSET;
            if (defined('DB_NAME')) { $str .= ";dbname=" . DB_NAME; }
            $this->pdo = new PDO(
                $str, DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
                );
        }
        catch (Exception $ex){
            print_r($ex);
            die();
        }
    }
    function __destruct()
    {
        if ($this->stmt !== null) { $this->stmt = null; }
        if ($this->pdo !== null) { $this->pdo = null; }
        
    }

    public $lastID = null;
    function exec ($sql, $data) {
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($data);
            $this->lastID = $this->pdo->lastInsertId();
        } catch(Exception $ex){
            $this->error = $ex;
            return false;
        }
        $this->stmt = null;
        return true;
    }
    function fetchAll ($sql, $cond=null, $key=null, $value=null) {

        $result = [];
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);

            if (isset($key)){
                if (isset($value)) {
                    if (is_callable($value)) {
                        while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
                            $result[$row[$key]] = $value($row);
                        }
                    } else {
                        while ($row)
                    }
                }
            }
        }

    }
}

?>