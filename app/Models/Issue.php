<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_number', // رقم القضية
        'issue_court_code', // الرقم الآلي للقضية في المحكمة
        // 'client_code', // رقم العميل في المكتب
        // 'client_name',
        'client_id',
        'opponent_name',
        'court_name',
        'type', // نوع الدعوى
        'subject',
        'issue_date',
        'session_date',
        // 'client_description', // صفة الموكل
        'opponent_description', // صفة الخصم
        'previous_decision',
        'issue_status',
        'contract_value',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
