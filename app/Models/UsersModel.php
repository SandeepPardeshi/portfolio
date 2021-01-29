<?php

namespace App\Models;

class UsersModel extends Model
{

    protected $table = 'users';

    protected $key = 'user_id';

    /**
     * Saveing user
     * @param array $user $_POST values
     * @param  object $dbh
     */

    public function saveUser($user)
    {
        $query = "INSERT INTO users
                    (
                    first_name,
                    last_name,
                    street,
                    city,
                    postal_code,
                    province,
                    country,
                    phone,
                    email,
                    password
                    )
                    values
                    (
                    :first_name,
                    :last_name,
                    :street,
                    :city,
                    :postal_code,
                    :province,
                    :country,
                    :phone,
                    :email,
                    :password
                    )";

        $stmt = self::$dbh->prepare($query);

        $params = array(
            ':first_name' => $user['first_name'],
            ':last_name' => $user['last_name'],
            ':street' => $user['street'],
            ':city' => $user['city'],
            ':postal_code' => $user['postal_code'],
            ':province' => $user['province'],
            ':country' => $user['country'],
            ':phone' => $user['phone'],
            ':email' => $user['email'],
            ':password' => password_hash($user['password'], PASSWORD_DEFAULT)
        );

        // $user = checkEmail($user['email'], $dbh);

        // if(!empty($user))
        //     return 0;

        $stmt->execute($params);

        return self::$dbh->lastInsertID();
    }

    /**
     * Get user
     * @param array $user $_POST values
     * @param  object $dbh
     */
    public function getUser($user_id)
    {
        $query = "SELECT *
                  FROM users
                  WHERE user_id = :user_id";

        $stmt = self::$dbh->prepare($query);

        $params = array(
            ':user_id' => $user_id
        );

        $stmt->execute($params);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * [getLogs function to get records from log table]
     * @return [type] [description]
     */
    public function getLogs()
    {

      $query = "SELECT
               *
               FROM
               log
               ORDER BY
               id
               desc
               LIMIT 11";

      $stmt = self::$dbh->prepare($query);

      $stmt->execute();

      return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    /**
     * [getAllUser to get the list of all users ]
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function getAllUser()
    {
        $query = "SELECT *
                  FROM users";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    /**
     * [getUserCount to show on admin dashboard]
     * @return [type] [description]
     */
    public function getUserCount()
    {
        $query = "SELECT
                  COUNT(*)
                  FROM
                  users";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}