<?php

namespace App\Http\Controllers;

use App\Models\Penyalur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenyalurController extends Controller
{
    public function index()
    {
        $penyalurs = Penyalur::all();
        return view('penyalurs.index', compact('penyalurs'));
    }

    public function create()
    {
        return view('penyalurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required',
            'bidang' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Penyalur::create($input);

        return redirect()->route('penyalurs.index')->with('success', 'Data lembaga penyalur berhasil ditambahkan.');
    }

    public function show(Penyalur $penyalur)
    {
        return view('penyalurs.show', compact('penyalur'));
    }

    public function edit(Penyalur $penyalur)
    {
        return view('penyalurs.edit', compact('penyalur'));
    }

    public function update(Request $request, Penyalur $penyalur)
    {
        $request->validate([
            'nama_lembaga' => 'required',
            'bidang' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $penyalur->update($input);

        return redirect()->route('penyalurs.index')->with('success', 'Data lembaga penyalur berhasil diperbarui.');
    }

    public function destroy(Penyalur $penyalur)
    {
        $penyalur->delete();
        return redirect()->route('penyalurs.index')->with('success', 'Data lembaga penyalur berhasil dihapus.');
    }
}