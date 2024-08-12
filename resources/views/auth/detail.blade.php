@extends('layout.auth.main')
@section('content')
    <!-- End Header/Navigation -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Detail Product</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                </div>
            </div>
        </div>
    </div>
    <!-- Start Hero Section -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6">
                <img class="img-fluid ps-5  " style="width: 400px;height: 400px;" src="{{ Storage::url($product->image) }}"
                    alt="">
                {{-- <div class="row">
                    <div class="col-sm-3 m-2 ">
                        <img class="img-fluid"
                            src="{{ asset('auth/images') }}/air-jordan-1-elevate-low-shoes-XlkVrM-removebg-preview.png"
                            alt="">
                    </div>
                    <div class="col-sm-3 m-2">
                        <img class="img-fluid"
                            src="{{ asset('auth/images') }}/air-jordan-1-elevate-low-shoes-XlkVrM-removebg-preview.png"
                            alt="">
                    </div>
                    <div class="col-sm-3 m-2">
                        <img class="img-fluid"
                            src="{{ asset('auth/images') }}/air-jordan-1-elevate-low-shoes-XlkVrM-removebg-preview.png"
                            alt="">
                    </div>
                </div> --}}
            </div>
            <div class="col-sm-6">
                <div class="pe-5">
                    <h1>{{ $product->product_name }}</h1>
                    <h5>{{ $product->description }}</h5>
                    <p class="fs-4">Gia san pham : @if ($product->sale_price)
                            <del class="product-price text-danger">{{ number_format($product->price, 0, ',', '.') }}
                                VND</del>
                            <strong class="product-price">{{ number_format($product->sale_price, 0, ',', '.') }}VND</strong>
                        @else
                            <strong class="product-price">{{ number_format($product->price, 0, ',', '.') }}VND</strong>
                        @endif
                    </p>

                    <h6 class="fs-4">Danh mục : {{ $product->category->category_name }} </h6>
                    <hr>
                    <form action="{{ route('cart.add') }}" method="post">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mt-3">
                            <label class="form-check-label">Color:</label>
                            {{-- @dd($colors); --}}
                            @foreach ($colors as $id => $color)
                                <input type="radio" class="btn-check" {{ $id == 1 ? 'checked' : '' }}
                                    value="{{ $id }}" name="color_id" id="radio_color_{{ $id }}"
                                    style="pointer-events:none; clip: rect(0,0,0,0);position: absolute">
                                <label class="btn bg-success btn-outline-light border-0 mx-1"
                                    for="radio_color_{{ $id }}">{{ $color }}</label>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <label class="form-check-label">Size:</label>
                            @foreach ($sizes as $id => $size)
                                <input type="radio" class="btn-check" {{ $id == 1 ? 'checked' : '' }}
                                    value="{{ $id }}" name="size_id" id="radio_size_{{ $id }}"
                                    style="pointer-events:none; clip: rect(0,0,0,0);position: absolute">
                                <label class="btn bg-success border-0 btn-outline-light mx-1"
                                    for="radio_size_{{ $id }}">{{ $size }}</label>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Quantity:</label>
                            <input type="number" name="quantity" class="form-control" required value="1"
                                min="1">
                        </div>
                        <div class="mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success bg-success border-0">Add To Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <hr>

    <div class="why-choose-section bg-gradient-light  ">
        <div class="container ">

            <div class="row">
                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon">
                            <img src="{{ asset('auth/images') }}/truck.svg" alt="Image" class="imf-fluid">
                        </div>
                        <h3>Fast &amp; Free Shipping</h3>
                        <p>Dịch vụ vận chuyển của chúng tôi rất nhanh chóng và hơn thế nữa dịch vụ vận chuyển này còn miễn
                            phí.
                        </p>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon">
                            <img src="{{ asset('auth/images') }}/bag.svg" alt="Image" class="imf-fluid">
                        </div>
                        <h3>Easy to Shop</h3>
                        <p>Website của chúng tôi rất đơn giản để sử dụng.</p>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon">
                            <img src="{{ asset('auth/images') }}/support.svg" alt="Image" class="imf-fluid">
                        </div>
                        <h3>24/7 Support</h3>
                        <p>Chúng tôi cung cấp dịch vụ hỗ trợ khách hàng 24/7.</p>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-4">
                    <div class="feature">
                        <div class="icon">
                            <img src="{{ asset('auth/images') }}/return.svg" alt="Image" class="imf-fluid">
                        </div>
                        <h3>Hassle Free Returns</h3>
                        <p>Nếu bạn cảm thấy sản phẩm không ưng ý thì chúng tôi có dịch vụ đổi trả hàng miễn phí nếu sản phẩm
                            chưa có dấu hiệu hỏng.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="product-section pt-0">
        <div class="container">
            <div class="row">

                {{-- <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                        vulputate velit imperdiet dolor tempor tristique. </p>
                    <p><a href="#" class="btn">Explore</a></p>
                </div>
                <!-- End Column 1 --> --}}

                <!-- Start Column 2 -->
                @foreach ($relatedProduct as $item)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="{{ route('auth.detailProduct', $item->id) }}">
                            <img src="{{ Storage::url($item->image) }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $item->product_name }}</h3>
                            @if ($item->sale_price)
                                <del class="product-price">{{ number_format($item->price, 0, ',', '.') }}VND</del>
                                <strong
                                    class="product-price">{{ number_format($item->sale_price, 0, ',', '.') }}VND</strong>
                            @else
                                <strong class="product-price">{{ number_format($item->price, 0, ',', '.') }}VND</strong>
                            @endif

                            <span class="icon-cross">
                                <img src="{{ asset('auth/images') }}/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
                @endforeach

                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                {{-- <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="#">
                        <img src="images/product-2.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Kruzo Aero Chair</h3>
                        <strong class="product-price">$78.00</strong>

                        <span class="icon-cross">
                            <img src="images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="#">
                        <img src="images/product-3.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Ergonomic Chair</h3>
                        <strong class="product-price">$43.00</strong>

                        <span class="icon-cross">
                            <img src="images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 4 --> --}}

            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <hr>
    <div class="container pb-5 pt-3" style="width: 1000px;">
        <div class="row mb-5">
            <div class="col-lg-4">
                <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left"
                    data-aos-delay="0">
                    <div class="service-icon color-1 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>
                    </div> <!-- /.icon -->
                    <div class="service-contents">
                        <p>43 Raymouth Rd. Baltemoer, London 3910</p>
                    </div> <!-- /.service-contents-->
                </div> <!-- /.service -->
            </div>

            <div class="col-lg-4">
                <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left"
                    data-aos-delay="0">
                    <div class="service-icon color-1 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                        </svg>
                    </div> <!-- /.icon -->
                    <div class="service-contents">
                        <p>info@yourdomain.com</p>
                    </div> <!-- /.service-contents-->
                </div> <!-- /.service -->
            </div>

            <div class="col-lg-4">
                <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left"
                    data-aos-delay="0">
                    <div class="service-icon color-1 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                    </div> <!-- /.icon -->
                    <div class="service-contents">
                        <p>+1 294 3925 3939</p>
                    </div> <!-- /.service-contents-->
                </div> <!-- /.service -->
            </div>
        </div>
    </div>
@endsection
