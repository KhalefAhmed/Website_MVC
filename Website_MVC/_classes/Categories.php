<?php
/**
 * Created by PhpStorm.
 * User: A.K.Khalef
 * Date: 2019-02-17
 * Time: 22:28
 */

class Categories
{
    public $id;
    public $name;

    public function __construct($id)
    {
        global $db;
        $reqCategory = $db->prepare('SELECT * from categories where id = ?');
        $reqCategory->execute([$id]);
        $data = $reqCategory->fetch();
        $this->id = $id;
        $this->name = $data['name'];


    }

    /**
     * Envoie de Tous les Categories
     * @return array
     */
    public static function getAllCategories(){
        global $db;
        $reqCategory = $db->prepare('SELECT * from categories');
        $reqCategory->execute([]);

        return $reqCategory->fetchAll();
    }
}