<?php

namespace ProtoneMedia\LaravelFormComponents\Tests\Feature;

use Illuminate\Database\Eloquent\Model;

class ActivityModel extends Model
{
    public $casts = [
        'date_b' => 'date',
        'date_c' => 'datetime',
        'date_d' => 'date:Y',
        'date_e' => 'datetime:Y-m',
        'date_f' => 'immutable_date:Y',
        'date_g' => 'immutable_datetime:Y-m',
    ];

    public $dates = ['date_a'];
}
