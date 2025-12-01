<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchDistrict extends Model
{
    use HasFactory;
    protected $table = 'branch_districts';

    protected $fillable = [
        'id',
        'branch_id',
        'district_id',
        'created_at',
        'updated_at'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
