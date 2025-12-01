<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BankStatement;
use App\Models\BillingProof;

class GuarantorProfile extends Model
{
    use HasFactory;
    protected $table = 'guarantor_profiles';

    protected $fillable = [
        'id',
        'customer_id',
        'lease_inquiry_id',
        'is_first',
        'first_name',
        'last_name',
        'nic',
        'pic_nic_front',
        'pic_nic_back',
        'occupation',
        'email',
        'contact_number',
        'address',
        'district_id',
        'inquiry_id',
        'created_at',
        'updated_at'
    ];

    public function isGurantorDetailsCompleted(){
        if(is_null($this->first_name)) return false;
        if(is_null($this->last_name)) return false;
        if(is_null($this->nic)) return false;
        if(is_null($this->occupation)) return false;
        if(is_null($this->contact_number)) return false;
        if(is_null($this->address)) return false;
        if(is_null($this->district_id)) return false;
        if(is_null($this->pic_nic_front)) return false;
        if(is_null($this->pic_nic_back)) return false;

        if(!(BankStatement::where('owner_type','GUARANTOR')->where('guarantor_id', $this->id))->exists()) return false;
        if(!(BillingProof::where('owner_type','GUARANTOR')->where('guarantor_id', $this->id))->exists()) return false;

        return true;
    }

    public function getGuarantorEssentials(){
        $profileEssentials = array();
        $profileEssentials['customer_id'] = $this->customer_id;
        $profileEssentials['inquiry_id'] = $this->inquiry_id;
        $profileEssentials['lease_inquiry_id'] = $this->lease_inquiry_id;
        $profileEssentials['is_first'] = $this->is_first;
        $profileEssentials['first_name'] = $this->first_name;
        $profileEssentials['last_name'] = $this->last_name;
        $profileEssentials['nic'] = $this->nic;
        $profileEssentials['pic_nic_front'] = $this->pic_nic_front;
        $profileEssentials['pic_nic_back'] = $this->pic_nic_back;
        $profileEssentials['occupation'] = $this->occupation;
        $profileEssentials['email'] = $this->email;
        $profileEssentials['contact_number'] = $this->contact_number;
        $profileEssentials['address'] = $this->address;
        $profileEssentials['address'] = $this->address;
        $profileEssentials['district_id'] = $this->district_id;

        return $profileEssentials;
    }

    public function isEssentialsAdded():bool{
        if($this->first_name == null){ return false; }
        if($this->last_name == null){ return false; }
        if($this->nic == null){ return false; }
        if($this->occupation == null){ return false; }
        if($this->contact_number == null){ return false; }
        if($this->address == null){ return false; }
        if($this->district_id == null){ return false; }

        return true;
    }
}
