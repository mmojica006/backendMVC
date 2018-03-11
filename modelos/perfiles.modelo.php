<?php

include_once "conexion.php";

class ModeloPerfiles{


    public function queryDTModel($dataPost)
    {

        $query = '';

        $query .= "SELECT * FROM administradores ";
        // print_r($dataPost);

        if ($dataPost["search"] != '') {
            $query .= 'WHERE name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $query .= 'OR email LIKE "%' . $_POST["search"]["value"] . '%" ';
        }


        if (array_key_exists("order", $dataPost)) {


            $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {

            $query .= 'ORDER BY id ASC ';
        }

        if (array_key_exists("length", $dataPost)) {
            $query .= 'LIMIT ' . $dataPost["start"] . ', ' . $dataPost["length"];
        }

        $stmt = Conexion::conectar()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public function get_total_all_records()
    {
        $stmt = Conexion::conectar()->prepare("select * from administradores");
        $stmt->execute();
        return $stmt->rowCount();
        $stmt->close();
        $stmt = null;


    }

}