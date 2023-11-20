<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";
    public $timestamps = true;
    protected $primaryKey = 'id_admin';
    protected $fillable = ["fullname","username","password","email","level"];
}
