<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public static function getUniqueSlug ($title){
        $slug = Str::slug($title);
        $slug_base = $slug;
        $counter = 1;

        $post_present = Post::where("slug",$slug)->first();

        while($post_present){
            $slug = $slug_base. "-" . $counter;
            $counter++;
            $post_present = Post::where("slug",$slug)->first();
        }

        return $slug;
    }

    protected $fillable = [
        "title",
        "content",
        "category_id",
        "published_at",
        "slug"
    ];

    public function category(){
        return $this->belongsTo("App\Category");
    }

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }
}


