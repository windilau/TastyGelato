<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gelato;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GelatoController extends Controller
{
    public function index()
    {
        $gelato = Gelato::all();
        return view('content.index', compact('gelato'));
    }

    public function create()
    {
        return view('content.gelato-add');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gelatoNama' => 'required|string|max:255',
            'gelatoDesc' => 'required|string|max:255',
            'gelatoHarga' => 'required|numeric|min:0',
            'gelatoStok' => 'required|numeric|min:0',
            'gelatoJenis' => 'required|string|in:Ice Cream,Sorbet',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:6144',
        ], [
            'gelatoNama.required' => 'Nama Produk wajib diisi.',
            'gelatoDesc.required' => 'Deskripsi Produk wajib diisi.',
            'gelatoHarga.required' => 'Harga Produk wajib diisi.',
            'gelatoStok.required' => 'Stok Produk wajib diisi.',
            'gelatoJenis.required' => 'Jenis Produk wajib diisi.',
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

        Gelato::create($input);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect('index');
    }

    public function edit($id)
    {
        $gelato = Gelato::findOrFail($id);
        return view('content.gelato-edit', compact('gelato'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'gelatoNama' => 'required|string|max:255',
            'gelatoDesc' => 'required|string|max:255',
            'gelatoHarga' => 'required|numeric|min:0',
            'gelatoStok' => 'required|numeric|min:0',
            'gelatoJenis' => 'required|string|in:Gelato,Ice Cream,Sorbet',
        ], [
            'gelatoNama.required' => 'Nama Produk wajib diisi.',
            'gelatoDesc.required' => 'Deskripsi Produk wajib diisi.',
            'gelatoHarga.required' => 'Harga Produk wajib diisi.',
            'gelatoStok.required' => 'Stok Produk wajib diisi.',
            'gelatoJenis.required' => 'Jenis Produk wajib diisi.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Update Data Failed', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        $gelato = Gelato::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('image'), $filename);
            $input['image'] = $filename;
        }
        $gelato->update($input);

        Alert::success('Data Berhasil Diupdate!');
        return redirect('index');
    }

    public function destroy($id)
    {
        $gelato = Gelato::findOrFail($id);
        if ($gelato->image) {
            Storage::delete('public/image' . $gelato->image);
        }
        $gelato->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect('index');
    }
}
