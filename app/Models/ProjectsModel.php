<?php

namespace App\Models;

class ProjectsModel extends Model
{

    protected $table = 'projects';

    protected $key = 'project_id';


    /**
     * Get user
     * @param array $user $_POST values
     * @param  object $dbh
     */
    public function getprojects()
    {
        $query = "SELECT *
                  FROM projects";

        $stmt = self::$dbh->prepare($query);

        // $params = array(
        //     ':user_id' => $user_id
        // );

        $stmt->execute();

        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    /**
     * [distinctTechnology function to get list of distinct technologies]
     * @return [type] [description]
     */
    public function distinctTechnology()
    {
        $query = "SELECT DISTINCT
                  technology
                  FROM projects";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    /**
     * [searchProject function to search entered user query]
     * @param  [string] $project [description]
     * @return [database object]          [description]
     */
    public function searchProject($project)
    {
        $query = "SELECT * FROM
                  projects
                  WHERE
                  project_title
                  LIKE
                  '%$project%'
                  OR
                  description
                  LIKE
                  '%$project%'";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    /**
     * [projectTechnology function will output project related to selected technology]
     * @param  [type] $technology [description]
     * @return [type]             [description]
     */
    public function projectTechnology($technology)
    {
        //echo $technology;
        $query = "SELECT * FROM
                  projects
                  WHERE
                  technology
                  =
                  '$technology'";

        $stmt = self::$dbh->prepare($query);

        //dd($stmt);

        $stmt->execute();

        //dd($stmt);

        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    /**
     * [projectDetails description]
     * @param  [int] $project_id [description]
     * @return [database object]             [description]
     */
    public function projectDetails($project_id)
    {
        //echo $project_id;
        $query = "SELECT * FROM
                  projects
                  WHERE
                  project_id
                  =
                  $project_id";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * [adminSaveProjects description]
     * @param  [type] $projects [description]
     * @return [type]           [description]
     */
    public function adminSaveProject($projects)
    {
      $query = "INSERT INTO projects
                (
                project_title,
                description,
                active_status,
                technology,
                rating,
                image,
                start_date,
                expected_end_date,
                actual_end_date,
                created_at,
                updated_at
                )
                values
                (
                :project_title,
                :description,
                :active_status,
                :technology,
                :rating,
                :image,
                :start_date,
                :expected_end_date,
                :actual_end_date,
                NOW(),
                NOW()
                )";

      $stmt = self::$dbh->prepare($query);

      $params = array (
        ':project_title' => $projects['project_title'],
        ':description' => $projects['description'],
        ':active_status' => $projects['active_status'],
        ':technology' => $projects['technology'],
        ':rating' => $projects['rating'],
        ':image' => $projects['image'],
        ':start_date' => $projects['start_date'],
        ':expected_end_date' => $projects['expected_end_date'],
        ':actual_end_date' => $projects['actual_end_date']
      );

      $stmt->execute($params);

      return self::$dbh->lastInsertID();
    }

    /**
     * [adminUpdateProjects description]
     * @param  [type] $projects [description]
     * @return [type]           [description]
     */
    public function adminUpdateProject($projects)
    {
      $query = "UPDATE projects
                SET
                project_title = :project_title,
                description = :description,
                active_status = :active_status,
                technology = :technology,
                rating = :rating,
                image = :image,
                start_date = :start_date,
                expected_end_date = :expected_end_date,
                actual_end_date = :actual_end_date,
                updated_at = NOW()
                WHERE
                project_id = :project_id";

      $stmt = self::$dbh->prepare($query);

      $params = array (
        ':project_id' => $projects['project_id'],
        ':project_title' => $projects['project_title'],
        ':description' => $projects['description'],
        ':active_status' => $projects['active_status'],
        ':technology' => $projects['technology'],
        ':rating' => $projects['rating'],
        ':image' => $projects['image'],
        ':start_date' => $projects['start_date'],
        ':expected_end_date' => $projects['expected_end_date'],
        ':actual_end_date' => $projects['actual_end_date']
      );

      $stmt->execute($params);

      return $stmt->rowCount();
    }

    /**
     * [adminDeleteProject description]
     * @param  [type] $project_id [description]
     * @return [type]             [description]
     */
    public function adminDeleteProject($project_id)
    {
      $query = "DELETE FROM
                projects
                WHERE
                project_id = '$project_id'";

      $stmt = self::$dbh->prepare($query);

      $stmt->execute();
    }

    /**
     * [getUserCount description]
     * @return [type] [description]
     */
    public function getProjectCount()
    {
        $query = "SELECT
                  COUNT(*)
                  FROM
                  projects";

        $stmt = self::$dbh->prepare($query);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}