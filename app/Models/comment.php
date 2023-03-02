<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "review",
        "article_id"
    ];

    // public function article(): BelongsTo
    // {
    //     return $this->belongsTo(article::class, 'article_id', 'id');
    // }

}
