<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'cat_id'
    ];
    
    /**
     * Get the category for the task.
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
