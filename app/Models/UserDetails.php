<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
    	'user_id', 'first_name', 'last_name', 'phone_number', 'address', 'cnic', 'profile_image', 'location', 'city', 'latitude', 'longitude', 'skills', 'occupation', 'user_type'
    ];
}
