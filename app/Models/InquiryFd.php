<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryFd extends Model
{
    use HasFactory;

    protected $table = 'inquiry_fds';

    protected $fillable = [
        'id',
        'inquiry_step',
        'amount',
        'period',
        'preferred_rate',
        'is_completed',
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

    public function apiResponse():InquiryFd{
        $this->is_completed = ($this->is_completed)?true:false;

        return $this;
    }

    public function getFdDetailsCompletionState(){
        if( $this->amount != null && 
            $this->period != null &&
            $this->preferred_rate != null){
                $this->is_completed = true;
                $this->save();
        }

        return $this->is_completed;
    }
}
