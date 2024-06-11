@extends('layout.layout')

@include('component.navbar')

@section('content')

@include('sweetalert::alert')

<div>
    <div class="container">
        <a href="{{URL::Previous()}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Produk Gelato</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>

        <form action="gelato-add" class="row g-3" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="gelatoNama" class="form-label">Nama Produk</label>
                <input name="gelatoNama" id="gelatoNama" type="text" class="form-control @error('gelatoNama') is-invalid @enderror" value="{{ old('gelatoNama') }}">
                @error('gelatoNama')
                <div id="gelatoNama-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gelatoDesc" class="form-label">Deskripsi Produk</label>
                <input name="gelatoDesc" id="gelatoDesc" type="text" class="form-control @error('gelatoDesc') is-invalid @enderror" value="{{ old('gelatoDesc') }}">
                @error('gelatoDesc')
                <div id="name-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gelatoHarga" class="form-label">Harga</label>
                <input name="gelatoHarga" id="gelatoHarga" type="number" class="form-control @error('gelatoHarga') is-invalid @enderror" value="{{ old('gelatoHarga') }}">
                @error('gelatoHarga')
                <div id="name-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gelatoStok" class="form-label">Stok</label>
                <input name="gelatoStok" id="gelatoStok" type="number" class="form-control @error('gelatoStok') is-invalid @enderror" value="{{ old('gelatoStok') }}">
                @error('gelatoStok')
                <div id="name-error" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gelatoJenis" class="form-label">Jenis</label>
                <select name="gelatoJenis" class="form-control @error('gelatoJenis') is-invalid @enderror" aria-label="Default select example">
                    <option disabled {{ old('gelatoJenis') == '' ? 'selected' : '' }}>Pilih Jenis..</option>
                    <option value="Ice Cream">Ice Cream</option>
                    <option value="Sorbet">Sorbet</option>
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