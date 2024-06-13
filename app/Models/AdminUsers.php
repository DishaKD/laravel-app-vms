<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminUsers extends Model
{
    use HasFactory;

    protected $table = 'admin_users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
