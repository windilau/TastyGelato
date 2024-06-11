@extends('layout.layout')

@include('component.navbar')

@section('content')

@include('sweetalert::alert')

<div>
    <div class="container">
        <a href="{{URL::Previous()}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Produk Minuman</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>

        <form action="minuman-add" class="row g-3" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="minumanNama" class="form-label">Nama Produk</label>
                <input name="minumanNama" id="minumanNama" type="text" class="form-control @error('minumanNama') is-invalid @enderror" value="{{ old('minumanNama') }}">
                @error('minumanNama')
                <div id="minumanNama-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="minumanDesc" class="form-label">Deskripsi Produk</label>
                <input name="minumanDesc" id="minumanDesc" type="text" class="form-control @error('minumanDesc') is-invalid @enderror" value="{{ old('minumanDesc') }}">
                @error('minumanDesc')
                <div id="name-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="minumanHarga" class="form-label">Harga</label>
                <input name="minumanHarga" id="minumanHarga" type="number" class="form-control @error('minumanHarga') is-invalid @enderror" value="{{ old('minumanHarga') }}">
                @error('minumanHarga')
                <div id="name-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="minumanStok" class="form-label">Stok</label>
                <input name="minumanStok" id="minumanStok" type="number" class="form-control @error('minumanStok') is-invalid @enderror" value="{{ old('minumanStok') }}">
                @error('minumanStok')
                <div id="name-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="minumanJenis" class="form-label">Jenis</label>
                <select name="minumanJenis" class="form-control @error('minumanJenis') is-invalid @enderror" aria-label="Default select example">
                    <option disabled {{ old('minumanJenis') == '' ? 'selected' : '' }}>Pilih Jenis..</option>
                    <option value="Dingin">Dingin</option>
                    <option value="Panas">Panas</option>
                </select>
                @error('jenis')
                <div id="name-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Produk :</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/jpeg, image/jpg, image/gif, image/png">
                @error('image')
                <div id="name-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-2 my-3">
                <button type="submit" class="btn btn-success px-3"> TAMBAH DATA</button>
            </div>
        </form>
    </div>
</div>