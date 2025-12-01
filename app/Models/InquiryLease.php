<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryLease extends Model
{
    use HasFactory;

    protected $table = 'inquiry_leases';

    protected $fillable = [
        'id',
        'inquiry_step',
        'vehicle_id',
        'guarantor_id',
        'guarantor2_id',
        'is_arrears',
        'vehicle_missing',
        'created_at',
        'updated_at'
    ];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class, 'reference_inquiry_id', 'id');
    }

    public function getAdminInquirySteps(){
        return [
            "INQUIRY_SUBMITTED",
            "DEARO1_INITIAL_APPROVAL",
            "DEARO2_CUSTOMER_VISIT",
            "DEARO3_SUBMIT_FOR_APPROVAL",
            "DEARO4_APPLIED_FOR_MANAGER_APPROVAL",
            "DERO5_PAYMENT_RELEASED"
        ];
    }

    public function getAdminInquiryStepLabel($identifier){
        $label = "";
        switch($identifier){
            case 'INQUIRY_SUBMITTED':
                $label = 'Dearo Action Pending';
                break;
            case 'DEARO1_INITIAL_APPROVAL':
                $label = 'Initial Approval Done';
                break;
            case 'DEARO2_CUSTOMER_VISIT':
                $label = 'Visited Customer';
                break;
            case 'DEARO3_SUBMIT_FOR_APPROVAL':
                $label = 'Submitted for Manger Approval';
                break;
            case 'DEARO4_APPLIED_FOR_MANAGER_APPROVAL':
                $label = 'Approved by Manager';
                break;
            case 'DERO5_PAYMENT_RELEASED':
                $label = 'Payment Released';
                break;
            default:
                $label = 'Unknown State';
                break;
        }

        return $label;
    }

    public function apiResponse() : InquiryLease {
        $this->is_arrears = ($this->is_arrears)?true:false;        
        $this->vehicle_missing = ($this->vehicle_missing)?true:false;

        return $this;
    }
}
