<?php

declare(strict_types=1);

namespace Dgame\Time\Exception;

use InvalidArgumentException;

final class InvalidMonthException extends InvalidArgumentException
{
    public function __construct(string $month)
    {
        parent::__construct('Unknown month: ' . $month);
    }
}
