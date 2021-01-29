<?php

require_once __DIR__ . '/ControllerTests.php';

final class IndexControllerTest extends ControllerTests
{

    public function testIndexControllerTestsReturnsCorrectContent()
    {
        $url = "http://localhost:8000/index.php";
        $response = $this->getHttpResponse($url); // custom method
        $this->assertContains('<h1>Sandeep</h1>', $response);
    }

    // or test for correct http status
    public function testIndexControllerTestsReturnsCorrectResponse()
    {
        $url = "http://localhost:8000/index.php";
        $status = $this->getHttpStatus($url);
        $this->assertEquals('200', $status);
    }
}