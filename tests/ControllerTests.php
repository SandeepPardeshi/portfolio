<?php


use PHPUnit\Framework\TestCase;

class ControllerTests extends TestCase
{
    
    /**
     * Test a URL and return the response
     * @author  Steve George <edu@pagerange.com>
     * @param  [string] $url [url to test]
     * @return [array]      [response and status code]
     * @updated 2020-09-04
     */
    public function getHttpResponse($url)
    {
            // Initialize curl
            $ch = curl_init();

            // Set options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

            // Capture response
            $response = curl_exec($ch);

            // Close connection
            curl_close($ch);

            // Return 
            return $response;

    }


    /**
     * Test a URL and return the http satus
     * @author  Steve George <edu@pagerange.com>
     * @param  [string] $url [url to test]
     * @return [array]      [response and status code]
     * @updated 2020-09-04
     */
    public function getHttpStatus($url)
    {
            // Initialize curl
            $ch = curl_init();

            // Set options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

            // Capture response and status
            $response = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            // Close connection
            curl_close($ch);

            // Return 
            return $status;

    }

}