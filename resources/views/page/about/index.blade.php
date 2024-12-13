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
        .about-info{
              /* Use linear-gradient for the overlay and URL for the image */
              background-image:
                linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('{{ asset('assets/img/icon/sakura.gif') }}');

            /* Ensure the background covers the entire container */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .p-info-about{
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
                        <h5 class="text-center text-dark">Server Status: <span id="status" class="">Loading...</span></h5>
                        <h5 class="text-center text-dark">Online Players: <span id="online-players">0</span> / <span id="max-players">0</span></h5>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="container-fluid about-info p-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-4 p-3">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-6 col-lg-4">
                        <img src="{{ asset('assets/img/icon/logo.png') }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 p-3 d-flex align-items-center">
                <p class="text-light lh-3 p-info-about">Welcome to Champa Network , your ultimate destination for epic Minecraft adventures! Founded in 2024, our server is a vibrant and ever-growing community of players who share a passion for creativity, competition, and collaboration.
                    What We Offer:
                    - Plots for Creativity: Build your dream creations on your very own plot. Whether you're designing a cozy home or a sprawling castle, our plot system provides the perfect space for your imagination to run wild.
                    - PvP Battles: Engage in thrilling player-versus-player combat and test your skills against others. Fight for glory, climb the leaderboards, and show everyone what you're made of! </p>
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
@endsection
