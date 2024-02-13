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




    public static function find($slug){
//of all the blog posts,Find the one with a slug that matches the one that was requested(lli bel arg)

//take all posts

return static::all()->firstWhere('slug',$slug);//where slug equals the given slug as an arg

    //     $path = resource_path("posts/{$slug}.html");
    //      if(!file_exists($path)){
    //      throw new ModelNotFoundException();
    // }
    // return cache()->remember("posts.{$slug}",1200,fn()=> file_get_contents($path));
  
    // // return view('post',['post'=>$post]); because now were not returning the view
    // }

}
}