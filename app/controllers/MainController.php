<?php
use app\models\User;
use app\core\Dbase;
use app\core\Controller;
use app\core\Session;

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
        if (isset($_POST['login'])&&isset($_POST['password']))
        {
            $login = $_POST['login'];
            $pass = md5($_POST['password']);
            $model = new User();
            if($model->validate($login, $pass))
            {
                $_SESSION['auth'] = 1;
                
                
            }
        }
        
        $this->view->render('login','Авторизация');
    }
    public function actionLogout(){
        Session::destroy();
        $this->view->render('logout','Главная');
    }

    public function actionSigin($params = null){
        $data = 'start';
        if (isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['bdate'])&&isset($_POST['email'])&&isset($_POST['password']))
        {
            $user = new User();
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->bdate = $_POST['bdate'];
            $user->email = $_POST['email'];
            $user->password = md5($_POST['password']);
            $user->save();
            $data = 'end';
        }
        $this->view->render('sigin','Регистрация',$data);
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
