<?php
namespace Phpreboot\performance\basic\quote;

include_once('vendor/autoload.php');

use Phpreboot\Stopwatch\StopWatch;

// Create an instance of StopWatch
$stopWatch = new StopWatch();

// Initialize the watches.
$stopWatch->addWatches(["single", "double"]);

$name = 'Kapil Sharma';

//Wrong assessment. If we change position of below two blocks, result will change.
//TODO: Write separate program for single and double quotes string.
$stopWatch->start("double");
$double = "Name: $name";
$stopWatch->stop("double");

$stopWatch->start("single");
$single = 'Name: ' . $name;
$stopWatch->stop("single");

printf("Single quotes took %f seconds \n", $stopWatch->getTime("single"));
printf("Double quotes took %f seconds \n", $stopWatch->getTime("double"));
