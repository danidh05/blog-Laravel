<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class POST
{
    public $title;
    public $date;
    public $body;

    public function __construct($title,$date,$body,$slug){
        $this->title=$title;
        $this->date=$date;
        $this->body=$body;
        $this->slug=$slug;
    }



    public static function all()
    {
        return cache()->rememberForever('posts.all',function(){//cache the memory ,la ybattel 
        return collect(File::files(resource_path("posts")))
        ->map(fn($file)=>$document=YamlFrontMatter::parseFile($file)
       )
         ->map(fn($document)=>new Post(
                $document->title,
                $document->date,
                $document->body(),
                $document->slug
         ))
         ->sortByDesc('date');
    
     //Find all the posts in the post directory and collect them
    //into a collection then loop or map  through them,and parse each file into a doc
    //Then map a second time 
});
    }




    public static function findOrFail($slug){
//of all the blog posts,Find the one with a slug that matches the one that was requested(lli bel arg)

//take all posts

$post= static::find($slug);//where slug equals the given slug as an arg

    
          if(!$post){
          throw new ModelNotFoundException();   
}

return $post;
}

public static function find($slug){

return static::all()->firstWhere('slug',$slug);

}
}//hayde lal post.php abel ma fawwet database
?>
---
title: My Fourth post
slug: my-fourth-post
date: 2021-06-21
---


<p>
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
</p>
<!--hole lkeno b folder l posts bas hala2 batalna 3aayziin  l folder fa m7iito 3shn b7affezon bel database -->