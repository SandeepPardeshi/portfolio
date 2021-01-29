<?php

require_once __DIR__ . '/ControllerTests.php';

final class GamingControllerTest extends ControllerTests
{

    public function testGamingControllerTestsReturnsCorrectContent()
    {
        $url = "http://localhost:8000/gaming.php";
        $response = $this->getHttpResponse($url); // custom method
        $this->assertContains('<h1>Sandeep</h1>', $response);
    }

    // or test for correct http status
    public function testGamingControllerTestsReturnsCorrectResponse()
    {
        $url = "http://localhost:8000/gaming.php";
        $status = $this->getHttpStatus($url);
        $this->assertEquals('200', $status);
    }
}