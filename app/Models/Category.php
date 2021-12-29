<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'description'
    ];

    /**
     * Get the task that owns the Category.
     */
    public function task()
    {
        return $this->belongsTo(Post::class);
    }
}
