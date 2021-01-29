<?php

require_once __DIR__ . '/ControllerTests.php';

final class QuaverControllerTest extends ControllerTests
{

    public function testQuaverControllerTestsReturnsCorrectContent()
    {
        $url = "http://localhost:8000/quaver.php";
        $response = $this->getHttpResponse($url); // custom method
        $this->assertContains('<h1>Sandeep</h1>', $response);
    }

    // or test for correct http status
    public function testQuaverControllerTestsReturnsCorrectResponse()
    {
        $url = "http://localhost:8000/quaver.php";
        $status = $this->getHttpStatus($url);
        $this->assertEquals('200', $status);
    }
}