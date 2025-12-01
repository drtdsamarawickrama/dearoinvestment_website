<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryPawning extends Model
{
    use HasFactory;

    protected $table = 'inquiry_pawnings';

    protected $fillable = [
        'id',
        'inquiry_step',
        'pawned_elsewhere',
        'pic_pawned_receipt_elsewhere',
        'is_jewellery_added',
        'amount',
        'created_at',
        'updated_at'
    ];

    public function getAdminInquirySteps(){
        return [
            "INQUIRY_SUBMITTED",
            "DEARO1_INQUIRY_REVIEWED",
            "DEARO2_INQUIRY_APPROVED",
        ];
    }

    public function getAdminInquiryStepLabel($identifier){
        $label = "";
        switch($identifier){
            case 'INQUIRY_SUBMITTED':
                $label = 'Dearo Action Pending';
                break;
            case 'DEARO1_INQUIRY_REVIEWED':
                $label = 'Inquiry Reviwed';
                break;
            case 'DEARO2_INQUIRY_APPROVED':
                $label = 'Inquiry Approved';
                break;
            default:
                $label = 'Unknown State';
                break;
        }

        return $label;
    }

    public function isCompleted():bool{
        if($this->amount < 1) return false;
        if($this->pawned_elsewhere && $this->pic_pawned_receipt_elsewhere == null) return false;

        return true;
    }

    public function apiResponse():InquiryPawning{
        $this->pawned_elsewhere = ($this->pawned_elsewhere)?true:false;
        $this->is_jewellery_added = ($this->is_jewellery_added)?true:false;

        return $this;
    }

    public function isPawningDetailsProvided():bool{
        if($this->amount < 1) return false;
        if($this->pawned_elsewhere && $this->pic_pawned_receipt_elsewhere == null) return false;

        return $this->is_jewellery_added;
    }
}
