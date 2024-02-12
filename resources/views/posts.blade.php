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
            {!! $post !!}
        </article>
    @endforeach

    <a href="/">Go Back</a>

</body>
</html>