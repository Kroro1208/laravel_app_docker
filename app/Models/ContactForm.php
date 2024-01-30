<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [ // postで送信するformのname属性の値を記載
        'name',
        'title',
        'email',
        'url',
        'gender',
        'age',
        'contact'
    ];
}
