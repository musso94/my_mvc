<?php
/**
 * Created by PhpStorm.
 * User: musso
 */

namespace App\Controllers;
use App\Core\App;
use App\Core\Validate;

class UserController
{
    function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
    }

    public function index()
    {
        $users = App::get('database')->selectAll('users');
        $user_info = App::get('database')->selectUserByColumn('id', $_SESSION['user_id']);
        return view('user',compact('users','user_info'));
    }


    public function updateUser($id)
    {
        $name = Validate::validate($_POST["name"], "text");
        $email = Validate::validate($_POST["email"],"email");
        $phone = Validate::validate($_POST["phone"],"phone");
        $date_of_birth = Validate::validate($_POST["date_of_birth"],"text");

        $massage = "";
        if(!empty($name)) $massage .= "edit_name=".$name."&";
        if(!empty($email)) $massage .= "edit_email=".$email."&";
        if(!empty($phone)) $massage .= "edit_phone=".$phone."&";

        header("Location: /?". $massage);

        if ($massage == "") {
            App::get('database')->update('users', [
                'name'          => $_POST["name"],
                'email'         => $_POST["email"],
                'phone'         => $_POST["phone"],
                'date_of_birth' => $_POST["date_of_birth"]
            ], $id);
            header("Location: /");
        }
    }
}