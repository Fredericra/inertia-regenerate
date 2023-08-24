<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as admina;

class Admin extends Model implements admina
{
    use HasFactory,Authenticatable;
    protected $fillable = ["pseudo","email","password"];
}
