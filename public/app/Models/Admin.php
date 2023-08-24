<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as Authorisation;

class Admin extends Model implements Authorisation
{
    use HasFactory,Authenticatable;
    protected $fillable = ["pseudo","email","password"];
}
