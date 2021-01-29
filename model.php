<?php

//ini_set('display_errors', 0);

/**
 * Database functions
 * @file(model.php)
 * @author [Sandeep pardeshi] <[<pardeshi-s@webmail.uwinnipeg.ca>]>
 * @updated_at 2020-08-25
 */

/**
 * Saveing user
 * @param array $user $_POST values
 * @param  object $dbh
 */

function saveUser($user, $dbh)
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

    $stmt = $dbh->prepare($query);

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

    return $dbh->lastInsertID();
}

/**
 * Get user
 * @param array $user $_POST values
 * @param  object $dbh
 */
function getUser($user_id, $dbh)
{
    $query = "SELECT *
              FROM users
              WHERE user_id = :user_id";

    $stmt = $dbh->prepare($query);

    $params = array(
        ':user_id' => $user_id
    );

    $stmt->execute($params);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * [checkEmail function]
 * @param  [string] $str [description]
 * @param  [database obj] $dbh [description]
 * @return [string]      [description]
 */
// function checkEmail($str,$dbh){

//     $query = "SELECT * FROM users WHERE email = :email";

//     // Prepare the query
//     $stmt = $dbh->prepare($query);

//     // Bind the parameter(s)
//     $params = array(
//         ':email' => $str
//     );

//     // Execute the query
//     $stmt->execute($params);

//     // Fetch the results
//     return $stmt->fetch(PDO::FETCH_ASSOC);
// }