# Single quote vs. double quotes

In PHP, we use quotes to represent Strings. These can be both single quotes (') or double quotes ("). For details of quotes, please refer [PHP docs](http://php.net/manual/en/language.types.string.php).

> If the string is enclosed in double-quotes ("), PHP will interpret more escape sequences for special characters

## Misconception

It is a common misconception that since double quotes parse special characters, they are slower.

### Not for simple strings

Consider example from [SimpleString.php](https://github.com/phpreboot/phpperformance/blob/master/examples/Phpreboot/performance/basic/quote/SimpleStrings.php), as follow:

```
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
```

Its output is

```
kapil@PHPReboot:phpperformance $ php examples/Phpreboot/performance/basic/quote/SimpleStrings.php
Single quotes took 0.000073 seconds
Double quotes took 0.000005 seconds
kapil@PHPReboot:phpperformance $ php examples/Phpreboot/performance/basic/quote/SimpleStrings.php
Single quotes took 0.000010 seconds
Double quotes took 0.000002 seconds
```

Double quotes string took 5 milli-seconds while single quote string took 73 milli-seconds first time and 10 and 5 milli-seconds respectively second time (Well on my Macbook Air early 2015). **Code is available, clone it and check how long it take on your system.**

### Now for variables as well

I also try to introduce a variable. New example is [quote.php](https://github.com/phpreboot/phpperformance/blob/master/examples/Phpreboot/performance/basic/quote/quotes.php) as follow:

```
<?php
namespace Phpreboot\performance\basic\quote;

include_once('vendor/autoload.php');

use Phpreboot\Stopwatch\StopWatch;

// Create an instance of StopWatch
$stopWatch = new StopWatch();

// Initialize the watches.
$stopWatch->addWatches(["single", "double"]);

$name = 'Kapil Sharma';

$stopWatch->start("double");
$double = "Name: $name";
$stopWatch->stop("double");

$stopWatch->start("single");
$single = 'Name: ' . $name;
$stopWatch->stop("single");

printf("Single quotes took %f seconds \n", $stopWatch->getTime("single"));
printf("Double quotes took %f seconds \n", $stopWatch->getTime("double"));
```

Output is:

```
kapil@PHPReboot:phpperformance $ php examples/Phpreboot/performance/basic/quote/quotes.php
Single quotes took 0.000410 seconds
Double quotes took 0.000007 seconds
kapil@PHPReboot:phpperformance $ php examples/Phpreboot/performance/basic/quote/quotes.php
Single quotes took 0.000010 seconds
Double quotes took 0.000003 seconds
```

It took 410 and 7 seconds for single and double quotes respectively for first time. Second time, it took 10 and 3 seconds respectively.

### Lets check for multiple variables as well

Another example with multiple variables is [MultipleVariables.php](https://github.com/phpreboot/phpperformance/blob/master/examples/Phpreboot/performance/basic/quote/MultipleVariables.php) as follow:

```
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
```

output is

```
kapil@PHPReboot:phpperformance $ php examples/Phpreboot/performance/basic/quote/MultipleVariables.php
Single quotes took 0.000306 seconds
Double quotes took 0.000008 seconds
kapil@PHPReboot:phpperformance $ php examples/Phpreboot/performance/basic/quote/MultipleVariables.php
Single quotes took 0.000011 seconds
Double quotes took 0.000004 seconds
```

It took 306 and 8 milli-seconds for single and double quotes respectively for first time. Second time it took 11 and 4 milli-seconds respectively.

> At least on my system (Macbook Air early 2015), it seems double quotes is faster then single quotes.

However, ideally there is not much difference.
