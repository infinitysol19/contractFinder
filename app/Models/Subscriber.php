<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{


    use HasFactory;

    protected $fillable = [
'email',
'description' ,
'create_datetime',
'is_softdel',
'status'

];
  
protected $table="subscriber";
}
