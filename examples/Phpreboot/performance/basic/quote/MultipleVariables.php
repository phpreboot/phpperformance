<?php
namespace Phpreboot\performance\basic\quote;

include_once('vendor/autoload.php');

use Phpreboot\Stopwatch\StopWatch;

// Create an instance of StopWatch
$stopWatch = new StopWatch();

// Initialize the watches.
$stopWatch->addWatches(["single", "double"]);

$name = 'Kapil Sharma';
$age = '35';
$work = 'Technical Architect';
$live = "Pune, India";

$stopWatch->start("single");
$singleQuote = 'My name is ' . $name . '. I\'m ' . $age . ' years old, works as ' . $work . ' in ' . $live . '.';
$stopWatch->stop("single");

$stopWatch->start("double");
$singleQuote = "My name is $name I'm $age years old, works as $work in $live .";
$stopWatch->stop("double");

printf("Single quotes took %f seconds \n", $stopWatch->getTime("single"));
printf("Double quotes took %f seconds \n", $stopWatch->getTime("double"));
