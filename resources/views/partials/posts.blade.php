<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Document</title>
</head>
<body>
<div class="d-flex flex-wrap my-5">
            @foreach($posts as $post)
            <div class="flip-card mx-5  col-3 mb-5">
                <div class="flip-card-inner" style="height: 60vh;">
                    <div class="flipcard">
                        @foreach($post->images as $image)
                        <div class="d-flex flex-column"> <img class="image mx-3 my-5 col-10" src="{{ asset('storage/images/' . $image->url) }}"  alt="" style="max-height: 70%;">
                       </div>
                        @endforeach
                        <a href="">

                            <h4 class="mx-3">{{$post->title}}</h4>
                        </a>
                    </div>
                    <div class="flip-card-back">
                        <p class="my-3 col-10 text-center py-3">{{$post->description}}</p>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
</body>
</html>