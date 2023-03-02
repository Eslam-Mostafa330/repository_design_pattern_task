<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class article extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "short_description",
        "content",
        "cover",
        "user_id",
        "category_id",
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment(): HasMany
    {
        return $this->hasMany(comment::class);
    }
    
}
