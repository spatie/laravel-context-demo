<?php

namespace App\Context\Order\Exceptions;

use Exception;

class CannotCreateOrderBecauseInsufficientStock extends Exception
{
    public static function make(): self
    {
        return new self();
    }
}
