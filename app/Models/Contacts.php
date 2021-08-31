<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;


     protected $fillable = [
'name',
'email',
'description',
'subject',
'phone',
'is_agree',
'create_datetime',
'is_softdel',
'status'

];

protected $table="contacts";
}
