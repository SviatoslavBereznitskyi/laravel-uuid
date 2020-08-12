<?php

namespace Nevadskiy\Uuid\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Nevadskiy\Uuid\Uuid;

/**
 * @property string id
 */
class Post extends Model
{
    use Uuid;
}
