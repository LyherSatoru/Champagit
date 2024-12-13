@extends('layout.app')
@section('link')
@endsection
@section('style')
@endsection
@section('container')
    <div class="container pb-5 px-4 p-lg-2">
        <h3 class="fw-bold py-5 pb-4">Minecraft Account Store &gt;</h3>
        <div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            {{-- {{ session('job_id') }} --}}
        </div>
        <div class="rounded rounded-5 shadow p-5">
            <div class="row d-flex align-content-center">
                <div class="col-5 col-lg-2 m-auto">
                    <img class="w-100" src="{{ asset('assets/img/shop/mc.gif') }}" alt="">
                </div>
                <div class="col-12 p-1 p-lg-5 mt-3">
                    <h2 class="fw-bold lh-5">Minecraft: Java and Bedrock Edition for PC Windows 10/11 Account</h2>
                    <h2 class="fw-bold lh-5 text-success">Price : <span class="h1 fw-bold">10$</span> only</h2>
                    <h3 class="fw-bold lh-5">Seller Reminder ❗️</h3>
                    <p>✅Safety Account Warranty 100% <br>
                        ✅If you have any questions or need a custom deal you can contact us beforehand using discord server
                        ticket. <br>
                        ✅Support 24/7 <br>
                        ✅Delivery Full Info when you made Purchase ⚡Faster and safe⚡ <br>
                        <span class="text-danger fw-bold"><br>
                            ✅After completing your purchase, we will verify your payment information. Once verified, we will
                            send you a full-access Minecraft account linked to a Microsoft account, including the associated
                            email and password. You will have the ability to change any account information as needed." Let
                            me know if you need any further changes!
                        </span>
                    </p>
                    <div class="row">
                        <div class="col-12 col-lg-4 m-auto py-5">
                            <img class="w-100" src="{{ asset('assets/img/shop/qr.jpg') }}" alt="">
                        </div>
                    </div>
                    <div>
                        <h3>Please provide the necessary information to purchase an account</h3>
                        <form action="">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="" id=""
                                    aria-describedby="emailHelpId" placeholder="abc@mail.com" />
                                <small id="emailHelpId" class="form-text text-muted">Help text</small>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
