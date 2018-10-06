<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employer extends Model
{
     protected $fillable = [
        'first_name', 'last_name', 'keywords','filename', 'mime','original_filename'
    ];
}
