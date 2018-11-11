<?php

namespace Pinjam\Http\Controllers;

use Illuminate\Http\Request;
use Pinjam\Data;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::paginate(5);

        return view('data.index', compact('data'));
    }

    public function readone($id)
    {
        $read = DB::table('data')->where('id',$id)->first();

        return view('data.readone', compact('read'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'NRP' => 'required|min:14',
            'nama' => 'required',
            'No_Telp' => 'required',
            'Email' => 'required',
            'Dosbing' => 'required',
            'NIP' => 'required',
            'Awal_Reservasi' => 'required|before:Akhir_Reservasi',
            'Akhir_Reservasi' => 'required',
        ]);



        Data::create([
            'NRP' => request('NRP'),
            'nama' => request('nama'),
            'No_Telp' => request('No_Telp'),
            'Email' => request('Email'),
            'Dosbing' => request('Dosbing'),
            'NIP' => request('NIP'),
            'Awal_Reservasi' => request('Awal_Reservasi'),
            'Akhir_Reservasi' => request('Akhir_Reservasi')
        ]);

        return redirect()->route('welcome')->with('success','Data has been inputed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $stat)
    {
        $edit = Data::find($id);
        $edit->update([
            'STAT' => $stat
        ]);

        return redirect()->route('data.index')->with('success','Perubahan Sudah di Terapkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
