# php-time

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Dgame/php-time/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Dgame/php-time/?branch=master)

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
$units = new Units(days(1000));
$units->getYears()->equalsAmount(2);
$units->getMonths()->equalsAmount(8);
$units->getWeeks()->equalsAmount(3);
$units->getDays()->equalsAmount(5);
$units->getHours()->equalsAmount(11);
$units->getMinutes()->equalsAmount(31);
$units->getSeconds()->equalsAmount(12);
```
