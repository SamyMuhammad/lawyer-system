<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'civil_number',
        'phone',
        'description',
        'address',
        'job',
        'nationality',
        'notes',
    ];

    public function issues()
    {
        return $this->hasMany('App\Models\Issue');
    }

    public function receipt_vouchers()
    {
        return $this->hasMany('App\Models\ReceiptVoucher');
    }

    public function expert_issues()
    {
        return $this->hasMany('App\Models\ExpertIssue');
    }

    public function session_rolls()
    {
        return $this->hasMany('App\Models\SessionRoll');
    }
}
