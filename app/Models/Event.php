<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    protected $fillable = [
        'event_name',
        'start',
        'end',
        'description',
        'attendants',
        'status'
    ];

    public static function getOpenEvents()
    {
        $events = self::where(['status'=>'OPEN'])->get()->groupBy(function($item)
        {
            return Carbon::parse($item->start)->format('d-M-y');
        });



        return $events;
    }
}