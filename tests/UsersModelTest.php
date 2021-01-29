<?php 

use PHPUnit\Framework\TestCase;

use App\Models\Model;
use App\Models\UsersModel;

final class UsersModelTest extends TestCase
{

    protected $usersModel;

    public function setup()
    {

        $dbh = new PDO('mysql:host=localhost;dbname=capstone_contacts', 'capstone_user', 'mypass2020!');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        Model::init($dbh);
        $this->usersModel = new UsersModel();

    }


   /**
     * [testGetAllBooksReturnsArray description]
     * @return void
     */
    public function testGetAllUsersReturnsArray()
    {
        $model = $this->usersModel;
        $users = $model->all();
        $this->assertIsArray($users);
    }

    /**
     * [testGetAllBooksContainsArrayOfBooks description]
     * @return void
     */
    public function testGetAllUsersContainsArrayOfUsers()
    {
         $model = $this->usersModel;
         $users = $model->all();
         $this->assertArrayHasKey('user_id', $users[0]);
    }


    public function testGetOneUserReturnsArrayOfOneUser()
    {
        $model = $this->usersModel;
        $user = $model->one(5);
        //var_dump($comment);
        $this->assertArrayHasKey('user_id', $user);
    }

    // public function testSaveOneUserReturnArrayOfOneUser()
    // {
    //     $model = $this->usersModel;
    //     $user_array = array(
    //         ':first_name' => 'Ros',
    //         ':last_name' => 'Taylor',
    //         ':street' => '89, Brook Burg',
    //         ':city' => 'Winnipeg',
    //         ':postal_code' => 'R2P 2Z9',
    //         ':province' => 'Manitoba',
    //         ':country' => 'Canada',
    //         ':phone' => '431-990-0570',
    //         ':email' => 'brook@burg.com',
    //         ':password' => password_hash('Wdd@2020', PASSWORD_DEFAULT)
    //     );
    //     $user = $model->saveUser($user_array);
    //     $this->assertIsInt($user);
    // }

  
}