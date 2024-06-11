@extends('layout.layout')

@include('component.navbar')

@section('content')

@include('sweetalert::alert')


<section class="about">
    <div id="carouselExampleCaptions" class="carousel carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="assets/latar.png" width="600rem" height="400rem" class="d-block" alt="Latar" />
                <div class="carousel-caption d-none d-md-block">
                    <h2>Tasty Gelato</h2>
                    <p>Scoops of Happiness, Every Time.</p>
                </div>
            </div>
            @foreach ($gelato as $gel)
            <div class="carousel-item">
                <img src="{{ asset('image/'. $gel->image) }}" alt="gelatooo" class="d-block" width="600rem" height="400rem" />
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$gel->gelatoNama}}</h5>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="products" id="produk">
    <div class="container">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item shadow-sm">
                    <a class="nav-link bg-info text-light fw-bold active align-middle" role="tab" data-bs-toggle="tab" href="#list-gelato" aria-controls="list-gelato" aria-selected="true">

                        <span class="d-none d-sm-block">List Gelato</span>
                    </a>
                </li>

                <li class="nav-item shadow-sm">
                    <a class="nav-link bg-info text-light fw-bold" role="tab" data-bs-toggle="tab" href="#list-minuman" aria-controls="list-minuman" aria-selected="false">
                        <span class="d-none d-sm-block">List Minuman</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Tab Gelato -->
                <div class="tab-pane fade show active" id="list-gelato" role="tabpanel">
                    <div class="my-4">
                        <div class="container-fluid py-2 bg-white border">
                            <div class="card-header bg-white text-center">
                                <h5>List Gelato</h5>
                            </div>
                            <div class="container">
                                <a href="gelato-add" class="btn btn-info">Tambah Produk Gelato</a>
                                <div class="row">
                                    @foreach ($gelato as $gel)
                                    <div class="col-md-3 my-4">
                                        <div class="card shadow-sm">
                                            <img class="card-img-top card-img-products" src="{{ asset('image/'. $gel->image) }}" target="_blank">
                                            <div class="card-body">
                                                <h5 class="card-title text-center mt-3">{{$gel->gelatoNama}}</h5>
                                                <p class="card-text text-center mb-2">{{$gel->gelatoDesc}}</p>
                                                <p class="card-text text-center mb-2">Rp. {{ number_format($gel->gelatoHarga, 0, ',', '.') }},00</p>
                                                <p class="card-text text-center mb-2">{{ number_format($gel->gelatoStok, 0, ',', '.') }}</p>
                                                <p class="card-text text-center mb-2 fst-italic">{{$gel->gelatoJenis}}</p>
                                                <div class="d-grid gap-2">
                                                    <div class="d-flex">
                                                        <a href="{{ url('gelato-edit/edit/'. $gel->id) }}" class="btn btn-info w-100 h-60" style="width: 60px; height: 40px; display: flex; justify-content: center; align-items: center;">Edit</a>
                                                        <form action="{{ url('gelato-delete/'.$gel->id) }}" method="post" class="d-inline w-100" onsubmit="confirmation(event)">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger w-100" style="width: 60px; height: 40px; display: flex; justify-content: center; align-items: center;" type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Minuman -->
                <div class="tab-pane fade show" id="list-minuman" role="tabpanel">
                    <div class="my-4">
                        <div class="container-fluid py-2 bg-white border">
                            <div class="card-header bg-white text-center">
                                <h5>List Minuman</h5>
                            </div>
                            <div class="container">
                                <a href="minuman-add" class="btn btn-info">Tambah Produk Minuman</a>
                                <div class="row">
                                    @foreach ($minuman as $min)
                                    <div class="col-md-3 my-4">
                                        <div class="card shadow-sm">
                                            <img class="card-img-top card-img-products" src="{{ asset('image/'. $min->image) }}" target="_blank">
                                            <div class="card-body">
                                                <h5 class="card-title text-center mt-3">{{$min->minumanNama}}</h5>
                                                <p class="card-text text-center mb-2">{{$min->minumanDesc}}</p>
                                                <p class="card-text text-center mb-2">Rp. {{ number_format($min->minumanHarga, 0, ',', '.') }},00</p>
                                                <p class="card-text text-center mb-2">{{ number_format($min->minumanStok, 0, ',', '.') }}</p>
                                                <p class="card-text text-center mb-2 fst-italic">{{$min->minumanJenis}}</p>
                                                <div class="d-grid gap-2">
                                                    <div class="d-flex">
                                                        <a href="{{ url('minuman-edit/edit/'. $min->id) }}" class="btn btn-info w-100 h-60" style="width: 60px; height: 40px; display: flex; justify-content: center; align-items: center;">Edit</a>
                                                        <form action="{{ url('minuman-delete/'.$min->id) }}" method="post" class="d-inline w-100" onsubmit="confirmation(event)">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger w-100" style="width: 60px; height: 40px; display: flex; justify-content: center; align-items: center;" type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Apakah ice cream Anda menggunakan bahan-bahan alami?
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                Ya, kami menggunakan bahan-bahan alami berkualitas tinggi
                dalam pembuatan ice cream kami. Kami juga berusaha untuk
                menggunakan bahan lokal dan organik jika memungkinkan.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Bagaimana cara memesan ice cream secara online?
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                Anda dapat memesan ice cream secara online melalui situs web
                kami atau melalui platform pemesanan makanan online seperti
                GoFood, GrabFood dan ShopeeFood. Anda juga dapat menghubungi
                kami langsung untuk memesan.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Apakah Anda menerima pesanan khusus untuk acara atau pesta?
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                Ya, kami menerima pesanan khusus untuk acara atau pesta.
                Silakan hubungi kami untuk informasi lebih lanjut tentang
                pesanan khusus.
            </div>
        </div>
    </div>
</div>

@include('component.footer')

@endsection