<?php

namespace App\Models;

class ProfileModel extends Model
{
    protected $table = 'comments';

    protected $key = 'comment_id';

    /**
     * [userComments to show comments by logged in user on profile page]
     * @param  [Session variable] $user_id [description]
     * @return [type]          [description]
     */
    public function userComments($user_id)
    {
        $query = "SELECT
                    users.first_name,
                    users.last_name,
                    projects.project_title,
                    projects.project_id,
                    comments.created_at,
                    comments.comment
                    from users 
                    join comments on comments.user_id=users.user_id
                    join projects on projects.project_id=comments.project_id
                    where comments.user_id = $user_id";

        $stmt = self::$dbh->prepare($query);

        $params = array (
            ':user_id'=>$user_id
        );

        $stmt->execute($params);

        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }
}