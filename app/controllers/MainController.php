<?php
use app\models\User;
use app\core\Dbase;
use app\core\Controller;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainController
 *
 * @author rexar
 */
class MainController extends Controller {
    public function actionIndex($params = null)
    {
        $this->view->render('index','Главная');
    }
    public function actionLogin($params = null){
        
        $this->view->render('login','Авторизация');
    }
    public function actionSigin($params = null){
        $this->view->render('sigin','Регистрация');
    }
    public function actionUserlist($params = null){
        $user = new User();
        $model = $user->getAll();
        $this->view->render('userlist','Список пользователей',$model);
    }
    public function actionUseredit($params = null){
        $model = null;
        if (isset($_POST['update']))
        {
            //Не стал заморачиваться с валидацией данных,
            //если поле пароль не заполненно юзером,
            //то в базу падает хеш пустой строки
            $user = new User();
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->bdate = $_POST['bdate'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->update($_POST['id']);
        }
        else
        {
            //если есть в запросе Id юзера,
            //то получаем его модель и передаем представлению
            if (isset($params[0]))
            {
                $user = new User();
                $model = $user->getById($params[0]);
            }
        }
        $this->view->render('useredit','Редактирование пользователя',$model);
    }
    public function actionUserdel ($params = null) {
        if (isset($params[0]))
        {
            $user = new User();
            $user->delById($params[0]);
        }
        $this->view->render('userdel','Удаление юзера');
    }
    
}
