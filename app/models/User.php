<?php
namespace app\models;

use app\core\Dbase;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author rexar
 */
class User {
    public $firstname;
    public $lastname;
    public $bdate;
    public $email;
    public $password;
    private $db;
    
    public function __construct() {
        $this->db = Dbase::getConnection();
    }
    
    public function save(){
       $model = $this->db->prepare("INSERT INTO `users`(`firstname`, `lastname`, `bdate`, `email`, `password`) VALUES (:firstname,:lastname,:bdate,:email,:password);");
       $model->bindParam(':firstname', $this->firstname);
       $model->bindParam(':lastname', $this->lastname);
       $model->bindParam(':bdate', $this->bdate);
       $model->bindParam(':email', $this->email);
       $model->bindParam(':password', md5($this->password));
       $model->execute();
    }
    public function update($id){
       $model = $this->db->prepare("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`bdate`=:bdate,`email`=:email,`password`=:password WHERE `id` =:id;");
       $model->bindParam(':firstname', $this->firstname);
       $model->bindParam(':lastname', $this->lastname);
       $model->bindParam(':bdate', $this->bdate);
       $model->bindParam(':email', $this->email);
       $model->bindParam(':password', md5($this->password));
       $model->bindParam(':id', $id);
       $model->execute();
    }
    public function getAll(){
        $result = $this->db->query("SELECT * FROM `users`;");
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function getById($id){
        
        $result = $this->db->query("SELECT * FROM `users` WHERE `id` =".$id);
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function delById($id) {
        $model = $this->db->prepare("DELETE FROM `users` WHERE `id` =:id;");
        $model->bindParam(':id', $id);
        $model->execute();
    }
    public function validate($email,$password){
        $result = $this->db->query("SELECT count(*) FROM `users` where `email`='".$email."' and `password`='".$password."';");
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);
        if($result[0]['count(*)'] == 1)
            return TRUE;
        else  
            return FALSE;
    }
    
    
    
}
