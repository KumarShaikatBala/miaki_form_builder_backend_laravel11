<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'type', 'name', 'label', 'placeholder', 'required', 'validation_rules'];

    protected $casts = [
        'validation_rules' => 'array',
    ];
}
