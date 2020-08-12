<?php

namespace Nevadskiy\Uuid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @mixin Model
 */
trait Uuid
{
    /**
     * Boot the Uuid trait.
     */
    public static function bootUuid(): void
    {
        static::creating(static function (self $model) {
            $model->setUuid();
        });
    }

    /**
     * Set a generated UUID to the model.
     */
    public function setUuid(): void
    {
        $this->setAttribute($this->getKeyName(), static::generateId());
    }

    /**
     * Generate UUID.
     */
    public static function generateId(): string
    {
        return Str::uuid();
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}
