<?php

require_once __DIR__ . '/ControllerTests.php';

final class WorkControllerTest extends ControllerTests
{

    public function testWorkControllerTestsReturnsCorrectContent()
    {
        $url = "http://localhost:8000/work.php";
        $response = $this->getHttpResponse($url); // custom method
        $this->assertContains('<h1>Sandeep</h1>', $response);
    }

    // or test for correct http status
    public function testWorkControllerTestsReturnsCorrectResponse()
    {
        $url = "http://localhost:8000/work.php";
        $status = $this->getHttpStatus($url);
        $this->assertEquals('200', $status);
    }
}