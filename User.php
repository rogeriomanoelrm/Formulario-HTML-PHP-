<?php

class User extends Conn
{
    public object $conn;
    public array $formData;

    public function list(): array
    {
        $this->conn = $this->connectDb();
        $query_users = "SELECT id, sku, name, price, dimension FROM users3 ORDER BY id ASC LIMIT 40";
        $result_users = $this->conn->prepare($query_users);
        $result_users->execute();
        $retorno = $result_users->fetchAll();
        // var_dump($retorno);
        return $retorno;
    }

    public function delete($id): bool
    {
        $this->conn = $this->connectDb();
        $query_delete_user = "DELETE FROM users3 WHERE id = :id";
        $delete_user = $this->conn->prepare($query_delete_user);
        $delete_user->bindParam(':id', $id);
        $delete_user->execute();
    
        if ($delete_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    


    public function create(): bool
    {
        var_dump($this->formData);
        $this->conn = $this->connectDb();
        $query_user = "INSERT INTO users3 (sku, name, price, dimension) VALUES (:sku, :name, :price, :dimension)";
        $add_user = $this->conn->prepare($query_user);
        $add_user->bindParam(':sku', $this->formData['sku']);
        $add_user->bindParam(':name', $this->formData['name']);
        $add_user->bindParam(':price', $this->formData['price']);
        $add_user->bindParam(':dimension', $this->formData['dimension']);

        $add_user->execute();

        if ($add_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}
