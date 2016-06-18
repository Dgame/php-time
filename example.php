<?php

use Dgame\Time\DateUnit;
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

print days(365)->inYears()->getAmount() . PHP_EOL;
print days(1000)->inYears()->getAmount() . PHP_EOL;

print weeks(52)->inMonths()->getAmount() . PHP_EOL;
print months(1)->inWeeks()->getAmount() . PHP_EOL;

print weeks(52)->inYears()->getAmount() . PHP_EOL;
print months(12)->inYears()->getAmount() . PHP_EOL;
print years(1)->inMonths() . PHP_EOL;

print str_repeat('=', 50) . PHP_EOL;

var_dump(DateUnit::Of(days(1000)));