<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Visitorlog extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'lb_t_visitorlog';
    protected $primaryKey = 'id';
    protected $uniqueKey = ['daily_key', 'daily_no', 'remember_token'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'daily_key',
        'daily_no',
        'remember_token',
        'visit_date',
        'visitor_name',
        'visitor_company',
        'visitor_telp',
        'visitor_email',
        'pic_name',
        'pic_department',
        'purpose',
        'checkin_time_at',
        'checkin_image',
        'checkout_time_at',
        'checkout_image',
        'visit_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'duration_datetime',
        'duration_day',
        'duration_hours',
        'duration_minutes',
        'duration_seconds',
        'remember_token'
    ];
}
