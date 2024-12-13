@extends('layout.app')

@section('link')
    <!-- Add any external links if necessary -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
@endsection

@section('style')
    <style>
        #content {
            /* background-image: url('https://i.pinimg.com/736x/3a/d8/5e/3ad85ea0b1a61d56b8e1e6e0850213dc.jpg'); */
            background-size: cover;
            background-position: center;
        }

        #loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            display: none;
        }


        .receipt-details h4 {
            word-break: break-word;
            /* Ensure long text wraps */
            overflow-wrap: break-word;
            white-space: normal;
            /* Prevent single-line overflow */
        }

        .receipt-details {
            /* max-width: 100%; */
            /* Ensure content fits within container */
        }
    </style>
@endsection

@section('container')
    <div class="container mt-5">
        <div class="card shadow-lg p-4" id="content">
            <div class="p-5">
                <div class="row">
                    <div class="col-12 pt-2">
                        <!-- Logo Section -->
                        <div class="w-50 d-flex justify-content-center m-auto pb-4">
                            <img class="w-25" src="{{ asset('assets/img/icon/logo.png') }}" alt="Logo">
                        </div>
                        <!-- Title Section -->
                        <h3 class="text-center fw-bold">CHAMPA NETWORK</h3>
                        <div class="pt-5">
                            <h4 class="mb-0 text-end  my-2">Receipt ID: <span
                                    class="text-success">{{ $receipt->receipt_uuid }}</span></h4>
                            <h5 class="mb-0 text-end my-2">Date:
                                <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $receipt->created_at)->format('d/m/Y h:00 A') }}</span>
                            </h5>
                        </div>
                        <div class="border-bottom border-2 mb-5"></div>

                        <!-- Receipt Details -->
                        <div>
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="mb-0">Username:</h4><br>
                                    <h4 class="mb-0">Platform:</h4><br>
                                    <h4 class="mb-0">Rank:</h4><br>

                                </div>
                                <div class="col-6">
                                    <h4 class="mb-0 text-end">{{ $receipt->username }}</h4><br>
                                    <h4 class="mb-0 text-end">{{ $receipt->platform }}</h4><br>
                                    <h4 class="mb-0 text-end">{{ $receipt->rank }}</h4><br>
                                </div>
                            </div>
                        </div>
                        <div class="receipt-details">
                            <hr class="border-bottom border-2 mb-4">
                            <div class="d-flex justify-content-end">
                                <h4 class="mb-0">Total: <span>{{ $receipt->price }}</span></h4>
                            </div>
                            <div>
                                <p class="text-center pt-5 h5">Thank You for Your Business!</p>
                                <div class="w-100 d-flex justify-content-center">
                                    <img class="w-25 m-auto" src="{{ asset('assets/img/shop/qr_dc.png') }}" alt="Logo">
                                </div>
                                <p class="text-center">For any queries, contact us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Download Button -->
            
        </div>
        <div class="text-center my-4 ">
            <button onclick="convertToImage()" class="btn btn-success btn-lg" aria-label="Download Receipt as Image">
                <i class="fas fa-download"></i> Download Full Receipt as JPG
            </button>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loading">Loading...</div>
@endsection

@section('js')
    <script>
        function convertToImage() {
            const element = document.getElementById('content');
            const loading = document.getElementById('loading');

            // Show loading spinner
            loading.style.display = 'block';

            // Adjust styles for export
            const originalStyles = {
                width: element.style.width,
                height: element.style.height,
            };

            element.style.width = '8.27in'; // A4 width
            element.style.height = '11.69in'; // A4 height
            element.style.overflow = 'hidden'; // Ensure no overflow

            domtoimage
                .toPng(element, {
                    quality: 1,
                })
                .then(function(dataUrl) {
                    const link = document.createElement('a');
                    link.href = dataUrl;
                    link.download = 'receipt.png';
                    link.click();
                })
                .catch(function(error) {
                    console.error('Error:', error);
                    alert('Failed to download the receipt. Please try again.');
                })
                .finally(() => {
                    // Restore original styles
                    element.style.width = originalStyles.width;
                    element.style.height = originalStyles.height;
                    loading.style.display = 'none';
                });
        }
    </script>
@endsection
