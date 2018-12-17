<?php
/**
 * Created by PhpStorm.
 * User: musso
 */

namespace App\Controllers;
use App\Core\App;
use App\Core\Validate;
use App\Core\Sms;

class ResetController
{
    public function index()
    {
        return view('forgotpass');
    }

    public function sendMessage()
    {
        $email = $_POST["email"];
        $valid_email = Validate::validate($email,"email");
        $massage = "";
        if(!empty($valid_email)) $massage .= "email=".$valid_email;
        if ($massage != "") {
            header("Location: /forgotPassword?". $massage);
        }

        $user = App::get('database')->selectUserByColumn('email', $email);
        if (!empty($user)) {
            $uniqidStr = md5(uniqid(mt_rand()));
            $resetPassLink = 'http://localhost:8008/resetPassword?code='.$uniqidStr;
            App::get('database')->insert('password_resets', [
                'email'         => $email,
                'token'         => $uniqidStr
            ]);
            $response = Sms::send($email, $resetPassLink);
            if($response == "success"){
                header("Location: /forgotPassword?messageOk=Message send in Email ");
            }
        } else {
            header("Location: /forgotPassword?message=Invalid email");
        }
    }

    public function resetPassword()
    {
        $code = $_GET["code"];
        $user = App::get('database')->checkPasswordResetCode($code);
        if(!empty($user)) {
            return view('resetpass');
        }
    }

    public function saveNewPassword()
    {
        $code = $_POST["code"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        if(!empty($password) && !empty($confirm_password) && !empty($code)){
            $user = App::get('database')->checkPasswordResetCode($code);
            if(!empty($user)) {
                App::get('database')->updateUserPassword($password, $user->id);
                App::get('database')->delete('password_resets', $user->email);
                unset($_SESSION["user_id"]);
                unset($_SESSION["login"]);
                session_destroy();
                header('Location: /login');
            }
        } else {
            header("Location: /forgotPassword?message=Incorrect data");
        }
    }
}