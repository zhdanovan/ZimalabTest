<?php
require_once 'config.php';

class Account {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $company_name;
    private $position;
    private $phone1;
    private $phone2;
    private $phone3;

    // Конструктор
    public function __construct($first_name, $last_name, $email, $company_name = "", $position = "", $phone1 = "", $phone2 = "", $phone3 = "") {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->company_name = $company_name;
        $this->position = $position;
        $this->phone1 = $phone1;
        $this->phone2 = $phone2;
        $this->phone3 = $phone3;
    }

    // Методы для добавления, редактирования, удаления и получения списка аккаунтов
    public function addAccount() {
        global $conn;
        $sql = "INSERT INTO accounts (first_name, last_name, email, company_name, position, phone1, phone2, phone3) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->first_name);
        $stmt->bindParam(2, $this->last_name);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->company_name);
        $stmt->bindParam(5, $this->position);
        $stmt->bindParam(6, $this->phone1);
        $stmt->bindParam(7, $this->phone2);
        $stmt->bindParam(8, $this->phone3);
        $stmt->execute();
        
    }

    public function editAccount($id) {
        global $conn;
        $sql = "UPDATE accounts SET first_name=?, last_name=?, email=?, company_name=?, position=?, phone1=?, phone2=?, phone3=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->first_name);
        $stmt->bindParam(2, $this->last_name);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->company_name);
        $stmt->bindParam(5, $this->position);
        $stmt->bindParam(6, $this->phone1);
        $stmt->bindParam(7, $this->phone2);
        $stmt->bindParam(8, $this->phone3);
        $stmt->bindParam(9, $id);
        $stmt->execute();
        
    }

    public function deleteAccount($id) {
        global $conn;
        $sql = "DELETE FROM accounts WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }
    
    public static function getAccounts($offset, $items_per_page) {
        global $conn;
        $sql = "SELECT * FROM accounts LIMIT ?, ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $offset, PDO::PARAM_INT);
        $stmt->bindParam(2, $items_per_page, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    }
?>
