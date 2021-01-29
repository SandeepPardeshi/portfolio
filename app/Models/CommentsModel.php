<?php

namespace App\Models;

class CommentsModel extends Model
{

    protected $table = 'comments';

    protected $key = 'comment_id';

    /**
     * [saveComment Inserts comments to database that user enters]
     * @param  [POST variable] $comment [description]
     * @return [type]          [description]
     */
    public function saveComment($comment)
    {
        $query = "INSERT INTO
                  comments
                  (
                  user_id,
                  project_id,
                  comment,
                  vote,
                  user_rating
                  )
                  VALUES
                  (
                  :user_id,
                  :project_id,
                  :comment,
                  :vote,
                  :user_rating
                  )";

        $stmt = self::$dbh->prepare($query);

        $params = array(
            ':user_id' => $comment['user_id'],
            ':project_id' => $comment['project_id'],
            ':comment' => $comment['comments'],
            ':vote' => $comment['vote'],
            ':user_rating' => $comment['user_rating']
        );

        $stmt->execute($params);

        return self::$dbh->lastInsertID();
    }

    /**
     * [displayComments to display comments below projects details page]
     * @return [type] [description]
     */
    public function displayComments($project_id)
    {
        $query = "SELECT
                    users.first_name,
                    users.last_name,
                    projects.project_title,
                    comments.comment,
                    comments.created_at
                    from users 
                    join comments on comments.user_id=users.user_id
                    join projects on projects.project_id=comments.project_id
                    where comments.project_id = $project_id
                  ";

                  //echo $query;

        $stmt = self::$dbh->prepare($query);

        $params = array (
            ':project_id'=>$project_id
        );

        $stmt->execute($params);

        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    /**
     * [getAllComments to show on admin page]
     * @return [type] [description]
     */
    public function getAllComments()
    {
      $query = "SELECT
                users.first_name,
                users.last_name,
                projects.project_title,
                comments.comment_id,
                comments.comment,
                comments.created_at
                from users 
                join comments on comments.user_id=users.user_id
                join projects on projects.project_id=comments.project_id";

      $stmt = self::$dbh->prepare($query);

      $stmt->execute();

      return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    /**
     * [getCommentCount description]
     * @return [type] [description]
     */
    public function getCommentCount()
    {
        $query = "SELECT
                  COUNT(*)
                  FROM
                  comments";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * [maxCommentByUser description]
     * @return [type] [description]
     */
    public function maxCommentByUser()
    {
        $query = "SELECT
                  user_id,
                  count(user_id) maxuser
                  FROM
                  comments
                  GROUP By user_id ORDER BY maxuser DESC LIMIT 1";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * [minCommentByUser description]
     * @return [type] [description]
     */
    public function minCommentByUser()
    {
        $query = "SELECT
                  user_id,
                  count(user_id) minuser
                  FROM
                  comments
                  GROUP By user_id ORDER BY minuser ASC LIMIT 1";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}