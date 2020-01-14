@extends('templates.master')

@section('title', $title)

@section('content')
        <h1>Data Pegawai</h1>

        <div class="container">

            @if(session('status'))
            <div class="alert alert-{!! session('keterangan') !!}">
                <p>{!!session('pesan') !!}</p> <span class="close" onclick="hapusAlert(this)">x</span>
            </div>
            @endif

            <a href="" class="btn btn-aksi btn-tambah" id="tombolTambah_card">Tambah Pegawai</a>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($dataPegawai as $pegawai) : ?>
                        <tr>
                            <td><?= ++$i; ?></td>
                            <td>
                                <a href="" class="btn btn-edit" id="tombolEdit_card" data-index="<?= $pegawai['nip']; ?>">Edit</a>
                                <a href="" class="btn btn-hapus" id="tombolHapusPegawai" data-index="<?= $pegawai['nip']; ?>">Hapus</a>
                            </td>
                            <td><?= $pegawai['nip']; ?></td>
                            <td><?= $pegawai['nama_lengkap']; ?></td>
                            <td><?= $pegawai['email']; ?></td>
                            <td><?= $pegawai['alamat']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
@endsection