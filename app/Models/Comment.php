<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comment";
    public $timestamps = true;
    protected $primaryKey = 'id_comment';
    protected $fillable = ["id_user","id_news","comment","id_reply"];
}
