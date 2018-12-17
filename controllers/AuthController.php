<?php
/**
 * Created by PhpStorm.
 * User: musso
 */

namespace App\Controllers;
use App\Core\App;
use App\Core\Validate;

class AuthController
{
    public function index()
    {
        return view('login');
    }

    public function loginCheck()
    {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (isset($email) && isset($password)) {
                $user = App::get('database')->checkUser($email,$password);
                if (!empty($user)) {
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['email'] = $user->email;
                    header('Location: /');
                } else {
                    header("Location: /login?message=incorrect date");
                }
            }
        }
    }

    public function logout()
    {
        unset($_SESSION["user_id"]);
        unset($_SESSION["login"]);
        session_destroy();
        header('Location: /login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerNewUser()
    {
        $name = Validate::validate($_POST["name"], "text");
        $email = Validate::validate($_POST["email"],"email");
        $phone = Validate::validate($_POST["phone"],"phone");
        $date_of_birth = Validate::validate($_POST["date_of_birth"],"text");
        $password = Validate::validate($_POST["password"],"");

        $massage = "";
        if(!empty($name)) $massage .= "name=".$name."&";
        if(!empty($email)) $massage .= "email=".$email."&";
        if(!empty($phone)) $massage .= "phone=".$phone."&";
        if(!empty($password)) $massage .= "password=".$password."&";

        if ($massage != "") {
            header("Location: /register?". $massage);
        } else {
            App::get('database')->insert('users', [
                'name'          => $_POST["name"],
                'email'         => $_POST["email"],
                'phone'         => $_POST["phone"],
                'date_of_birth' => $_POST["date_of_birth"],
                'password'      => $_POST["password"]
            ]);
            $user = App::get('database')->checkUser($_POST["email"],$_POST["password"]);
            if (!empty($user)) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['email'] = $user->email;
            }
            header("Location: /");
        }
    }

}