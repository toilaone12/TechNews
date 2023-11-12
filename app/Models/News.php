<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    public $timestamps = true;
    protected $primaryKey = 'id_news';
    protected $fillable = ["id_category","image_news","title_news","slug_news","summary_news","content_news","number_comments","number_views","is_hot","tag_news"];
}
