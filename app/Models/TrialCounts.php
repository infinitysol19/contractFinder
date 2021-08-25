<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrialCounts extends Model
{
    use HasFactory;

     protected $table="trial_counts";

      protected $fillable = [
        'user_id',
        'package_id',
        'trial_count',

        ];
}
