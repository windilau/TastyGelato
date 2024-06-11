<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minuman;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MinumanController extends Controller
{
    public function index()
    {
        $minuman = Minuman::all();
        return view('content.index', compact('minuman'));
    }

    public function create()
    {
        return view('content.minuman-add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'minumanNama' => 'required|string|max:255',
            'minumanDesc' => 'required|string|max:255',
            'minumanHarga' => 'required|numeric|min:0',
            'minumanStok' => 'required|numeric|min:0',
            'minumanJenis' => 'required|string|in:Dingin,Panas',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:6144',
        ], [
            'minumanNama.required' => 'Nama Produk wajib diisi.',
            'minumanDesc.required' => 'Deskripsi Produk wajib diisi.',
            'minumanHarga.required' => 'Harga Produk wajib diisi.',
            'minumanStok.required' => 'Stok Produk wajib diisi.',
            'minumanJenis.required' => 'Jenis Produk wajib diisi.',
            'image.required' => 'Image wajib diisi.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorMessage = $errors->first();

            Alert::error('Add Data Failed', $errorMessage);
            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('image'), $filename);
            $input['image'] = $filename;
        }

        Minuman::create($input);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect('index');
    }

    public function edit($id)
    {
        $minuman = Minuman::findOrFail($id);
        return view('content.minuman-edit', compact('minuman'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'minumanNama' => 'required|string|max:255',
            'minumanDesc' => 'required|string|max:255',
            'minumanHarga' => 'required|numeric|min:0',
            'minumanStok' => 'required|numeric|min:0',
            'minumanJenis' => 'required|string|in:Dingin,Panas',
        ], [
            'minumanNama.required' => 'Nama Produk wajib diisi.',
            'minumanDesc.required' => 'Deskripsi Produk wajib diisi.',
            'minumanHarga.required' => 'Harga Produk wajib diisi.',
            'minumanStok.required' => 'Stok Produk wajib diisi.',
            'minumanJenis.required' => 'Jenis Produk wajib diisi.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Update Data Failed', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        $minuman = Minuman::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('image'), $filename);
            $input['image'] = $filename;
        }

        $minuman->update($input);
        Alert::success('Data Berhasil Diupdate!');
        return redirect('index');
    }

    public function destroy($id)
    {
        $minuman = Minuman::findOrFail($id);
        if ($minuman->image) {
            Storage::delete('public/image' . $minuman->image);
        }

        $minuman->delete();
        Alert::success('Data Berhasil Dihapus!');
        return redirect('index');
    }
}
