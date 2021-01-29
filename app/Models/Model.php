<?php

namespace App\Models;

// This class's functionality must be tested through child classes

abstract class Model
{
    // Belongs to class, not to
    // instantiate objects
    static protected $dbh;

    /**
     * Table name
     * @var string
     */
    protected $table;

    /**
     * Primary key name
     * @var string
     */
    protected $key;

    // Can be invoked without instantiating
    // an object:  Model::init()
    static public function init($dbh)
    {
        self::$dbh = $dbh;
    }

    public function all()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = self::$dbh->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function one($id)
    {
        $query = "SELECT * FROM {$this->table} 
                WHERE {$this->key} = :id";

        $stmt = self::$dbh->prepare($query);
        $params = array(':id' => $id);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    // public function saveUser($user)
    // {
    //     $query = "INSERT INTO {$this->table}
    //                 (
    //                 first_name,
    //                 last_name,
    //                 street,
    //                 city,
    //                 postal_code,
    //                 province,
    //                 country,
    //                 phone,
    //                 email,
    //                 password
    //                 )
    //                 values
    //                 (
    //                 :first_name,
    //                 :last_name,
    //                 :street,
    //                 :city,
    //                 :postal_code,
    //                 :province,
    //                 :country,
    //                 :phone,
    //                 :email,
    //                 :password
    //                 )";

    //     $stmt = self::$dbh->prepare($query);

    //     $params = array(
    //         ':first_name' => $user['first_name'],
    //         ':last_name' => $user['last_name'],
    //         ':street' => $user['street'],
    //         ':city' => $user['city'],
    //         ':postal_code' => $user['postal_code'],
    //         ':province' => $user['province'],
    //         ':country' => $user['country'],
    //         ':phone' => $user['phone'],
    //         ':email' => $user['email'],
    //         ':password' => password_hash($user['password'], PASSWORD_DEFAULT)
    //     );

    //     // $user = checkEmail($user['email'], $dbh);

    //     // if(!empty($user))
    //     //     return 0;

    //     $stmt->execute($params);

    //     return $stmt->fetch(\PDO::FETCH_ASSOC);

    //     //return $dbh->lastInsertID();
    // }


    // I don't know how to implement these methods for
    // your tables, but I know you should have these
    // methods, therefore I am making them abstract...
    // and leaving implementation up to each child class

    // abstract public function delete($id);

    // abstract public function create($array);

    // abstract public function save($array);

}