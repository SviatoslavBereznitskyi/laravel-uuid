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
     * Boot the uuid trait.
     */
    public static function bootUuid(): void
    {
        static::creating(static function (self $model) {
            $model->setUuidIfMissing();
        });
    }

    /**
     * Set the uuid key to the model if it is missing.
     */
    public function setUuidIfMissing(): void
    {
        if (is_null($this->getUuid())) {
            $this->setUuid();
        }
    }

    /**
     * Set the uuid key to the model.
     */
    public function setUuid(): void
    {
        $this->setAttribute($this->getKeyName(), static::generateId());
    }

    /**
     * Get the uuid key of the model.
     */
    public function getUuid(): ?string
    {
        return $this->getKey();
    }

    /**
     * Generate the uuid key.
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
