<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpertIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_court_code',
        'type',
        'experts_court',
        'expert_name',
        'client_id',
        'opponent_name',
        'opponent_description',
        'previous_decision',
        'floor_number',
        'hall_number',
        'date',
    ];

    public function getDateWithDayNameAttribute()
    {
        $d = Carbon::parse($this->date);
        return $d->locale('ar')->dayName . '، ' .'<bdi>'. $this->date . '</bdi>';
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
