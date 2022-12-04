<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Client;

class Source extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name' ,'description','created_by'];

    /*************************relations**************************/


    public function clients()
    {
        
        return $this->hasMany(Client::class);

    }//end of clients


}


