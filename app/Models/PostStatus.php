<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['type'])]
class PostStatus extends Model
{
    /** @use HasFactory<\Database\Factories\PostStatusFactory> */
    use HasFactory;

    // Relationships

    public function post(): HasMany {
        return $this->hasMany(Post::class);
    }
}
