<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/fontawesome.min.css" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <title>Latihan CRUD | Data Pegawai</title>
</head>

<body>

    <header class="header" id="header">
        <div class="container">
            <nav class="navbar" id="navbar">
                <a href="#" class="nav-logo">SistemInfo</a>
                <div class="nav-link">
                    <a href="/" class="">Home</a>
                    <a href="/pegawai" class="active">Pegawai</a>
                    <a href="#" class="">About</a>
                </div>
            </nav>
        </div>
    </header>

    <div class="content">
        <div class="container">

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
        </div>
    </div>

    <footer class=" footer" id="footer">
        Copyright &copy; 2020 - Built with love by Rully Ihza Mahendra
    </footer>





    <!-- Modal popup -->
    <div class="card" id="card">
        <div class="card-header">
            <div class="container">
                <a class="judul-card" data-judul-card></a>
                <div class="close">
                    <!-- <a href="#" style="text-decoration: none; color: #fff;" id="tombol-close-card">X</a> -->
                    <i class="fas fa-times" id="tombol-close-card"></i>
                </div>
            </div>
        </div>
        <div class="container" data-konten-form>
            <div class="konten-card">
                <form action="" method="POST" class="form" id="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="put" data-method />
                    <div class="form-konten">
                        <label for="nip">NIP</label>
                        <input type="text" placeholder="NIP" name="nip" id="nip" data-nip>
                    </div>
                    <div class="form-konten">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" id="nama_lengkap" data-nama-lengkap>
                    </div>
                    <div class="form-konten">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" id="email" data-email>
                    </div>
                    <div class="form-konten">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" placeholder="Alamat" name="alamat" data-alamat></textarea>
                    </div>
                    <div class="form-konten card-aksi">
                        <a class="btn btn-aksi btn-batal" id="tombolBatal_card">Batal</a>
                        <button class="btn btn-aksi btn-simpan" name="submit" id="tombolSimpan_card">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card" id="cardHapus">
        <div class="card-header">
            <div class="container">
                <a class="judul-card" data-judul-card>Yakin ingin menghapus?</a>
                <div class="close">
                    <!-- <a href="#" style="text-decoration: none; color: #fff;" id="tombol-close-card">X</a> -->
                    <i class="fas fa-times" id="tombol-close-cardHapus"></i>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="" method="GET" data-form-hapus style="text-align: center;">
                <a class="btn btn-aksi btn-batal" id="tombolBatal_cardHapus">Batal</a>
                <button class="btn btn-aksi btn-simpan" name="submit" type="submit">Hapus</button>
            </form>
        </div>
    </div>

    <script src="{!! asset('js/app.js') !!}"></script>
</body>

</html>