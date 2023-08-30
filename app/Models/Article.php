<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
// use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'category_id', 'title', 'slug', 'desc', 'img', 'views', 'status', 'publish_date'];
    // relasi ke category
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function img():Attribute
    {
        return Attribute::make(
            get:fn($img)=>asset('/storage/article/'.$img),
        );
    }
}
