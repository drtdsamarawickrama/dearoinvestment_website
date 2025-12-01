<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PawningJewellery extends Model
{
    use HasFactory;
    protected $table = 'pawning_jewelleries';

    protected $fillable = [
        'id',
        'pawning_inquiry_id',
        'description',
        'jewellery_count',
        'created_at',
        'updated_at'
    ];
}
