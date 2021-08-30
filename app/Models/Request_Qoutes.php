<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Qoutes extends Model
{
    use HasFactory;

    protected $table="request_qoutes";


    protected $fillable= [
    'user_id',
    'link_to_tendor',
    'tender_worth',
    'tender_colse_data',
    'tender_sector',

];


   public function getuserFromRequestqoute(){

 return $this->hasOne('App\Models\User','id','user_id');

   }


}
