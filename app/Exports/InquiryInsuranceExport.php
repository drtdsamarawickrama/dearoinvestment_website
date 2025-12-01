<?php

namespace App\Exports;

use App\Models\Inquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InquiryInsuranceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $inquiryState;
    protected $isAdmin;
    protected $districtIds;
    
    public function __construct($inquiryState, $isAdmin, $districtIds)
    {
        $this->inquiryState = $inquiryState;
        $this->isAdmin = $isAdmin;
        $this->districtIds = $districtIds;
    }

    public function collection()
    {
        if($this->isAdmin){
            if($this->inquiryState == 'ANY_STATE'){
                return Inquiry::select('inquiries.id', 'inquiries.inquiry_status', 'customer_profiles.first_name', 'customer_profiles.last_name', 'customer_profiles.email', 'customer_profiles.mobile_number', 'customer_profiles.dob', 'customer_profiles.address', 'districts.district_name', 'customer_profiles.nic', 'inquiry_insurances.inquiry_step', 'vehicle_records.is_registered', 'vehicle_records.chassis_number', 'vehicle_records.engine_number', 'vehicle_records.engine_capacity', 'vehicle_records.number_plate', 'vehicle_records.registered_year', 'vehicle_records.make', 'vehicle_records.model', 'vehicle_records.manufactured_year', 'vehicle_records.meter_reading', 'vehicle_records.seating_capacity')
                            ->join('customer_profiles', 'customer_profiles.id', '=', 'inquiries.customer_id')
                            ->join('inquiry_insurances', 'inquiry_insurances.id', '=', 'inquiries.reference_inquiry_id')
                            ->join('vehicle_records', 'vehicle_records.id', '=', 'inquiry_insurances.vehicle_id')
                            ->join('districts', 'districts.id', '=', 'customer_profiles.district')
                            ->where('inquiries.inquiry_type', 'INSURANCE')
                            ->get();
            }else{
                return Inquiry::select('inquiries.id', 'inquiries.inquiry_status', 'customer_profiles.first_name', 'customer_profiles.last_name', 'customer_profiles.email', 'customer_profiles.mobile_number', 'customer_profiles.dob', 'customer_profiles.address', 'districts.district_name', 'customer_profiles.nic', 'inquiry_insurances.inquiry_step', 'vehicle_records.is_registered', 'vehicle_records.chassis_number', 'vehicle_records.engine_number', 'vehicle_records.engine_capacity', 'vehicle_records.number_plate', 'vehicle_records.registered_year', 'vehicle_records.make', 'vehicle_records.model', 'vehicle_records.manufactured_year', 'vehicle_records.meter_reading', 'vehicle_records.seating_capacity')
                            ->join('customer_profiles', 'customer_profiles.id', '=', 'inquiries.customer_id')
                            ->join('inquiry_insurances', 'inquiry_insurances.id', '=', 'inquiries.reference_inquiry_id')
                            ->join('vehicle_records', 'vehicle_records.id', '=', 'inquiry_insurances.vehicle_id')
                            ->join('districts', 'districts.id', '=', 'customer_profiles.district')
                            ->where('inquiries.inquiry_type', 'INSURANCE')
                            ->where('inquiry_insurances.inquiry_step', $this->inquiryState)
                            ->get();
            }
        }else{
            if($this->inquiryState == 'ANY_STATE'){
                $districtIdList = $this->districtIds;
                return Inquiry::select('inquiries.id', 'inquiries.inquiry_status', 'customer_profiles.first_name', 'customer_profiles.last_name', 'customer_profiles.email', 'customer_profiles.mobile_number', 'customer_profiles.dob', 'customer_profiles.address', 'districts.district_name', 'customer_profiles.nic', 'inquiry_insurances.inquiry_step', 'vehicle_records.is_registered', 'vehicle_records.chassis_number', 'vehicle_records.engine_number', 'vehicle_records.engine_capacity', 'vehicle_records.number_plate', 'vehicle_records.registered_year', 'vehicle_records.make', 'vehicle_records.model', 'vehicle_records.manufactured_year', 'vehicle_records.meter_reading', 'vehicle_records.seating_capacity')
                            ->join('customer_profiles', 'customer_profiles.id', '=', 'inquiries.customer_id')
                            ->join('inquiry_insurances', 'inquiry_insurances.id', '=', 'inquiries.reference_inquiry_id')
                            ->join('vehicle_records', 'vehicle_records.id', '=', 'inquiry_insurances.vehicle_id')
                            ->join('districts', 'districts.id', '=', 'customer_profiles.district')
                            ->where('inquiries.inquiry_type', 'INSURANCE')
                            ->where('inquiries.inquiry_status','!=', 'DRAFT')
                            ->whereHas('customer', function ($query) use ($districtIdList) {
                                $query->whereIn('district', $districtIdList);
                            })->get();
            }else{
                $districtIdList = $this->districtIds;
                return Inquiry::select('inquiries.id', 'inquiries.inquiry_status', 'customer_profiles.first_name', 'customer_profiles.last_name', 'customer_profiles.email', 'customer_profiles.mobile_number', 'customer_profiles.dob', 'customer_profiles.address', 'districts.district_name', 'customer_profiles.nic', 'inquiry_insurances.inquiry_step', 'vehicle_records.is_registered', 'vehicle_records.chassis_number', 'vehicle_records.engine_number', 'vehicle_records.engine_capacity', 'vehicle_records.number_plate', 'vehicle_records.registered_year', 'vehicle_records.make', 'vehicle_records.model', 'vehicle_records.manufactured_year', 'vehicle_records.meter_reading', 'vehicle_records.seating_capacity')
                            ->join('customer_profiles', 'customer_profiles.id', '=', 'inquiries.customer_id')
                            ->join('inquiry_insurances', 'inquiry_insurances.id', '=', 'inquiries.reference_inquiry_id')
                            ->join('vehicle_records', 'vehicle_records.id', '=', 'inquiry_insurances.vehicle_id')
                            ->join('districts', 'districts.id', '=', 'customer_profiles.district')
                            ->where('inquiries.inquiry_type', 'INSURANCE')
                            ->where('inquiry_insurances.inquiry_step', $this->inquiryState)
                            ->where('inquiries.inquiry_status','!=', 'DRAFT')
                            ->whereHas('customer', function ($query) use ($districtIdList) {
                                $query->whereIn('district', $districtIdList);
                            })->get();
            }
        }
    }

    /**
     * Define the headers for the spreadsheet.
     */
    public function headings(): array
    {
        return [
            'Inquiry Number',
            'Status',
            'First Name',
            'Last Name',
            'Email',
            'Mobile',
            'DOB',
            'Address',
            'District',
            'NIC',
            'Inquiry State',
            'Is Registered',
            'Chassis Number',
            'Engine Number',
            'Engine Capacity',
            'Registration Numbe',
            'Registered Year',
            'Make',
            'Model',
            'Manufactured Year',
            'Meter Reading',
            'Seating Capacity',
        ];
    }
}
