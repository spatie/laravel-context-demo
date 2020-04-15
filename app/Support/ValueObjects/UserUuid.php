<?php

namespace App\Support\ValueObjects;

use App\Models\User;

class UserUuid extends ModelUuid
{
    protected function getModelClass(): string
    {
        return User::class;
    }
}
