<?php

namespace App\Support\Concerns;

use App\Support\ValueObjects\ModelUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public static $fakeUuid = null;

    public static function bootHasUuid(): void
    {
        static::creating(function (Model $model): void {
            if (is_null($model->uuid)) {
                $model->uuid = static::$fakeUuid ?? (string)Str::uuid();
            }
        });
    }

    public static function findByUuid(string $uuid): ?Model
    {
        return static::where('uuid', $uuid)->first();
    }

    abstract public function getUuid(): ModelUuid;
}
