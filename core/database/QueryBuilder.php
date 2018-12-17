<?php
/**
 * Created by PhpStorm.
 * User: musso
 */

namespace App\Core\Database;
use PDO;

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function checkUser($email, $password)
    {
        $sql = sprintf(
            "SELECT * FROM `users` WHERE `email` = '%s' AND `password` = '%s' ",
            $email,
            $password
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function selectUserByColumn($column, $value)
    {
        $sql = sprintf(
            "SELECT * FROM `users` WHERE {$column} = '%s'",
            $value
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function checkPasswordResetCode($code)
    {
        $sql = sprintf(
            "SELECT * FROM `password_resets` as pr INNER JOIN `users` as u ON pr.email = u.email  WHERE `token` = '%s'",
            $code
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            //
        }
    }

    public function update($table, $parameters, $id)
    {
        $sql = sprintf(
            "UPDATE `users` SET `name` = '%s', `email` = '%s', `phone` = '%s', `date_of_birth` = '%s' WHERE `id` = '%s'",
            $parameters['name'],
            $parameters['email'],
            $parameters['phone'],
            $parameters['date_of_birth'],
            $id['id']
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (\Exception $e) {
            //
        }
    }

    public function updateUserPassword($password, $id)
    {
        $sql = sprintf(
            "UPDATE `users` SET `password` = '%s' WHERE `id` = '%s'",
            $password,
            $id
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (\Exception $e) {
            //
        }
    }


    public function delete($table, $parameters)
    {
        $sql = sprintf(
            "DELETE FROM `%s` WHERE `email` = '%s'",
            $table,
            $parameters
        );
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (\Exception $e) {
            //
        }
    }
}
