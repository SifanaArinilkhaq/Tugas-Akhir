<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Rekening;

class RekeningController extends Controller
{

    public function index()
    {
        return view('dashboard.rekening.all');
    }

    public function create()
    {
        return view('dashboard.rekening.create');
    }

    public function store(Request $request)
    {
        /**CREATE REKENING INI BELUM ADA VALIDASINYA
         * 
         * Coba kamu bikin validasi buat create rekening
         * CONTOHNYA BISA LIAT DI StoreController.php
         * 
         * */

        $messages = [
            'required' => ':attribute tidak boleh kosong.'
        ];
        
        $customAttributes = [
            'nama' => 'Nama'
        ];

        $valid = $request->validate([
            'nama kolom' => 'rule validasi',
        ],$messages,$customAttributes);

        $pemilik_id = auth()->user()->id;
        $rekening = new Rekening;
        $rekening->pemilik_id = $pemilik_id;
        $rekening->nama_bank = $request->nama_bank;
        $rekening->no_rekening = $request->no_rekening;
        $rekening->nama_pemilik = $request->nama_pemilik;
        $rekening->save();

        return redirect()->route('rekening.index')->with('success', 'Rekening berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['rekening'] = Rekening::find($id);

        return view('dashboard.rekening.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            
        ];
        
        $customAttributes = [
            'nama' => 'Nama',
        ];

        $valid = $request->validate([
            'nama' => 'required'
        ],$messages,$customAttributes);

        //Cek Validasi
        if($valid == true){
            $rekening = Rekening::find($id); //untuk mencari data berdasarkan id

            //Coba kamu terusin, sama kaya yg di controller StoreController
            // $rekening->nama = $request->nama;
            // $rekening->save();
            
            return redirect()->route('toko.index')->with('success','Toko berhasil diubah.');
        }
        else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //
    }

    public function getData()
    {
        $pemilik_id = auth()->user()->id;
        $query = Rekening::select(['id', 'nama_bank', 'no_rekening', 'nama_pemilik', 'created_at'])->where('pemilik_id', $pemilik_id);

        return DataTables::of($query)
            ->addColumn('nama', function($rekening){
                return ucwords($rekening->nama_bank);
            })
            ->addColumn('nomor', function($rekening){
                return $rekening->no_rekening;
            })
            ->addColumn('pemilik', function($rekening){
                return $rekening->nama_pemilik;
            })
            ->editColumn('action', function ($rekening) {
                return '
                <a href="' . route('rekening.edit',$rekening->id) . '" title="Edit"><span class="fa fa-pencil" style="margin-right:5px;"> </span> </a> | 
                <a type="javascript:;" data-toggle="modal" data-target="#konfirmasi_hapus" data-href="' . route('rekening.delete',['id'=>$rekening->id]) . '" title="Delete"> <span class="fa fa-trash" style="margin-left:5px;"> </span></a>';
            })
            ->rawColumns(['nama', 'nomor', 'pemilik', 'action'])
            ->addIndexColumn()
            ->make(true);
    }
}
