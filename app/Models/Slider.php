<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $fillable = [
        'title',
        'image',
        'button_text',
        'button_link',
        'priority',
    ];
}
