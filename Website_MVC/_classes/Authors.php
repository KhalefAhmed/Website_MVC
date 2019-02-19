<?php
/**
 * Created by PhpStorm.
 * User: A.K.Khalef
 * Date: 2019-02-17
 * Time: 22:14
 */

class Authors
{
    public $id;
    public $firstname;
    public $lastname;


    public function __construct($id)
    {
        global $db;
        $reqAuthors = $db->prepare('SELECT * from authors where id = ?');
        $reqAuthors->execute([$id]);
        $data = $reqAuthors->fetch();
        $this->id = $id;
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];

    }

    /**
     * Envoie de Tous les Auteurs
     * @return array
     */
    public static function getAllAuthors(){
        global $db;
        $reqAuthors = $db->prepare('SELECT * from authors');
        $reqAuthors->execute([]);

        return $reqAuthors->fetchAll();
    }
}

