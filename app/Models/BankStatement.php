<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankStatement extends Model
{
    use HasFactory;
    protected $table = 'bank_statements';

    protected $fillable = [
        'id',
        'owner_type',
        'customer_id',
        'guarantor_id',
        'statement_start_date',
        'statement_end_date',
        'statement_file',
        'created_at',
        'updated_at'
    ];

    public function getBankStatementEssentials(){
        $bankStatement = array();
        $bankStatement['id'] = $this->id;
        $bankStatement['owner_type'] = $this->owner_type;
        $bankStatement['customer_id'] = $this->customer_id;
        $bankStatement['guarantor_id'] = $this->guarantor_id;
        $bankStatement['statement_start_date'] = $this->statement_start_date;
        $bankStatement['statement_end_date'] = $this->statement_end_date;
        $bankStatement['statement_file'] = $this->statement_file;

        return $bankStatement;
    }

    public static function getInquiryStatements($inquiry){
        $dateStatementsFrom = Carbon::parse($inquiry->created_at)->subMonths(6)->startOfMonth();
        $dateStatementsTo = Carbon::parse($inquiry->created_at)->subMonths(1)->endOfMonth();
        $statements = BankStatement::where('customer_id', $inquiry->customer_id)->where('owner_type', 'CUSTOMER')->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo)))->get();

        return $statements;
    }

    public static function getGuarantorStatements($inquiryLease){
        $dateStatementsFrom = Carbon::parse($inquiryLease->created_at)->subMonths(6)->startOfMonth();
        $dateStatementsTo = Carbon::parse($inquiryLease->created_at)->subMonths(1)->endOfMonth();
        $statements = BankStatement::where('guarantor_id', $inquiryLease->guarantor_id)->where('owner_type', 'GUARANTOR')->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo)))->get();

        return $statements;
    }

    public static function getGuarantor2Statements($inquiryLease){
        $dateStatementsFrom = Carbon::parse($inquiryLease->created_at)->subMonths(6)->startOfMonth();
        $dateStatementsTo = Carbon::parse($inquiryLease->created_at)->subMonths(1)->endOfMonth();
        $statements = BankStatement::where('guarantor_id', $inquiryLease->guarantor2_id)->where('owner_type', 'GUARANTOR')->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo)))->get();

        return $statements;
    }

    public static function isBankStatementsProvided($currentDate, $customerId){
        $statementsProvided = true;
        
        for($i=6; $i>0; $i--){
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('customer_id', $customerId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                $statementsProvided = false;
                break;
            }
        }

        return $statementsProvided;
    }

    public static function getMissingStatementsMessage($currentDate, $customerId){
        $missingStatements = null;
        
        for($i=6; $i>0; $i--){
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('customer_id', $customerId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                if($missingStatements == null){
                    $missingStatements = $dateStatementsFrom->year.'-'.$dateStatementsFrom->month;
                }else{
                    $missingStatements = $missingStatements.', '.$dateStatementsFrom->year.'-'.$dateStatementsFrom->month;
                }
            }
        }

        return $missingStatements;
    }

    public function isGuarantorBankStatementsProvided($currentDate, $guarantorId){
        $statementsProvided = true;
        
        for($i=6; $i>0; $i--){
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('guarantor_id', $guarantorId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                $statementsProvided = false;
                break;
            }
        }

        return $statementsProvided;
    }

    public static function isGuarantorsBankStatementsProvided($currentDate, $guarantorId){
        $statementsProvided = true;
        
        for($i=6; $i>0; $i--){
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('guarantor_id', $guarantorId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                $statementsProvided = false;
                break;
            }
        }

        return $statementsProvided;
    }

    public static function getGuarantorMissingStatementsMessage($currentDate, $guarantorId){
        $missingStatements = null;
        for($i=6; $i>0; $i--){
            
            $dateStatementsFrom = Carbon::parse($currentDate)->subMonths($i)->startOfMonth();
            $dateStatementsTo = Carbon::parse($currentDate)->subMonths($i)->endOfMonth();
            if(!(BankStatement::where('guarantor_id', $guarantorId)->where('statement_start_date', '<=', date('Y-m-d', strtotime($dateStatementsFrom)))->where('statement_end_date', '>=', date('Y-m-d', strtotime($dateStatementsTo))))->exists()){
                if($missingStatements == null){
                    $missingStatements = $dateStatementsFrom->year.'-'.$dateStatementsFrom->month;
                }else{
                    $missingStatements = $missingStatements.', '.$dateStatementsFrom->year.'-'.$dateStatementsFrom->month;
                }
            }
        }

        return $missingStatements;
    }
}
