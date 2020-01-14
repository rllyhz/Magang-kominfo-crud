<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai as Pegawai;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPegawai = Pegawai::all();
        $data = [
            'dataPegawai' => $dataPegawai,
            'title' => 'Pegawai',
            'css_file' => 'pegawai'
        ];
        return view('pegawai', $data);
        // return "<h1>Halaman Mahasiswa</h1>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nip' => $request->input('nip'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat')
        ];

        $hasil = Pegawai::insert($data);
        if ($hasil) {
            return redirect('/pegawai')
                ->with([
                    'pesan' => 'Berhasil menambahkan pegawai baru!',
                    'status' => true,
                    'keterangan' => 'sukses'
                ]);
        } else {
            return redirect('/pegawai')
                ->with([
                    'pesan' => 'Gagal menambahkan pegawai baru!',
                    'status' => false,
                    'keterangan' => 'gagal',
                ]);
        }
        // var_dump($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->get();
        return json_encode($pegawai[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
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
    public function update(Request $request, $nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        $pegawai->nama_lengkap = $request->input('nama_lengkap');
        $pegawai->nip = $request->input('nip');
        $pegawai->email = $request->input('email');
        $pegawai->alamat = $request->input('alamat');

        if (!$pegawai->save()) {
            App::abort(500);
        }

        return redirect('/pegawai')
            ->with([
                'pesan' => 'Berhasil mengubah data pegawai!',
                'status' => true,
                'keterangan' => 'sukses'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->delete();
        if ($pegawai) {
            return redirect('/pegawai')->with([
                'pesan' => 'Berhasil Menghapus data!',
                'status' => true,
                'keterangan' => 'sukses'
            ]);
        }
        return redirect('/pegawai')->with([
            'pesan' => 'Gagal Menghapus data!',
            'status' => false,
            'keterangan' => 'gagal'
        ]);
    }
}
