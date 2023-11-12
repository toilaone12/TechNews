<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";
    public $timestamps = true;
    protected $primaryKey = 'id_category';
    protected $fillable = ["name_category","id_parent","slug_category"];
}