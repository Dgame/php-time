<?php

use Dgame\Time\Date;
use function Dgame\Time\Unit\days;
use function Dgame\Time\Unit\hours;
use function Dgame\Time\Unit\months;
use function Dgame\Time\Unit\weeks;
use function Dgame\Time\Unit\years;

require_once 'vendor/autoload.php';

print '<pre>';

print days(1000)->inMonths() . PHP_EOL;
print days(1000)->inYears() . PHP_EOL;
print days(1000)->inYears()->inDays() . PHP_EOL;

print days(365)->inYears()->asFloat() . PHP_EOL;
print days(1000)->inYears()->asFloat() . PHP_EOL;

print weeks(52)->inMonths()->asFloat() . PHP_EOL;
print months(1)->inWeeks()->asFloat() . PHP_EOL;

print weeks(52)->inYears()->asFloat() . PHP_EOL;
print months(12)->inYears()->asFloat() . PHP_EOL;
print years(1)->inMonths() . PHP_EOL;

print str_repeat('=', 50) . PHP_EOL;

var_dump(Date::Of(days(1000)));