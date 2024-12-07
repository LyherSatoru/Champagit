@extends('layout.app')
@section('link')
@endsection
@section('style')
@endsection
@section('container')
    <div class="container pt-3">
        {{-- slide show  --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner rounded rounded-5">
                <div class="carousel-item active">
                    <img src="https://e0.pxfuel.com/wallpapers/492/655/desktop-wallpaper-survival-alex-and-steve-life-minecraft-animation-minecraft-anime-minecraft-posters-minecraft-minecraft-alex.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/icon/banner2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/icon/banner3.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        {{-- card  --}}

        <div class="row ">
            <div class="col-12">
                <h3 class="fw-bold py-5 pb-4">Our Store &gt;</h3>
            </div>
            <div class="col-6 col-lg-3">
                <a href="{{ route('shop.index') }}">
                    <div class="w-100  rounded rounded-5 overflow-hidden gd">
                        <img class="w-100 image-our-app" src="{{ asset('assets/img/shop/ps.jpg') }}" alt="">
                    </div>
                    <h3 class="card-text">Plot Rank</h3>
                </a>
            </div>
            {{-- <div class="col-6 col-lg-3">
                <a href="#" class="">
                    <div class="w-100  rounded rounded-5 overflow-hidden">
                        <img class="w-100 image-our-app"
                            src="https://i.pinimg.com/originals/36/1d/5c/361d5cb71a00267045aa9d5acb747f44.gif"
                            alt="">
                    </div>
                    <h3 class="card-text">Coming soon</h3>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="#">
                    <div class="w-100  rounded rounded-5 overflow-hidden gd">
                        <img class="w-100 image-our-app"
                            src="https://i.pinimg.com/736x/e0/f0/d3/e0f0d3197ab23d8f01019591d1971d8a.jpg" alt="">
                    </div>
                    <h3 class="card-text">Coming soon</h3>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="#" class="">
                    <div class="w-100  rounded rounded-5 overflow-hidden">
                        <img class="w-100 image-our-app"
                            src="https://i.pinimg.com/originals/36/1d/5c/361d5cb71a00267045aa9d5acb747f44.gif"
                            alt="">
                    </div>
                    <h3 class="card-text">Coming soon</h3>
                </a>
            </div> --}}
        </div>


        {{-- about us  --}}
        <h3 class="fw-bold py-4">About Us &gt;</h3>
        <div class="row bg-light shadow rounded rounded-5 p-5 mb-5">
            <div class="col-12 col-lg-4 d-flex py-3">
                <div class="row d-flex justify-content-center align-content-center">
                    <div class="col-4 col-lg-8">
                        <img class="w-100 rounded rounded-5" src="{{ asset('assets/img/icon/logo.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 py-3 d-flex justify-content-center align-content-center">
                {{-- <h2>About Me</h2> --}}
                <div class="">
                    <p>Welcome to <strong> Champa Network</strong> , your ultimate destination for epic Minecraft adventures! Founded in 2024,
                        our server is a vibrant and ever-growing community of players who share a passion for creativity,
                        competition, and collaboration. <br>
                        What We Offer: <br>
                        - Plots for Creativity: Build your dream creations on your very own plot. Whether you're designing a cozy home or a sprawling castle, our plot system provides the perfect space for your imagination to run wild.
                        <br>- PvP Battles: Engage in thrilling player-versus-player combat and test your skills against others. Fight for glory, climb the leaderboards, and show everyone what you're made of!
                    </p>
                    <a href="#"
                        class="border border-1 border-primary rounded rounded-5 p-2 nav-link d-block  text-center">Read
                        more</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
