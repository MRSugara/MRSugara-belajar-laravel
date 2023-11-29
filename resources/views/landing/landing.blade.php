@extends('landing.partials.main')
@section('containerLanding')
    {{-- <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item">Top Navigation</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> --}}
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content p-0">
        <div class="container-fluid p-0">


            <div class="slideshow-container-fluid p-0">

                <!-- Full-width images with number and caption text -->
                @foreach ($products as $p)
                    <div class="mySlides fade">
                        @if ($p->image)
                            <img src="{{ asset('/storage/image/' . $p->image) }}" style="height:500px">
                        @else
                            <img src="{{ asset('/image/default-placeholder.png') }}" style="height:500px">
                        @endif

                    </div>
                @endforeach

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <div class="container pt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @forelse ($product as $p)
                    <div class="col mb-5 rounded">
                        <div class="card h-100">
                            @if ($p['sale_price'] != 0)
                                <!-- Sale badge-->
                                <div class="badge bg-success text-white position-absolute"
                                    style="top: 0.5rem; right: 0.5rem">Sale</div>
                            @endif

                            <!-- Product image-->
                            {{-- Cek apakah product memiliki image --}}
                            @if ($p->image)
                                <img class="card-img-top rounded-top" src="{{ asset('storage/image/' . $p->image) }}"
                                    alt="{{ $p->name }}" />
                            @else
                                <img class="card-img-top" src="{{ asset('image/default-placeholder.png') }}"
                                    alt="default-image" />
                            @endif

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a href="#" style="text-decoration: none" class="text-dark">
                                        <small class="text-strong">{{ $p->category->name }}</small>
                                        <h5 class="fw-bolder">{{ $p->name }}</h5>
                                    </a>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for ($i = 0; $i < $p->rating; $i++)
                                            <div class="bi-star-fill"></div>
                                        @endfor
                                    </div>
                                    <!-- Product price-->
                                        ${{ number_format($p->price, 0) }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to
                                        cart</a></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary w-100 text-center" role="alert">
                        <h4>Produk belum tersedia</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
