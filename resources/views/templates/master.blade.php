<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{!! asset('css/myCss/') !!}/{!! $css_file !!}.css" />
    <title>Latihan CRUD | @yield('title')</title>
</head>

<body>

    <header class="header" id="header">
        <nav class="nav-bar" id="nav-bar">
           <div class="nav-logo">
              <a href="">SIAKAD</a>
           </div>
           <button
              class="sidebar-button"
              id="sidebar-button"
              data-pressed="false"
           >
              <i class="fa fa-arrow-left"></i>
              <i class="fa fa-arrow-right"></i>
           </button>
           <div class="nav-link" id="nav-link">
              <a href="/" class="link-item">Home</a>
              <a href="/pegawai" class="link-item">Pegawai</a>
              <a href="/blog" class="link-item">Blog</a>
           </div>
           <div class="nav-close" id="nav-close" data-pressed="false">
              <small></small>
           </div>
           <div class="nav-menu" id="nav-menu" data-pressed="false">
              <small></small>
              <small></small>
              <small></small>
           </div>
        </nav>
     </header>

     <main class="main-app" id="main-app">
        <div class="container-app" id="container-app">
           <div class="sidebar" id="sidebar">
              <div class="sidebar-link">
                 <a href="/" class="">Home</a>
                 <i class="fa fa-user"></i>
              </div>
              <div class="sidebar-link">
                 <a href="/blog" class="">Blog</a>
                 <i class="fa fa-user"></i>
              </div>
              <div class="sidebar-link">
                 <a href="/portfolio" class="">Portfolio</a>
                 <i class="fa fa-user"></i>
              </div>
              <div class="sidebar-link">
                 <a href="/about" class="">About</a>
                 <i class="fa fa-user"></i>
              </div>
           </div>

           <div class="content-app" id="content-app">
              <div class="container">
                 @yield('content')
              </div>

              <footer class=" footer" id="footer">
                Copyright &copy; 2020 - Built with love by Rully Ihza Mahendra
            </footer>
           </div>


           <div class="scrollUp" id="tombol-scrollUp">
               UP
           </div>
        </div>
     </main>

        



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
    <script src="{!! asset('js/content-wrapper.js') !!}"></script>
</body>

</html>