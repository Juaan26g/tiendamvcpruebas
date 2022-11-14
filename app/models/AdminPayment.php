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

    public function getPaymentsById($id)
    {
        $sql = 'SELECT * FROM payments WHERE id=:id';
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $id]);

        return $query->fetch(PDO::FETCH_OBJ);
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

    public function edit($data)
    {
        $errors = [];

        $sql = 'UPDATE payments SET  name=:name, description=:description';

        $params = [
            
            ':name' => $data['name'],
            ':description' => $data['description'],
            
        ];

        $query = $this->db->prepare($sql);

        if ( ! $query->execute($params)) {
            array_push($errors, 'Error al modificar el producto');
        }

        return $errors;
    }

    public function delete($id)
    {
        $errors = [];

        $sql = 'DELETE FROM payments WHERE id=:id';
        $params = [
            ':id' => $id,
            
        ];

        $query = $this->db->prepare($sql);

        if ( ! $query->execute($params) ) {
            array_push($errors, 'Error al eliminar el metodo de pago');
        }

        return $errors;
    }

}

 