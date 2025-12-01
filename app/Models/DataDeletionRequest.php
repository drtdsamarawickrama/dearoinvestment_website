<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDeletionRequest extends Model
{
    use HasFactory;
    protected $table = 'data_deletion_requests';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'reason',
        'specifics',
        'is_deleted',
        'created_at',
        'updated_at'
    ];
}
