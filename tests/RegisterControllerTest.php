<?php

require_once __DIR__ . '/ControllerTests.php';

final class RegisterControllerTest extends ControllerTests
{

    public function testRegisterControllerTestsReturnsCorrectContent()
    {
        $url = "http://localhost:8000/register.php";
        $response = $this->getHttpResponse($url); // custom method
        $this->assertContains('<h1>Sandeep</h1>', $response);
    }

    // or test for correct http status
    public function testRegisterControllerTestsReturnsCorrectResponse()
    {
        $url = "http://localhost:8000/register.php";
        $status = $this->getHttpStatus($url);
        $this->assertEquals('200', $status);
    }
}