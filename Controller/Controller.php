<?php
declare(strict_types=1);
include_once ("../Model/M_Account.php");
include_once ("../Model/M_Student.php");
include_once ("../Model/M_Khoa.php");
    
class Controller {
    public function invoke() : void {
        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
            switch ($action) {
                case "login":
                    include_once ("../View/Login.php");
                    break;
                case "loginCheck":
                    $username = $_REQUEST["username"];
                    $password = $_REQUEST["password"];
                    $model = new M_Account();
                    if ($model->checkLogin($username, $password)) {
                        include_once ("../View/Home.php");
                    } else {
                        $fail = "Tên đăng nhập hoặc mật khẩu không đúng";
                        include_once ("../View/Login.php");
                    }
                
                case "viewStudentList":
                    include_once ("");
                    break;
                case "viewKhoaList":
                    include_once ("");
                    break;
                case "addStudent":
                    include_once ("");
                    break;
                case "addKhoa":
                    include_once ("");
                    break;
                case "":
                    include_once ("");
                    break;
                }
        }
    }
}
$controller = new Controller();
$controller->invoke();
