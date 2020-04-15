<?php

namespace App\Context\Order\Models;

use App\Support\Concerns\HasUuid;
use App\Support\ValueObjects\OrderUuid;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUuid;

    public function getUuid(): OrderUuid
    {
        return new OrderUuid($this->uuid);
    }
}
