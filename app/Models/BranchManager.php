<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchManager extends Model
{
    use HasFactory;
    protected $table = 'branch_managers';

    protected $fillable = [
        'id',
        'manager_name',
        'branch_id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public static function getStatTotalManagers():int{
        $managerCount = 0;
        $managers = BranchManager::all();
        
        if($managers){ 
            $managerCount = count($managers); 
        }
        return $managerCount;
    }
}
