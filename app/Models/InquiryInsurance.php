<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryInsurance extends Model
{
    use HasFactory;

    protected $table = 'inquiry_insurances';

    protected $fillable = [
        'id',
        'inquiry_step',
        'vehicle_id',
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
}
