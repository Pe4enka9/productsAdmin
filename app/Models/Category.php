<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $parent_id
 */
class Category extends Model
{
    protected $guarded = ['id'];
}
