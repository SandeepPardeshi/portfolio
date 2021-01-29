<?php 

use PHPUnit\Framework\TestCase;

use App\Models\Model;
use App\Models\ProjectsModel;

final class ProjectsModelTest extends TestCase
{

    protected $projectsModel;

    public function setup()
    {

        $dbh = new PDO('mysql:host=localhost;dbname=capstone_contacts', 'capstone_user', 'mypass2020!');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        Model::init($dbh);
        $this->projectsModel = new ProjectsModel();

    }


   /**
     * [testGetAllBooksReturnsArray description]
     * @return void
     */
    public function testGetAllProjectsReturnsArray()
    {
        $model = $this->projectsModel;
        $projects = $model->all();
        $this->assertIsArray($projects);
    }

    /**
     * [testGetAllBooksContainsArrayOfBooks description]
     * @return void
     */
    public function testGetAllProjectsContainsArrayOfProjects()
    {
         $model = $this->projectsModel;
         $projects = $model->all();
         $this->assertArrayHasKey('project_id', $projects[0]);
    }


    public function testGetOneProjectReturnsArrayOfOneProject()
    {
        $model = $this->projectsModel;
        $project = $model->one(1);
        //var_dump($comment);
        $this->assertArrayHasKey('project_id', $project);
    }


  
}