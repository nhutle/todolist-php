<?php

require_once("MainModel.php");

class WorksModel extends MainModel
{
    /**
     * Constructor.
     * @author Nhut Le
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Get all works.
     * @author Nhut Le
     * @return array|null
     */
    public function getAll()
    {
        $select_sql = "SELECT * FROM works";
        $query      = mysqli_query($this->database, $select_sql);
        $works      = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $works;
    }

    /**
     * Insert work to db.
     * @author Nhut Le
     * @param $work
     * @return bool
     */
    public function add($work)
    {
        $name         = $work['name'];
        $startingDate = date('Y-m-d', strtotime($work['startingDate']));
        $endingDate   = date('Y-m-d', strtotime($work['endingDate']));
        $status       = $work['status'];
        $sql_insert   = "INSERT INTO `works` (`name`, `starting_date`, `ending_date`, `status`) VALUES ('$name', '$startingDate', '$endingDate', '$status')";

        return mysqli_query($this->database, $sql_insert);
    }

    /**
     * Update work in db.
     * @author Nhut Le
     * @param $work
     * @return bool
     */
    public function update($work)
    {
        $id           = $work['id'];
        $name         = $work['name'];
        $startingDate = date('Y-m-d', strtotime($work['startingDate']));
        $endingDate   = date('Y-m-d', strtotime($work['endingDate']));
        $status       = $work['status'];
        $sql_update   = "UPDATE `works` SET `name`='$name', `starting_date`='$startingDate', `ending_date`='$endingDate', `status`='$status' WHERE `id`='$id'";

        return mysqli_query($this->database, $sql_update);
    }

    /**
     * Delete work in db.
     * @author Nhut Le
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $sql_delete = "DELETE FROM `works` WHERE `id`='$id'";

        return mysqli_query($this->database, $sql_delete);
    }

    /**
     * Get a work by name.
     * @author Nhut Le
     * @param $name
     * @return array|null
     */
    public function getByName($name) {
        $select_sql = "SELECT * FROM works WHERE `name`='$name' LIMIT 1";
        $query      = mysqli_query($this->database, $select_sql);

        return mysqli_fetch_assoc($query);
    }

    /**
     * Get a work by id.
     * @author Nhut Le
     * @param $id
     * @return array|null
     */
    public function get($id) {
        $select_sql = "SELECT * FROM works WHERE `id`='$id'";
        $query      = mysqli_query($this->database, $select_sql);

        return mysqli_fetch_assoc($query);
    }
}