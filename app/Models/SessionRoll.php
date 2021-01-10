<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SessionRoll extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'court',
        'client_id',
        'opponent_name',
        'opponent_description',
        'session_date',
        'previous_decision',
        'date',
        'notes',
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
