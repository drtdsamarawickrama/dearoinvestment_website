<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingProof extends Model
{
    use HasFactory;
    protected $table = 'billing_proofs';

    protected $fillable = [
        'id',
        'owner_type',
        'customer_id',
        'guarantor_id',
        'proof_type',
        'title',
        'document_file',
        'created_at',
        'updated_at'
    ];

    public function getBillingProofEssentials(){
        $billingProof = array();
        $billingProof['owner_type'] = $this->owner_type;
        $billingProof['customer_id'] = $this->customer_id;
        $billingProof['guarantor_id'] = $this->guarantor_id;
        $billingProof['proof_type'] = $this->proof_type;
        $billingProof['title'] = $this->title;
        $billingProof['document_file'] = $this->document_file;

        return $billingProof;
    }
}
