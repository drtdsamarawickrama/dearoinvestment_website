<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogContent extends Model
{
    use HasFactory;
    protected $table = 'blog_contents';

    protected $fillable = [
        'id',
        'blog_id',
        'content_type',
        'content',
        'order_id',
        'created_at',
        'updated_at'
    ];

    public static function getNextContentOrderId($blogId){
        $lastOrderId = BlogContent::where('blog_id', $blogId)->max('order_id');
        return ($lastOrderId + 1);
    }
}
