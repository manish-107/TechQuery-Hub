<?php
/**
 * Created by PhpStorm.
 * User: your name
 * Date: todays date
 * Time: todays time
 */
class Main {

    protected $conn = null;
    public function __construct(){
        try{
            $this->conn = new PDO(DB_TYPE.":host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo '<h3>Database Not Connected</h3>','<p>Please Check database connection before running this site ...</p>'; exit;
        }
    }

    public function redirect($url = ''){
        header("Location: " . $url . '.php');
    }
     public function redirect1($url = ''){
        header("Location: " . $url);
    }

    public function getCSS($url = ''){
        require_once $url . 'css.php';
    }

    public function getJS($url = ''){
        require_once $url . 'js.php';
    }

    public function getImages($url = ''){
        require_once $url . 'images.php';
    }

    public function getHead($url = ''){
        require_once $url . 'topbar.php';
    }


    public function getSubSidebar($url = ''){
        require_once $url . 'subadmin-sidebar.php';
    }

     public function getSubHead($url = ''){
        require_once $url . 'subadmin-topbar.php';
    }


    public function getSidebar($url = ''){
        require_once $url . 'left_sidebar.php';
    }


    public function getFoot($url = ''){
        require_once $url . 'footer.php';
    }

    public function notLogged($sessionId, $url){
        if(!isset($_SESSION[$sessionId])){
            $this->redirect($url);
        }
    }

    public function isLogged($sessionId, $url){
        if(isset($_SESSION[$sessionId])){
            $this->redirect($url);
        }
    }

    public function logOut($sessionId, $url){
        if(isset($_SESSION[$sessionId])) {
            session_unset($_SESSION[$sessionId]);
            $this->redirect($url);
        }
    }

    public function sessionMessage(){
        if (isset($_SESSION['success_message'])):
            $message = $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            $response =  $this->showMessage($message,'success');
            print $response;
        endif;
        if (isset($_SESSION['error_message'])):
            $message = $_SESSION['error_message'];
            unset($_SESSION['error_message']);
            $response =  $this->showMessage($message,'danger');
            print $response;
        endif;
        if (isset($_SESSION['warning_message'])):
            $message = $_SESSION['warning_message'];
            unset($_SESSION['warning_message']);
            $response =  $this->showMessage($message,'warning');
            print $response;
        endif;
    }

    public function showMessage($message, $type){
        $msg = '<div class="alert alert-'.$type.'  alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Info!</strong> '.$message.' 
          </div>';
        return $msg;
    }
}