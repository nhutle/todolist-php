<?php

require_once "MainModel.php";

class WorksModel extends MainModel
{
    function __construct() {
        parent::__construct();
    }

    public function getAll()
    {
        $select_sql = "SELECT * FROM works";
        $query      = mysqli_query($this->database, $select_sql);
        $works      = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $works;
    }

    public function add($work)
    {
        $name         = $work['name'];
        $startingDate = $work['startingDate'];
        $endingDate   = $work['endingDate'];
        $status       = $work['status'];
        $sql_insert   = "INSERT INTO `works` (`name`, `starting_date`, `ending_date`, `status`) VALUES ('$name', '$startingDate', '$endingDate', '$status')";

        return mysqli_query($this->database, $sql_insert);
    }

    public function update($work)
    {
        $id           = $work['id'];
        $name         = $work['name'];
        $startingDate = $work['startingDate'];
        $endingDate   = $work['endingDate'];
        $status       = $work['status'];
        $sql_update   = "UPDATE `works` SET `name`='$name', `starting_date`='$startingDate', `ending_date`='$endingDate', `status`='$status' WHERE `id`='$id'";

        mysqli_query($this->database, $sql_update);

        return true;
    }

    public function delete($id)
    {
        $sql_delete = "DELETE FROM `works` WHERE `id`='$id'";
        mysqli_query($this->database, $sql_delete);
        return true;
    }
}