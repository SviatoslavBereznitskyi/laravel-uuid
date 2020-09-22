<?php

namespace Nevadskiy\Uuid;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as UuidFactory;

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
            $model->setUuidIfEmpty();
        });
    }

    /**
     * Set UUID to the model if it is not set yet.
     */
    public function setUuidIfEmpty(): void
    {
        if (is_null($this->getUuid())) {
            $this->setUuid();
        }
    }

    /**
     * Set a UUID to the model.
     */
    public function setUuid(): void
    {
        $this->setAttribute($this->getKeyName(), static::generateId());
    }

    /**
     * Get a UUID of the model.
     */
    public function getUuid(): ?string
    {
        return $this->getKey();
    }

    /**
     * Generate UUID.
     */
    public static function generateId(): string
    {
        return UuidFactory::uuid4();
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
