<?php

namespace App\Models;

use Dom\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Reply extends Model
{
    /** @use HasFactory<\Database\Factories\ReplyFactory> */
    use HasFactory;

    //Relatioships

    public function reactions(): MorphMany {
        return $this->morphMany(Reaction::class, 'reactable');
    }

    public function comment(): BelongsTo {
        return $this->belongsTo(Comment::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
