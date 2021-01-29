<?php

/* Utility Functions */

/**
 * @param  Mixed $var Variable to dump
 * @return void
 */
function dc($var)
{
	echo '<pre>';
	var_dump($var);
	echo '<pre>';
}

/**
 * @param  Mixed $var Variable to dump and die
 * @return void
 */
function dd($var)
{
	echo '<pre>';
	var_dump($var);
	echo '<pre>';
	die;
}

/**
 * Sanaitize a string for output
 * @param  string $str
 * @return string
 */
function e($str)
{
	return htmlentities($str, ENT_QUOTES, "UTF-8");
}

/**
 * [flash message display function]
 * @param  [string] $type    [description]
 * @param  [string] $message [description]
 * @return [string]          [description]
 */
function flash($type, $message)
{
    $_SESSION['flash'][] = [$type, $message];
}

/**
 * [eventLog function to generate query string.]
 * @param  App\Lib\ILogger $Logger [description]
 * @return [string]                  [description]
 */
function eventLog(App\Lib\ILogger $logger)
{
    date_default_timezone_set("Canada/Central");
    $date = date("Y-m-d h:i:s");
    $method = $_SERVER['REQUEST_METHOD'];
    $page = $_SERVER['PHP_SELF'];
    $status = http_response_code();
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    $evt_string = $date . ' | ' . $method . ' | ' . $page . ' | ' . $status . ' | ' . $useragent;

    $logger->write($evt_string);
}

/**
 * [csrf description]
 * @return [type] [description]
 */
function csrf()
{
    return $_SESSION['csrf_token'];
}