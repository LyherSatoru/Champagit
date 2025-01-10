@extends('layout.app')
@section('link')
@endsection
@section('style')
@endsection
@section('container')
    <div class="container pb-5 px-4 p-lg-2">
        <h3 class="fw-bold py-5 pb-4">Rank Store ({{$rank}}) &gt;</h3>
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
        <div class="row rounded rounded-5 p-5 bg-light shadow">
            <div class="col-12 col-lg-6 d-flex justify-content-center align-item-center">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <img id="rank_img" class="w-100" src="{{ asset('assets/img/shop/viprank.png') }}" alt="error">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 py-5 d-flex justify-content-center">
                <div class="m-auto d-block">
                    <h4 class="p-0" id="rank_name"></h4>
                    <p id="rank_desc">


                    </p>
                </div>
            </div>
            <div class="col-12">
                <form class="" action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="server_check" value="{{$rank}}">
                    <div class="form-group py-4">
                        <label for="username" class="py-2">Minecraft Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group py-3">
                        <label for="Platform" class="py-2">Platform</label>
                        <select name="Platform" id="Platform" class="form-control">
                            <option value="JAVA" selected>JAVA 💻</option>
                            <option value="BEDROCK" selected>BEDROCK 📱</option>
                        </select>

                    </div>
                    <div class="form-group py-3">
                        <label for="rank" class="py-2">Rank</label>
                        <select name="rank" id="rank" class="form-control" onchange="price_check()">
                            @if($rank == 'economy')
                            <option value="VIP" selected>VIP 🌟</option>
                            <option value="MVP">MVP 🏆</option>
                            <option value="MVP_PLUS">MVP+ 🔥</option>
                            <option value="KING">KING 👑</option>
                            <option value="ULTRA">ULTRA 🚀</option>
                        @elseif($rank == 'plot')
                            <option value="PLOT_VIP" selected>VIP 🌟</option>
                            <option value="PLOT_KING">KING 👑</option>
                        @endif
                        </select>

                    </div>
                    <div class="form-group py-3">
                        <label for="price" class="py-2">Price</label>
                        <input type="text" class="form-control" id="price" name="price" readonly required>
                    </div>
                    <div class="form-group py-3">
                        <label for="payment" class="py-2">Payment</label>
                        <input type="file" class="form-control" id="payment" name="payment" required accept="image/*">
                    </div>
                    <div class="w-100 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Buy Now</button>

                    </div>
                    <div class="w-100 py-2">
                        <div class="row align-content-center">
                            <div class="col-10 col-lg-4 m-auto">
                                <img class="w-100" src="{{ asset('assets/img/shop/qr.jpg') }}" alt="">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function price_check() {
            // Define rank details
            var ranks = {
                'VIP': {
                    name: 'Benefits of VIP Rank',
                    description: `
                    Price : <span class="text-success h3">5$</span>
                    <br>Exclusive chat colors 💬
                    <br>Access to VIP-only commands ⚡
                    <br>Special perks on the server 🎮
                    <br>Priority access to events 🏆
                    <br>A cool VIP prefix in your name! ✨
                `,
                    image: 'r_vip.png',
                    price: '5$',
                    claim_all_kits: false
                },
                'MVP': {
                    name: 'Benefits of MVP Rank',
                    description: `
                    Price : <span class="text-success h3">10$</span>
                    <br>Exclusive chat colors 💬
                    <br>Access to MVP-only commands ⚡
                    <br>Special perks on the server 🎮
                    <br>Priority access to events 🏆
                    <br>A cool MVP prefix in your name! ✨
                `,
                    image: 'r_mvp.png',
                    price: '10$',
                    claim_all_kits: false
                },
                'MVP_PLUS': {
                    name: 'Benefits of MVP+ Rank',
                    description: `
                    Price : <span class="text-success h3">15$</span>
                    <br>Exclusive chat colors 💬
                    <br>Access to MVP+ commands ⚡
                    <br>Special perks on the server 🎮
                    <br>Priority access to events 🏆
                    <br>A cool MVP+ prefix in your name! ✨
                `,
                    image: 'r_mvp_p.png',
                    price: '15$',
                    claim_all_kits: false
                },
                'KING': {
                    name: 'Benefits of KING Rank',
                    description: `
                    Price : <span class="text-success h3">20$</span>
                    <br>Exclusive chat colors 💬
                    <br>Access to King-only commands ⚡
                    <br>Special perks on the server 🎮
                    <br>Priority access to events 🏆
                    <br>A cool King prefix in your name! ✨
                `,
                    image: 'r_king.png',
                    price: '20$',
                    claim_all_kits: false
                },
                'ULTRA': {
                    name: 'Benefits of ULTRA Rank',
                    description: `
                    Price : <span class="text-success h3">30$</span>
                    <br>Exclusive chat colors 💬
                    <br>Access to Ultra commands ⚡
                    <br>Special perks on the server 🎮
                    <br>Priority access to events 🏆
                    <br>A cool Ultra prefix in your name! ✨
                    <br>Claim all kits available! 🎁
                `,
                    image: 'r_ultra.jpg',
                    price: '30$',
                    claim_all_kits: true
                }
                ,
                'PLOT_VIP': {
                    name: 'Benefits of VIP Rank',
                    description: `
                    Price : <span class="text-success h3">5$</span>
                    <br>Exclusive chat colors 💬
                    <br>Access to VIP commands ⚡
                    <br>Special perks on the server 🎮
                    <br>Priority access to events 🏆
                    <br>A cool VIP prefix in your name! ✨
                `,
                    image: 'viprank.png',
                    price: '5$',
                    claim_all_kits: false
                }
                ,
                'PLOT_KING': {
                    name: 'Benefits of KING Rank',
                    description: `
                    Price : <span class="text-success h3">15$</span>
                    <br>Exclusive chat colors 💬
                    <br>Access to KING commands ⚡
                    <br>Special perks on the server 🎮
                    <br>Priority access to events 🏆
                    <br>A cool KING prefix in your name! ✨
                `,
                    image: 'kingrank.png',
                    price: '15$',
                    claim_all_kits: false
                }
            };

            // Get the selected rank value
            var rank = $('#rank').val();

            // Update details based on the selected rank
            if (ranks[rank]) {
                var rankData = ranks[rank];
                $('#rank_img').attr('src', `{{ asset('assets/img/shop/${rankData.image}') }}`);
                $('#price').val(rankData.price);
                $('#rank_name').html(rankData.name);
                $('#rank_desc').html(rankData.description);

                // Handle kit claim logic for ULTRA rank
                if (rankData.claim_all_kits) {
                    $('#kit_claim').html('<span class="text-success">You can claim all kits! 🎁</span>');
                } else {
                    $('#kit_claim').html('<span class="text-danger">Only specific kits available for this rank.</span>');
                }
            }
        }

        price_check();
    </script>
@endsection
