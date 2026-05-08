<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; // that class helps me to make relations
use Illuminate\Database\Eloquent\Relations\MorphMany; // that class helps me to make relations

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // relationships
    function comments () : HasMany
    {
        return $this->hasMany(Comment::class); //that returns all comments in this post
        // this here refers to posts
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function postStatus() : BelongsTo {
        return $this->belongsTo(PostStatus::class, 'post_status', 'id'); //join post_statuses on post_statuses.id = posts.post_status_id
    }

    public function reactions() : MorphMany {
        return $this->morphMany(Reaction::class, 'reactable');
    }
}
