<?php

class AdminPayment
{
    private $db;

    public function __construct()
    {
        $this->db = Mysqldb::getInstance()->getDatabase();
    }

    public function getPayments()
    {
        $sql = 'SELECT * FROM payments';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function add ($data)              
    {
        $sql = 'INSERT INTO payments(name, description)
                VALUES(:name, :description)';
                
                $params = [
                    ':name' => $data['name'],
                    ':description' => $data['description'],
                ];
                
                $query = $this->db->prepare($sql);
                

        return $query->execute($params);
    }

}

 