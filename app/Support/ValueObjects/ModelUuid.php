<?php

namespace App\Support\ValueObjects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class ModelUuid
{
    public string $uuid;

    private string $modelClass;

    private static ?string $fakeUuid;

    /** @return static */
    public static function create(): self
    {
        return new static(static::$fakeUuid ?? Str::uuid());
    }

    public function __construct(string $uuid)
    {
        $this->modelClass = $this->getModelClass();

        $this->uuid = $uuid;
    }

    public static function fakeUuid(string $fakeUuid): void
    {
        static::$fakeUuid = $fakeUuid;
    }

    abstract protected function getModelClass(): string;

    protected function isValid(string $uuid): bool
    {
        return ! is_null($this->modelClass::findByUuid($uuid));
    }

    public function id(): int
    {
        return $this->model()->id;
    }

    public function model(): Model
    {
        return $this->modelClass::findByUuid($this->uuid);
    }

    public function __toString()
    {
        return $this->uuid;
    }
}
