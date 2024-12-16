@extends('layout.app')
@section('link')
@endsection
@section('style')
<style>
    /* Position the toast at the top center of the screen */
    #myToast {
        position: fixed;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1055;
    }

    /* Countdown border animation */
    .toast .countdown {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 4px;
        background-color: rgb(255, 0, 157);
        width: 100%;
        animation: countdown 5s linear forwards;
    }

    @keyframes countdown {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
</style>
@endsection
@section('container')
    <div class="container pt-3">
        {{-- slide show  --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button> --}}
            </div>
            <div class="carousel-inner rounded rounded-5">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/icon/banner1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                {{-- <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/38/b9/d3/38b9d3c62a8d97701779106c95482b3e.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/5f/d3/67/5fd3675f7fa82c31a3a7d013623b227a.jpg" class="d-block w-100" alt="...">
                </div> --}}
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
                <a href="{{ route('shop.index') }}" class="text-decoration-none">
                    <div class="w-100 rounded rounded-5 overflow-hidden gd position-relative">
                        <img class="w-100 image-our-app" src="{{ asset('assets/img/shop/ps.jpg') }}" alt="Shop Image">
                        <h3 class="card-text py-2">Plot Rank</h3>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="text-decoration-none" id="showToastBtn" style="cursor: pointer"
                    data-bs-content="Coming Soon">
                    <div class="w-100 rounded rounded-5 overflow-hidden gd position-relative">
                        <img class="w-100 image-our-app" src="https://i.pinimg.com/736x/05/64/3b/05643b74dabbcdef5e6b413f96c0030a.jpg" alt="Shop Image">
                        <h3 class="card-text py-2">Minecraft Account</h3>
                    </div>
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
                    <p>Welcome to <strong> Champa Network</strong> , your ultimate destination for epic Minecraft
                        adventures! Founded in 2024,
                        our server is a vibrant and ever-growing community of players who share a passion for creativity,
                        competition, and collaboration. <br>
                        What We Offer: <br>
                        - Plots for Creativity: Build your dream creations on your very own plot. Whether you're designing a
                        cozy home or a sprawling castle, our plot system provides the perfect space for your imagination to
                        run wild.
                        <br>- PvP Battles: Engage in thrilling player-versus-player combat and test your skills against
                        others. Fight for glory, climb the leaderboards, and show everyone what you're made of!
                    </p>
                    <a href="{{ route('about.index') }}"
                        class="border border-1 border-primary rounded rounded-5 p-2 nav-link d-block  text-center">Read
                        more</a>
                </div>
            </div>
        </div>
    </div>




    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="{{ asset('assets/img/icon/logo.png') }}"  class="rounded me-2" style="width: 20px" alt="...">
            <strong class="me-auto">Please note</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body position-relative">
            Minecraft accounts will soon be available at the shop.
            <div class="countdown"></div>
        </div>
    </div>
    
@endsection

@section('js')
<script>
    // Initialize and show the toast on button click
    document.getElementById('showToastBtn').addEventListener('click', function () {
        const toastElement = document.getElementById('myToast');
        const toast = new bootstrap.Toast(toastElement, {
            autohide: true, // Enable auto-hide
            delay: 5000    // Set delay to 5000ms (5 seconds)
        });
        toast.show(); // Show the toast
    });
</script>
@endsection
