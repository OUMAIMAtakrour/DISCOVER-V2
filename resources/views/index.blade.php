<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>POST</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

    html body {
        overflow-x: hidden;
    }
body{
   

}
    header {
        width: 100vw;
        height: 100vh;
        background-image: url(" {{asset('/img/kvZlAgG.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: right;
        /* background: rgb(112,110,110);

    background: rgb(112,110,110);
    background: linear-gradient(138deg, rgba(112,110,110,1) 55%, rgba(122,121,121,1) 73%, rgba(140,140,140,0.6626109061788779) 100%, rgba(255,255,255,0.8586893375514268) 100%); */

        color: white;
    }

    .search {
        border-radius: 20px;
    }

    .navbar ul {
        border-radius: 20px;
        border-style: solid;
        border-color: white;
        color: black;

    }

    li,
    a {
        color: black;

    }

    li:hover {
        background-color: rgba(255, 255, 255, 0.427);
        border-radius: 30px;

    }

    .overlay {
        background-color: rgba(0, 0, 0, 0.498);
        width: 100vw;
        height: 100%;
    }

    .btn-three {
        color: #FFF;
        transition: all 0.5s;
        position: relative;
    }

    .btn-three::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        background-color: rgba(255, 255, 255, 0.1);
        transition: all 0.3s;
    }

    .btn-three:hover::before {
        opacity: 0;
        transform: scale(0.5, 0.5);
    }

    .btn-three::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        opacity: 0;
        transition: all 0.3s;
        border: 1px solid rgba(255, 255, 255, 0.5);
        transform: scale(1.2, 1.2);
    }

    .btn-three:hover::after {
        opacity: 1;
        transform: scale(1, 1);
    }

    .box-3 {
        line-height: 60vh;
    }

    .text {
        font-size: xx-large;
        font-weight: 400;
    }

    .image {



        border-radius: 20px;

    }



    /* This container is needed to position the front and back side */
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
        transform: rotateY(180deg);

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

    <header class="col-12">
        <div class="overlay col-12">
            <nav class="navbar navbar-expand-lg  bg-gradient">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img class="navbrand" src="../pics/melody-high-resolution-logo-white-transparent.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0  mx-3 col-8">
                            <li class="nav-item mx-4 col-3 text-center my-3 text-white">Discover The World</li>
                            <li class="nav-item mx-4 col-2 text-center my-1">
                                <a class="nav-link active " aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item mx-3 text-center my-1 col-2">
                                <a class="nav-link" href="./statistics">Statistics</a>
                            </li>
                            


                        </ul>

                    </div>
                </div>
            </nav>
            <div class="box-3 position-relative my-5">
                <div class="btn col-4 my-5 btn-three postion-absolute top-200 start-50 translate-middle">
                    <span class="text">DISCOVER THE WORLD</span>
                    <img class="col-2 class=" mx-3"" src="{{asset('/img/icons8-vers-le-bas-100.png') }}" alt="">
                </div>
            </div>
        </div>
    </header>

    <main>
    
        <div class="d-flex px-4 col-12  justify-content-end" style="height:6vh;">
        <button type="button" class="btn btn-secondary mx-5"><a href="/create">SHARE YOUR ADVENTURE</a></button>
            <form action="{{ route('filter-posts') }}" method="GET" class="col-7">
                @csrf
                <div class="input-group mb-3">
                    <label for="inputGroupSelect01" class="input-group-text">Destinations</label>
                    <select name="id" class="form-select">
                        <option value="">All Destinations</option>
                        @foreach ($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ $destination->des_name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <button type="submit" name="order" value="latest" class="btn btn-primary mx-3">Latest</button>
                    <button type="submit" name="order" value="oldest" class="btn btn-primary mx-3">Oldest</button>
                    
                </div>
            </form>
        </div>

        <!-- <div id="postsContainer"> -->
        <!-- Include the partial view to display posts -->
        <!-- @include('partials.posts', ['posts' => $posts]) -->
        <!-- </div> -->
        <div class="d-flex flex-wrap my-5">
            @foreach($posts as $post)
            <div class="flip-card mx-5  col-3 mb-5">
                <div class="flip-card-inner" style="height: 60vh;">
                    <div class="flipcard">
                        @foreach($post->images as $image)
                        <div class="d-flex flex-column"> <img src="{{ asset('storage/uploads/' . $image->url) }}" alt="Image" class="col-1">
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



    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>