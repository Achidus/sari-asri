<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin'; // tabel kamu

    protected $fillable = ['name', 'email', 'password'];
}
