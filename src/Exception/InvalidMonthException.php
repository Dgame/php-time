<?php

namespace Dgame\Time\Exception;

class InvalidMonthException extends \Exception
{
    public function __construct(string $month)
    {
        parent::__construct('Unknown month: ' . $month);
    }
}