<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tag";
    public $timestamps = true;
    protected $primaryKey = 'id_tag';
    protected $fillable = ["title_tag"];
}
