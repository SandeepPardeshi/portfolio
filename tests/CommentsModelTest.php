<?php 

use PHPUnit\Framework\TestCase;

use App\Models\Model;
use App\Models\CommentsModel;

final class CommentsModelTest extends TestCase
{

    protected $commentsModel;

    public function setup()
    {

        $dbh = new PDO('mysql:host=localhost;dbname=capstone_contacts', 'capstone_user', 'mypass2020!');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        Model::init($dbh);
        $this->commentsModel = new CommentsModel();

    }


   /**
     * [testGetAllBooksReturnsArray description]
     * @return void
     */
    public function testGetAllCommentsReturnsArray()
    {
        $model = $this->commentsModel;
        $comments = $model->all();
        $this->assertIsArray($comments);
    }

    /**
     * [testGetAllBooksContainsArrayOfBooks description]
     * @return void
     */
    public function testGetAllCommentsContainsArrayOfComments()
    {
         $model = $this->commentsModel;
         $comments = $model->all();
         $this->assertArrayHasKey('comment', $comments[0]);
    }


    public function testGetOneCommentReturnsArrayOfOneComment()
    {
        $model = $this->commentsModel;
        $comment = $model->one(2);
        //var_dump($comment);
        $this->assertArrayHasKey('vote', $comment);
    }


  
}