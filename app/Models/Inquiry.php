<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $table = 'inquiries';

    protected $fillable = [
        'customer_id',
        'inquiry_type',
        'inquiry_status',
        'reference_inquiry_id',
        'created_at',
        'updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo(CustomerProfile::class);
    }

    public function inquiry_lease(){
        return $this->hasOne(InquiryLease::class, 'id', 'reference_inquiry_id');
    }

    public function inquiry_fd(){
        return $this->hasOne(InquiryFd::class, 'id', 'reference_inquiry_id');
    }

    public function inquiry_insurance(){
        return $this->hasOne(InquiryFd::class, 'id', 'reference_inquiry_id');
    }

    public function inquiry_pawning(){
        return $this->hasOne(InquiryFd::class, 'id', 'reference_inquiry_id');
    }

    public static function getStatTotalInquiries():int{
        $totalInquiryCount = 0;
        $inquiries = Inquiry::all();
        
        if($inquiries){ 
            $totalInquiryCount = count($inquiries); 
        }
        return $totalInquiryCount;
    }

    public static function getStatTotalLeasingInquiries():int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_type', 'LEASE')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }

    public static function getStatTotalFDInquiries():int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_type', 'FD')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }

    public static function getStatTotalInsuranceInquiries():int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }

    public static function getStatTotalPawningInquiries():int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_type', 'PAWNING')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }

    // Branch Statistics by Districts Provided
    public static function getStatTotalInquiriesOfDistricts($districtIds):int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_status','!=', 'DRAFT')
            ->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }

    public static function getStatTotalLeasingInquiriesOfDistricts($districtIds):int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_type', 'LEASE')
            ->where('inquiry_status','!=', 'DRAFT')
            ->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }

    public static function getStatTotalFdInquiriesOfDistricts($districtIds):int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_type', 'FD')
            ->where('inquiry_status','!=', 'DRAFT')
            ->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }

    public static function getStatTotalInsuranceInquiriesOfDistricts($districtIds):int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_type', 'INSURANCE')
            ->where('inquiry_status','!=', 'DRAFT')
            ->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }

    public static function getStatTotalPawningInquiriesOfDistricts($districtIds):int{
        $inquiryCount = 0;
        $inquiries = Inquiry::where('inquiry_type', 'PAWNING')
            ->where('inquiry_status','!=', 'DRAFT')
            ->whereHas('customer', function ($query) use ($districtIds) {
                $query->whereIn('district', $districtIds);
            })->latest('updated_at')->get();
        
        if($inquiries){ 
            $inquiryCount = count($inquiries); 
        }
        return $inquiryCount;
    }
}
