<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptVoucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'issue_type',
        'date',
        'client_id',
        'cost',
        'notes',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
