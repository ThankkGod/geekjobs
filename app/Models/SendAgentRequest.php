<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendAgentRequest extends Model
{
    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_message',
    ];
}
