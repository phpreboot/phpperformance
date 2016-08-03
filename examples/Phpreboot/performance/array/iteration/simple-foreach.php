<?php
namespace Phpreboot\performance\basic\quote;

include_once('vendor/autoload.php');

use Phpreboot\Stopwatch\StopWatch;

/* ====================================================
 * Simple foreach loop
 * ----------------------------------------------------
 * For a same array, we want to test iteration time
 * through foreach, for, and array functions like
 * array_walk
 * ====================================================
 */