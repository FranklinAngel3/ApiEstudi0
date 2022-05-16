<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model{
    protected $table = "authors";

     protected $fillable = [
        'name',
        'email',
        'github',
        'twitter',
        'location',
        'latest_article_published',
     ];

     protected $hidden = [];
    // public $timestamps = false;
}
