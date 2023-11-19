<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "user";
    public $timestamps = true;
    protected $primaryKey = 'id_user';
    protected $fillable = ["fullname_user","username","email_user","password_user"];
}
