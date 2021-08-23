<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Qoutes extends Model
{
    use HasFactory;

    protected $table="request_qoutes";


   public function getuserFromRequestqoute(){

 return $this->hasOne('App\Models\User','id','user_id');

   }


}
