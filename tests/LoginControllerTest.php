<?php

require_once __DIR__ . '/ControllerTests.php';

final class LoginControllerTest extends ControllerTests
{

    public function testLoginControllerTestsReturnsCorrectContent()
    {
        $url = "http://localhost:8000/login.php";
        $response = $this->getHttpResponse($url); // custom method
        $this->assertContains('<h1>Sandeep</h1>', $response);
    }

    // or test for correct http status
    public function testLoginControllerTestsReturnsCorrectResponse()
    {
        $url = "http://localhost:8000/login.php";
        $status = $this->getHttpStatus($url);
        $this->assertEquals('200', $status);
    }
}