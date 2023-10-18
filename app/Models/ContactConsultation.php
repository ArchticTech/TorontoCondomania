<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactConsultation extends Model
{
    use HasFactory;

    protected $table = 'contact_consultation';

    protected $fillable = [
        'full_name',
        'phone_no',
        'email_address',
        'call_response',
        'isBroker',
        'looking_for_purchase',
        'message_consultation',
    ];
}

