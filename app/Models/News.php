<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{


     protected $fillable = [
'title',
'slug',
'post_type',
'description' ,
'create_datetime',
'featured_img',
'org_name',
'author',
'is_softdel',
'status'

];

protected $table="news";
    use HasFactory;
}
