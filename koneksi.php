<?php
// File: koneksi/database.php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "DB_SIMULASI_PBO_TI_1D_Dwi_Nuha_Aulia_Zahra";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                $this->username,
                $this->password
            );
            // Mengatur error mode PDO ke Exception untuk memudahkan debugging
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Mengatur default fetch mode ke object agar mudah dipetakan ke properti
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>