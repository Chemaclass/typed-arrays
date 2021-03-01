<?php

declare(strict_types=1);

namespace ArrayOf\Exceptions;

use Exception;

final class ImmutabilityException extends Exception
{
    public function __construct()
    {
        parent::__construct('This ArrayOf object is immutable.');
    }
}
