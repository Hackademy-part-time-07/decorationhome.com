<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\User;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'price', 'category_id', 'user_id', 'image', 'is_accepted'];
    protected $table = 'ads';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $this->attributes['image'] = $value;
        }
    }
}
