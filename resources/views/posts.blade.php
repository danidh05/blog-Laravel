<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
   
@foreach($posts as $post)
        <article>
           <h1>
             <a href="/posts/<?=$post->slug;?>">
            <?=$post->title;?>
            </a> 
           </h1>
           <div>
            <?=$post->body;?>
           </div>
        </article>
    @endforeach

   
</body>
</html>