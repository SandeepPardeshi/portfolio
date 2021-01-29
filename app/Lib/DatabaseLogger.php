<?php

namespace App\Lib;

class DatabaseLogger implements ILogger
{
    static protected $dbh;

    /**
     * [init for database variable]
     * @param  [database object] $dbh [description]
     * @return [type]      [description]
     */
    public function init($dbh)
    {
        self::$dbh = $dbh;
    }

    /**
     * [write function to add string to database]
     * @param  [string] $event [description]
     * @return [string]        [description]
     */
    public function write($event)
    {
        $query = "INSERT INTO
                  log(event)
                  VALUES(:event)";

        $stmt = self::$dbh->prepare($query);

        $params = array(
            ':event' => $event
        );

        $stmt->execute($params);

        return self::$dbh->lastInsertID();
    }
}