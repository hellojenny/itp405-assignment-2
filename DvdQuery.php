<?php

namespace Database\Query;
require './Database.php';

class DvdQuery extends \Database {

    private $sql;
    private $title;

    public function titleContains($title) {
        $this->title = $title;
        $this->sql = "
            SELECT dvds.id, title, rating_name
            FROM dvds
            INNER JOIN ratings ON dvds.rating_id = ratings.id
            WHERE title LIKE ?
        ";
    }

    public function orderByTitle() {
        $this->sql .= " ORDER BY title";
    }

    public function find() {
        $title2 = '%' . $this->title . '%';
        $statement = self::$pdo->prepare($this->sql);
        $statement->bindParam(1, $title2);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }
}