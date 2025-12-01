<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLease extends Model
{
    use HasFactory;
    protected $table = 'payment_leases';

    protected $fillable = [
        'id',
        'lease_inquiry_id',
        'amount',
        'payment_term',
        'system_reference',
        'created_at',
        'updated_at'
    ];
}
