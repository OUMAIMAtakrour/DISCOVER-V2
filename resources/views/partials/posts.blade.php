<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Document</title>
</head>
<style>
    .flip-card-inner {
        /* position: relative; */
        height: auto;
        border-radius: 20px;
        box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.45);
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }

    /* Do an horizontal flip when you move the mouse over the flip box container */
    .flip-card:hover .flip-card-inner {
        height: auto;
       

    }

    /* Position the front and back side */
    .flipcard,
    .flip-card-back {
        height: auto;
        position: absolute;

        -webkit-backface-visibility: hidden;
        /* Safari */
        backface-visibility: hidden;
    }




    .flip-card-back {

        transform: rotateY(180deg);
    }
</style>

<body>
    <div class="d-flex flex-wrap my-5">
        @foreach($posts as $post)
        <div class="flip-card mx-5 col-10  mb-5">
            <div class="flip-card-inner my-5" style="height: 60vh;">
                <div class="flipcard my-5 col-10 mx-5 text-center">
                    @foreach($post->images as $image)
                    <div class="d-flex flex-column"> <img class="image mx-3 my-5 col-10" src="{{ asset('storage/images/' . $image->url) }}" alt="" style="max-height: 70%;">
                    </div>
                    @endforeach
                    <a href="">

                        <h4 class="mx-3">{{$post->title}}</h4>
                    </a>
                    <p class="my-3 py-3">{{$post->description}}</p>
                </div>
                <div class="flip-card-back">
                   
                </div>
            </div>

        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>