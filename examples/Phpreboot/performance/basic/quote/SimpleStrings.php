<?php
namespace Phpreboot\performance\basic\quote;

include_once('vendor/autoload.php');

use Phpreboot\Stopwatch\StopWatch;

// Create an instance of StopWatch
$stopWatch = new StopWatch();

// Initialize the watches.
$stopWatch->addWatches(["single", "double"]);

$stopWatch->start("single");
$nameSingleQuote = 'Kapil Sharma';
$stopWatch->stop("single");

$stopWatch->start("double");
$nameDoubleQuote = "Kapil Sharma";
$stopWatch->stop("double");

printf("Single quotes took %f seconds \n", $stopWatch->getTime("single"));
printf("Double quotes took %f seconds \n", $stopWatch->getTime("double"));
