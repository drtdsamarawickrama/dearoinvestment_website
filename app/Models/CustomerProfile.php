<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerProfile extends Model
{
    use HasFactory;
    protected $table = 'customer_profiles';

    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'dob',
        'address',
        'district',
        'nic',
        'pic_nic_front',
        'pic_nic_back',
        'is_completed',
        'created_at',
        'updated_at'
    ];

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function getProfileCompletionState(){
        if( $this->first_name != null && 
            $this->last_name != null &&
            $this->mobile_number != null && 
            $this->dob != null && 
            $this->address != null && 
            $this->district != null &&
            $this->nic != null &&
            $this->pic_nic_front != null &&
            $this->pic_nic_back != null){
                $this->is_completed = true;
                $this->save();
        }

        return $this->is_completed;
    }

    public function getProfileEssentials(){
        $profileEssentials = array();
        $profileEssentials['first_name'] = $this->first_name;
        $profileEssentials['last_name'] = $this->last_name;
        $profileEssentials['email'] = $this->email;
        $profileEssentials['mobile_number'] = $this->mobile_number;
        $profileEssentials['dob'] = $this->dob;
        $profileEssentials['address'] = $this->address;
        $profileEssentials['district'] = (int)$this->district;
        $profileEssentials['nic'] = $this->nic;
        $profileEssentials['pic_nic_front'] = $this->pic_nic_front;
        $profileEssentials['pic_nic_back'] = $this->pic_nic_back;
        $profileEssentials['is_completed'] = ($this->getProfileCompletionState())?true:false;

        return $profileEssentials;
    }

    public static function getStatTotalCustomers():int{
        $customerCount = 0;
        $customers = CustomerProfile::all();
        
        if($customers){ 
            $customerCount = count($customers); 
        }
        return $customerCount;
    }

    public static function getStatTotalCustomersOfDistricts($districtIds):int{
        $customerCount = 0;
        $customers = CustomerProfile::whereIn('district', $districtIds)->get();
        
        if($customers){ 
            $customerCount = count($customers); 
        }
        return $customerCount;
    }
}
