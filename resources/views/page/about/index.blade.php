@extends('layout.app')
@section('link')
@endsection
@section('style')
    <style>
        .card-about {
            /* Use linear-gradient for the overlay and URL for the image */
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('{{ asset('assets/img/icon/banner_gift.gif') }}');

            /* Ensure the background covers the entire container */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .about-info {
            /* Use linear-gradient for the overlay and URL for the image */
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.705), rgba(0, 0, 0, 0.733)),
                url('{{ asset('assets/img/icon/sakura.gif') }}');

            /* Ensure the background covers the entire container */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .p-info-about {
            text-align: justify;
            text-justify: inter-word;
        }
    </style>
@endsection
@section('container')
    <div class="container pt-3 pb-5">
        <div class="rounded rounded-5 shadow card-about p-5">
            <div class="row d-flex justify-content-center">
                <div class="col-3 col-lg-2">
                    <img src="{{ asset('assets/img/icon/logo.png') }}" alt="" class="w-100">
                </div>
            </div>

            <div>
                <h1 class="text-center text-light fw-bold py-4">CHAMPA NETWORK</h1>
                <h3 class="text-center text-light">IP : champa.lol</h3>
                <h3 class="text-center text-light">Port : 19132</h3>

                <div class="row pt-4">
                    <div class="rounded rounded-5 bg-light col-12 col-lg-6 p-4 m-auto">
                        <h5 class="text-center text-dark">Server Status: <span id="status"
                                class="">Loading...</span></h5>
                        <h5 class="text-center text-dark">Online Players: <span id="online-players">0</span> / <span
                                id="max-players">0</span></h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- server --}}
    {{-- session 3  --}}
    <div class="container py-3">
        <div class="row">
            <div class="col-12 col-lg-4 pt-3">
                <h3 class="fw-bold pb-3">Server &gt;</h3>
                <div class="row row-eq-height">
                    <div class="col-6">
                        {{-- {{ route('shop.index') }} --}}
                        <a class="text-decoration-none" style="cursor: pointer">
                            <div class="w-100 rounded rounded-5 overflow-hidden gd position-relative">
                                <img class="w-100 image-our-app" src="{{ asset('assets/img/icon/plot.jpg') }}"
                                    alt="Shop Image">
                                <h3 class="card-text py-2">Plot Server</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="text-decoration-none" id="showToastBtn" style="cursor: pointer"
                            data-bs-content="Coming Soon">
                            <div class="w-100 rounded rounded-5 overflow-hidden gd position-relative">
                                <img class="w-100 image-our-app"
                                    src="https://i.pinimg.com/736x/05/64/3b/05643b74dabbcdef5e6b413f96c0030a.jpg"
                                    alt="Shop Image">
                                <h3 class="card-text py-2">Soon...</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 pt-3">
                <h3 class="fw-bold pb-3">Information &gt;</h3>
                <div class="d-block">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="fetchInformation(1)"
                        class="btn btn-primary rounded-5 w-100 my-2 p-2 ps-3 text-start d-flex align-items-center">
                        <i class="bi bi-basket2-fill h3 m-0 p-0 me-2"></i>
                        <span>Our Rank</span>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="fetchInformation(2)"
                        class="btn btn-primary rounded-5 w-100 my-2 p-2 ps-3 text-start d-flex align-items-center">
                        <i class="bi bi-collection-play-fill h3 m-0 p-0 me-2"></i>
                        <span>How To Get Media Rank</span>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="fetchInformation(3)"
                        class="btn btn-primary rounded-5 w-100 my-2 p-2 ps-3 text-start d-flex align-items-center">
                        <i class="bi bi-info-circle h3 m-0 p-0 me-2"></i>
                        <span>Server Rules</span>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="fetchInformation(4)"
                        class="btn btn-primary rounded-5 w-100 my-2 p-2 ps-3 text-start d-flex align-items-center">
                        <i class="bi bi-bug-fill h3 m-0 p-0 me-2"></i>
                        <span>How To Report</span>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="fetchInformation(5)"
                        class="btn btn-primary rounded-5 w-100 my-2 p-2 ps-3 text-start d-flex align-items-center">
                        <i class="bi bi-headset h3 m-0 p-0 me-2"></i>
                        <span>Server Support and Assistance</span>
                    </button>


                </div>
            </div>
            <div class="col-12 col-lg-4 pt-3">
                <h3 class="fw-bold pb-3">Server Owner &gt;</h3>
                <div class="rounded rounded-5 shadow py-3 px-3">
                    <h4 class="text-center fw-bold">Owner</h4>
                    <div class="row d-flex justify-content-center">
                        <div class="col-6">
                            <img class="w-100" src="{{ asset('assets/img/icon/owner.png') }}" alt="">
                        </div>
                    </div>
                    <h5 class="text-center p-1">Su Mey</h5>
                </div>
            </div>
        </div>
    </div>
    {{-- about us  --}}
    <div class="container-fluid">
        <div class="ps-0 container py-3">
            <h3 class="fw-bold text-dark">About Us &gt;</h3>
        </div>
        <div class="container about-info p-3 p-lg-5 rounded rounded-5 mb-5">

            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-lg-4">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-6 col-lg-6">
                            <img src="{{ asset('assets/img/icon/logo.png') }}" alt="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 p-3 d-flex align-items-center">
                    <div>
                        <p class="text-light lh-5 p-info-about">Welcome to Champa Network , your ultimate destination for
                            epic
                            Minecraft adventures! Founded in 2024, our server is a vibrant and ever-growing community of
                            players
                            who share a passion for creativity, competition, and collaboration.
                            What We Offer:
                            - Plots for Creativity: Build your dream creations on your very own plot. Whether you're
                            designing a
                            cozy home or a sprawling castle, our plot system provides the perfect space for your imagination
                            to
                            run wild.
                            - PvP Battles: Engage in thrilling player-versus-player combat and test your skills against
                            others.
                            Fight for glory, climb the leaderboards, and show everyone what you're made of! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- staff  --}}

<div class="container pb-5">
    <div class="row">
        <div class="col-6 col-lg-3">
            <div class="shadow rounded rounded-5">
                <div class="p-4">
                    <h4 class="text-center fw-bold p-2">Owner</h4>
                    <img class="w-100" src="{{ asset('assets/img/icon/owner.png') }}" alt="">
                    <h5 class="pt-3">Name : Su Mey</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="shadow rounded rounded-5">
                <div class="p-4">
                    <h4 class="text-center fw-bold p-2">Admin</h4>
                    <img class="w-100" src="https://cdn.discordapp.com/avatars/1312970141230694555/0633a38378913d30b3af61493659336e.png?size=4096&ignore=true" alt="">
                    <h5 class="pt-3">Name : Cipher</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="shadow rounded rounded-5">
                <div class="p-4">
                    <h4 class="text-center fw-bold p-2">Moderator</h4>
                    <img class="w-100" src="https://cdn.discordapp.com/avatars/1058049067122434108/7c3580652897c312fb01fc09f278d535.png?size=4096&ignore=true" alt="">
                    <h5 class="pt-3">Name : Ly Nith</h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="shadow rounded rounded-5">
                <div class="p-4">
                    <h4 class="text-center fw-bold p-2">Moderator</h4>
                    <img class="w-100" src="https://cdn.discordapp.com/avatars/459154624230719489/737d3bc75cc68a99d06fb0ab55055285.png?size=4096&ignore=true" alt="">
                    <h5 class="pt-3">Name : Lyher</h5>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="full-info"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Define the API URL
            const apiUrl = "https://api.mcsrvstat.us/3/champa.lol";

            // Fetch server status using jQuery
            $.ajax({
                url: apiUrl,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    // Update the UI with fetched data
                    $("#status").text(data.online ? "Online" : "Offline");
                    $("#status").attr('class', data.online ? "text-success" : "text-danger");



                    $("#online-players").text(data.players?.online || 0);
                    $("#max-players").text(data.players?.max || 0);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to fetch server status:", error);
                    $("#status").text("Error fetching data");
                }
            });
        });
    </script>



    <script>
        function fetchInformation(key) {
            // Fetch the JSON file
            $.getJSON("{{ asset('assets/json/info.json') }}", function(data) {
                if (data[key]) {
                    // Update modal content with HTML
                    $('#exampleModalLabel').html(data[key].title);
                    $('#full-info').html(data[key].info);
                } else {
                    console.error("Invalid key provided.");
                }
            }).fail(function() {
                console.error("Error fetching JSON.");
            });
        }
    </script>
@endsection
