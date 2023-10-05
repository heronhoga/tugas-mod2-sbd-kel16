<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // public function show all values from a table
    public function index()
    {
            $datas = DB::select('SELECT penjual.id_penjual, penjual.name, penjual.tanggal_masuk, ponsel.merek, ponsel.harga, ponsel.sistem_operasi, ponsel.id_produk
            FROM penjual
            INNER JOIN ponsel ON penjual.id_penjual = ponsel.id_penjual;');
    
        return view('admin.index')->with('datas', $datas);
    }

    public function create()
    {
        $datas = DB::select('SELECT * FROM penjual;');
        return view('admin.add')->with('datas', $datas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'harga' => 'required',
            'sistem_operasi' => 'required',
            'id_penjual' => 'required',
        ]);
        // dd($request->all());
        DB::insert(
            'INSERT INTO ponsel(merek, harga, sistem_operasi, id_penjual) VALUES (:merek, :harga, :sistem_operasi, :id_penjual)',
            [
                // 'id_admin' => $request->id_admin,
                'merek' => $request->merek,
                'harga' => $request->harga,
                'sistem_operasi' => $request->sistem_operasi,
                'id_penjual' => $request->id_penjual,
            ]
        );
        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('ponsel')->where('id_produk', $id)->first();
        $dataseller = DB::select('SELECT * FROM penjual;');
        return view('admin.edit')->with('data', $data)->with('dataseller', $dataseller);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'harga' => 'required',
            'sistem_operasi' => 'required',
            'id_penjual' => 'required',
        ]);

        DB::update(
            'UPDATE ponsel SET merek = :merek, harga = :harga, sistem_operasi = :sistem_operasi, id_penjual = :id_penjual WHERE id_produk = :id',
            [
                'id' => $id,
                'merek' => $request->merek,
                'harga' => $request->harga,
                'sistem_operasi' => $request->sistem_operasi,
                'id_penjual' => $request->id_penjual,
            ]
        );

        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil diubah');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM ponsel WHERE id_produk = :id_produk', ['id_produk' => $id]);
        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil dihapus');
    }


    //SELLER
    //retrieve
    public function indexseller(){
            $datas = DB::select('SELECT * FROM penjual');
    
        return view('admin.seller')->with('datas', $datas);
    }

    //create
function sellercreateform() {
    return view('admin.selleradd');
}

public function storeseller(Request $request)
    {
        $request->validate([
            'nama_penjual' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_masuk' => 'required',
            'alamat' => 'required',
        ]);
        // dd($request->all());
        DB::insert(
            'INSERT INTO penjual (tanggal_lahir, name, tanggal_masuk, alamat) VALUES (:tanggal_lahir, :name, :tanggal_masuk, :alamat)',
            [
                'tanggal_lahir' => $request->tanggal_lahir,
                'name' => $request->nama_penjual,
                'tanggal_masuk' => $request->tanggal_masuk,
                'alamat' => $request->alamat,
            ]
        );
        return redirect()->route('admin.indexseller')->with('success', 'Data Admin berhasil disimpan');
    }

    //edit
function sellereditform($id) {
    $data = DB::table('penjual')->where('id_penjual', $id)->first();
    return view('admin.selleredit')->with('data', $data);
}

public function updateseller($id, Request $request)
{
    $request->validate([
        'nama_penjual' => 'required',
        'tanggal_lahir' => 'required',
        'tanggal_masuk' => 'required',
        'alamat' => 'required',
    ]);

    DB::update(
        'UPDATE penjual SET name = :nama_penjual, tanggal_lahir = :tanggal_lahir, tanggal_masuk = :tanggal_masuk, alamat = :alamat WHERE id_penjual = :id',
        [
            'id' => $id,
            'nama_penjual' => $request->nama_penjual,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_masuk' => $request->tanggal_masuk,
            'alamat' => $request->alamat,
        ]
    );

    return redirect()->route('admin.indexseller')->with('success', 'Data Admin berhasil diubah');
}

    //delete
    public function deleteseller($id)
    {
        DB::delete('DELETE FROM penjual WHERE id_penjual = :id_penjual', ['id_penjual' => $id]);
        return redirect()->route('admin.indexseller')->with('success', 'Data Admin berhasil dihapus');
    }


}
