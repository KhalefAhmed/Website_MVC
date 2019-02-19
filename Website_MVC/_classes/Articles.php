<?php
/**
 * Created by PhpStorm.
 * User: A.K.Khalef
 * Date: 2019-02-17
 * Time: 22:29
 */

class Articles
{
    public $id;
    public $title;
    public $sentence;
    public $content;
    public $date;
    public $author;
    public $category;

    /**
     * Articles constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $id = str_secur($id);
        global $db;

        $reqArticle = $db->prepare('
        SELECT a.*, au.firstname, au.lastname,c.name AS category
        From articles a
        INNER JOIN authors au ON au.id = a.author_id
        INNER JOIN categories c ON c.id = a.category_id
        Where a.id = ?
        ');

        $reqArticle->execute([$id]);
        $data = $reqArticle->fetch();
        $this->id = $id;
        $this->title = $data['title'];
        $this->sentence = $data['sentence'];
        $this->content = $data['content'];
        $this->author = $data['firstname'].' '.$data['lastname'];
        $this->category = $data['category'];

    }

    /**
     * Envoie tout les Articles
     * @return array
     */
    public static function getAllArticles(){

        global $db;
        $reqArticle = $db->prepare('SELECT a.*, au.firstname, au.lastname,c.name as category
        From articles a
        INNER JOIN authors au ON au.id = a.author_id
        INNER JOIN categories c ON c.id = a.category_id
        ');

        $reqArticle->execute();
        return $reqArticle->fetchAll();
    }

    public static function getLastArticle($category=null){
    global $db;

    if($category==null){
        $reqArticle = $db->prepare('SELECT a.*, au.firstname, au.lastname,c.name as category
        From articles a
        INNER JOIN authors au ON au.id = a.author_id
        INNER JOIN categories c ON c.id = a.category_id
        ORDER by id DESC 
        LIMIT 1
        ');
        $reqArticle->execute();

    }else{

        $reqArticle = $db->prepare('SELECT a.*, au.firstname, au.lastname,c.name as category
        From articles a
        INNER JOIN authors au ON au.id = a.author_id
        INNER JOIN categories c ON c.id = a.category_id
        where c.id = ?
        ORDER by id DESC 
        LIMIT 1
        ');
        $reqArticle->execute([str_secur($category)]);
    }
        return $reqArticle->fetch();

    }



}