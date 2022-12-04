<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;


class Client extends Model
{
    use HasFactory,SoftDeletes;
    
    use LogsActivity;


    protected  $fillable =[
        'workspace', 'states', 'ap_mobile','ap_name','kind',
        'iban', 'vat_number', 'ap_email', 'id_number', 'p_o_box',
        'note', 'site', 'asign_by', 'city',
        'address', 'notes', 'user_id', 'cr',
        'source_id', 'total_refund','created_by','user_id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['workspace', 'states']);
        // Chain fluent methods for configuration options
    }   
    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //     ->logOnly(['workspace', 'states']);
    // }





    /********************************** relations **************************/

    // sources  
       
        public function source()
        {
            return $this->belongsTo( Source::class);
        }


        // user  

        public function user()
        {
            return $this->belongsTo( User::class);
        }

        public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults();
        }


    
}
