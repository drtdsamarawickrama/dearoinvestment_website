<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = [
        'id',
        'title',
        'sub_title',
        'meta_description',
        'og_image',
        'slug',
        'article_type',
        'status',
        'created_at',
        'updated_at'
    ];

    public static function isSlugAvailable($slug){
        $blog = Blog::where('slug', $slug)->first();
        return empty($blog);
    }

    public static function getUniqueSlug($slug, $counter){
        $slug_updated = $slug.'-'.$counter;
        if(!Blog::isSlugAvailable($slug_updated)){
            $counter++;
            $slug_updated = Blog::getUniqueSlug($slug, $counter);
        }
        
        return $slug_updated;
    }
}
