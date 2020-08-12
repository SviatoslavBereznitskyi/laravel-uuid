<?php

namespace Nevadskiy\Uuid\Tests\Unit;

use Nevadskiy\Uuid\Tests\Support\Models\Post;
use Nevadskiy\Uuid\Tests\TestCase;
use Ramsey\Uuid\Uuid;

class UuidTest extends TestCase
{
    /** @test */
    public function it_sets_uuid_during_model_creation(): void
    {
        $post = new Post();
        $post->save();

        self::assertNotEmpty($post->getKey());

        self::assertTrue(
            Uuid::isValid($post->getKey())
        );
    }

    /** @test */
    public function it_uses_string_key_type(): void
    {
        self::assertEquals('string', (new Post())->getKeyType());
    }
}
