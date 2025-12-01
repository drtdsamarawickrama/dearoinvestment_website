<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleRecord extends Model
{
    use HasFactory;
    protected $table = 'vehicle_records';

    protected $fillable = [
        'id',
        'customer_id',
        'is_registered',
        'chassis_number',
        'engine_number',
        'engine_capacity',
        'number_plate',
        'registered_year',
        'make',
        'model',
        'manufactured_year',
        'meter_reading',
        'seating_capacity',
        'pic_registration_certificate',
        'pic_lessee_and_vehicle',
        'pic_vehicle_front',
        'pic_vehicle_rear',
        'pic_vehicle_left',
        'pic_vehicle_right',
        'pic_meter_reading',
        'pic_engine_number',
        'pic_chassis_number',
        'insurance_valuation',
        'lease_valuation',
        'is_completed',
        'created_at',
        'updated_at'
    ];

    public function getVehicleRecordEssentials(){
        $vehicleRecord = array();
        $vehicleRecord['customer_id'] = $this->customer_id;
        $vehicleRecord['is_registered'] = $this->is_registered?true:false;
        $vehicleRecord['chassis_number'] = $this->chassis_number;
        $vehicleRecord['engine_number'] = $this->engine_number;
        $vehicleRecord['engine_capacity'] = $this->engine_capacity;
        $vehicleRecord['number_plate'] = $this->number_plate;
        $vehicleRecord['registered_year'] = $this->registered_year;


        $vehicleRecord['make'] = $this->make;
        $vehicleRecord['model'] = $this->model;
        $vehicleRecord['manufactured_year'] = $this->manufactured_year;
        $vehicleRecord['meter_reading'] = $this->meter_reading;
        $vehicleRecord['seating_capacity'] = $this->seating_capacity;
        
        $vehicleRecord['pic_registration_certificate'] = $this->pic_registration_certificate;
        $vehicleRecord['pic_lessee_and_vehicle'] = $this->pic_lessee_and_vehicle;
        $vehicleRecord['pic_vehicle_front'] = $this->pic_vehicle_front;
        $vehicleRecord['pic_vehicle_rear'] = $this->pic_vehicle_rear;
        $vehicleRecord['pic_vehicle_left'] = $this->pic_vehicle_left;
        $vehicleRecord['pic_vehicle_right'] = $this->pic_vehicle_right;
        $vehicleRecord['pic_meter_reading'] = $this->pic_meter_reading;

        $vehicleRecord['pic_engine_number'] = $this->pic_engine_number;
        $vehicleRecord['pic_chassis_number'] = $this->pic_chassis_number;
        $vehicleRecord['insurance_valuation'] = $this->insurance_valuation;
        $vehicleRecord['lease_valuation'] = $this->lease_valuation;
        $vehicleRecord['is_completed'] = $this->is_completed;

        return $vehicleRecord;
    }

    public function isEssentialsCompleted():bool{
        if($this->is_registered == null) return false;

        if($this->is_registered){
            if($this->number_plate == null){ return false; }
            if($this->registered_year == null){ return false; }
        }

        if($this->chassis_number == null){ return false; }
        if($this->engine_number == null){ return false; }
        if($this->engine_capacity == null){ return false; }
        if($this->make == null){ return false; }
        if($this->model == null){ return false; }
        if($this->manufactured_year == null){ return false; }
        if($this->meter_reading == null){ return false; }
        if($this->seating_capacity == null){ return false; }

        return true;
    }

    public function isVehicleImagesAdded():bool{
        if($this->is_registered){
            if($this->pic_registration_certificate == null){ return false; }
        }

        if($this->pic_lessee_and_vehicle == null){ return false; }
        if($this->pic_vehicle_front == null){ return false; }
        if($this->pic_vehicle_rear == null){ return false; }
        if($this->pic_vehicle_left == null){ return false; }
        if($this->pic_vehicle_right == null){ return false; }
        if($this->pic_meter_reading == null){ return false; }
        if($this->pic_engine_number == null){ return false; }
        if($this->pic_chassis_number == null){ return false; }

        return true;
    }
}
