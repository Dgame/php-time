# php-time

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Dgame/php-time/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Dgame/php-time/?branch=master)
[![codecov](https://codecov.io/gh/Dgame/php-time/branch/master/graph/badge.svg)](https://codecov.io/gh/Dgame/php-time)
[![Build Status](https://scrutinizer-ci.com/g/Dgame/php-time/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Dgame/php-time/build-status/master)
[![StyleCI](https://styleci.io/repos/60962210/shield?branch=master)](https://styleci.io/repos/60962210)
[![Build Status](https://travis-ci.org/Dgame/php-time.svg?branch=master)](https://travis-ci.org/Dgame/php-time)

## Convert TimeUnits to other TimeUnits in no time.

### Seconds:
```php
seconds(300)->inMinutes()->equalsAmount(5);
```

#### Minutes:
```php
minutes(60)->inSeconds()->equalsAmount(3600);
minutes(60)->inHours()->equalsAmount(1);
```

#### Hours:
```php
hours(24)->inMinutes()->equalsAmount(1440);
hours(24)->inDays()->equalsAmount(1);
```

### Days:
```php
days(7)->inHours()->equalsAmount(168);
days(7)->inWeeks()->equalsAmount(1);
```

### Weeks:
```php
weeks(12)->inDays()->equalsAmount(84);
```

### Months:
```php
months(12)->inYears()->equalsAmount(1);
```

### Years:
```php
years(1)->inWeeks()->equalsAmount(52);
years(2)->inMonths()->equalsAmount(24);
```

## Compare TimeUnits:

```php
hours(24)->equals(days(1));
days(1)->equals(hours(24));
years(1)->equals(days(365));
weeks(1)->equals(days(7));
```

## Add / Subtract TimeUnits:

```php
days(1)->add(hours(24))->equals(days(2));
hours(24)->subtract(days(0.5))->equals(hours(12)):
hours(1)->equals(minutes(60));
```

----

## Get specific informations about a Month / Year

There  is a **Month** and a **Year** class (note the missing `s` at the end) to access precise informations about a specific year or a specific month in a specific year:

### Month:
```php
Month::Of('Feb', 2015)->inDays()->equalsAmount(28);
Month::Of('Feb', 2015)->inWeeks()->equalsAmount(4);
Month::Of('Feb', 2016)->inDays()->equalsAmount(29);
Month::Of('Jun', 2016)->inDays()->equalsAmount(30);
Month::Of('Jun', 2016)->inWeeks()->equalsAmount(4.28571);
```

### Year:
```php
Year::Of(2016)->isLeapyear();
Year::Of(2015)->inDays()->equalsAmount(365);
Year::Of(2016)->inDays()->equalsAmount(366);
Year::Of(2015)->inWeeks()->equalsAmount(52.142857142857);
Year::Of(2016)->inWeeks()->equalsAmount(52.285714285714);
```

----

## Represent a TimeUnit in individual units

```php
$unit = new TimeUnits(days(1000));

$this->assertTrue($unit->getYears()->equalsAmount(2));
$this->assertTrue($unit->getMonths()->equalsAmount(8));
$this->assertTrue($unit->getWeeks()->equalsAmount(3));
$this->assertTrue($unit->getDays()->equalsAmount(5));
$this->assertTrue($unit->getHours()->equalsAmount(11));
$this->assertTrue($unit->getMinutes()->equalsAmount(33));
$this->assertTrue($unit->getSeconds()->equalsAmount(20));
```

```php
$unit = new TimeUnits(hours(4.5));

$this->assertTrue($unit->getYears()->equalsAmount(0));
$this->assertTrue($unit->getMonths()->equalsAmount(0));
$this->assertTrue($unit->getWeeks()->equalsAmount(0));
$this->assertTrue($unit->getDays()->equalsAmount(0));
$this->assertTrue($unit->getHours()->equalsAmount(4));
$this->assertTrue($unit->getMinutes()->equalsAmount(30));
$this->assertTrue($unit->getSeconds()->equalsAmount(0));
```

```php
$unit = new TimeUnits(minutes(525));

$this->assertTrue($unit->getYears()->equalsAmount(0));
$this->assertTrue($unit->getMonths()->equalsAmount(0));
$this->assertTrue($unit->getWeeks()->equalsAmount(0));
$this->assertTrue($unit->getDays()->equalsAmount(0));
$this->assertTrue($unit->getHours()->equalsAmount(8));
$this->assertTrue($unit->getMinutes()->equalsAmount(45));
$this->assertTrue($unit->getSeconds()->equalsAmount(0));
```
