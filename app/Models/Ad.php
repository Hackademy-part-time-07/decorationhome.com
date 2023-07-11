<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'price', 'category_id', 'user_id', 'image'];

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
public function setAccepted($value)
{
    $this->is_accepted =$value;
    $this->save();
    return true;
}
static public function ToBeRevisionedCount() {
    return Ad::where('is_accepted', null)->count();
}
}