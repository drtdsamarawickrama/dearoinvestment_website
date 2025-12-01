<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';

    protected $fillable = [
        'id',
        'branch_name',
        'created_at',
        'updated_at'
    ];

    public function districts(): HasMany
    {
        return $this->hasMany(BranchDistrict::class);
    }

    public function getDistrictIds(){
        return $this->districts->pluck('district_id')->toArray();
    }

    public static function getStatTotalBranches():int{
        $branchCount = 0;
        $branches = Branch::all();
        
        if($branches){ 
            $branchCount = count($branches); 
        }
        return $branchCount;
    }
}
