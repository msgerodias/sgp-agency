<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'last_name', 'first_name', 'middle_name', 'birthdate','gender',
        'street', 'barangay', 'municipality_city', 'province',
        'contact_number', 'alternative_number', 'email_address',
        'civil_status', 'spouse_name', 'spouse_contact_number',
        'highest_educational_attainment',
        'is_ex_abroad', 'last_country', 'years_abroad',
        'application_type', 'earliest_availability'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(ProfileAttachment::class);
    }
}
