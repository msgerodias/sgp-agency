<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileAttachment extends Model
{
    protected $fillable = ['profile_id', 'type', 'file_path'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}