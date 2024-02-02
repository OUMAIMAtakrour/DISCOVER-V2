<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

    html body {
        overflow-x: hidden;
    }

    body {}

    header {
        width: 100vw;
        height: 100vh;
        background-image: url(" {{asset('/img/statistics-businessman-hologram-concept-futuristic-177197594.webp') }}");
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

    .counter {
        color: #fff;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        width: 210px;
        min-height: 246px;
        padding: 25px 0 0;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .counter:after {
        content: '';
        background: linear-gradient(to right, #eff0f2, #fefefe);
        height: 152px;
        width: 152px;
        border-radius: 15px;
        border: 3px solid #fff;
        box-shadow: 5px 0 8px rgba(0, 0, 0, 0.2);
        transform: translateX(-50%) rotate(45deg);
        position: absolute;
        top: 25px;
        left: 50%;
        z-index: -1;
    }

    .counter .counter-value {
        background: #fe8c00;
        font-size: 25px;
        font-weight: 600;
        letter-spacing: 2px;
        width: 100%;
        padding: 10px 0 6px;
        border-radius: 10px;
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.6), 0 0 0 2px #fff;
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: -1;
    }

    .counter .counter-icon {
        background: linear-gradient(to right, #fe8c00, #f83600);
        font-size: 30px;
        line-height: 60px;
        width: 60px;
        height: 60px;
        margin: 0 auto 20px;
        border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.4);
    }

    .counter h3 {
        color: #f83600;
        font-size: 17px;
        font-weight: 500;
        text-transform: capitalize;
        line-height: 22px;
        padding: 0 30px;
        margin: 0 0 15px;
    }

    .counter.green .counter-value {
        background: #01c700;
    }

    .counter.green .counter-icon {
        background: linear-gradient(to right, #01c700, #019b01);
    }

    .counter.green h3 {
        color: #019b01;
    }

    .counter.blue .counter-value {
        background: #28a9e2;
    }

    .counter.blue .counter-icon {
        background: linear-gradient(to right, #28a9e2, #0057c5);
    }

    .counter.blue h3 {
        color: #0057c5;
    }

    .counter.gray .counter-value {
        background: #36474f;
    }

    .counter.gray .counter-icon {
        background: linear-gradient(to right, #36474f, #0d0e10);
    }

    .counter.gray h3 {
        color: #0d0e10;
    }

    @media screen and (max-width:990px) {
        .counter {
            margin-bottom: 40px;
        }
    }

    section {
        height: 100vh;
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
                                <a class="nav-link active " aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item mx-3 text-center my-1 col-2">
                                <a class="nav-link" href="">Statistics</a>
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
    <section class="my-5 col-12">
        <div class="container col-12  d-flex justify-content-evenly">
            <div class="row col-10 justify-content-evenly">
                <div class="col-md-3 col-sm-6">
                    <div class="counter grey">
                        <div class="counter-content">
                            <div class="counter-icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <h3>DESTINATIONS COUNT</h3>
                        </div>
                        <span class="counter-value">{{ $destinationCount }}</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="counter green ">
                        <div class="counter-content">
                            <div class="counter-icon">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <h3>Total Image Count: </h3>
                        </div>
                        <span class="counter-value">{{ $imageCount }}</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="counter blue col-12">
                        <div class="counter-content col-12">
                            <div class="counter-icon">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <h3>Total Post Count: </h3>
                        </div>
                        <span class="counter-value">{{ $postCount }}</span>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>