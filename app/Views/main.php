<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" href="<?= base_url("asset/bootstrap/css/bootstrap.min.css")?>">
    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu-icon {
            font-size: 24px;
            cursor: pointer;
            display: none;
        }
        @media (max-width: 768px) {
            .menu-icon {
                display: block;
            }
        }
        .menu {
            display: flex;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .menu {
                display: none;
            }
            .menu.open {
                display: block;
                position: absolute;
                top: 60px;
                right: 20px;
                background-color: white;
                border: 1px solid #ddd;
                padding: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between">
            <h1>Perpustakaan Digital</h1>
            <div class="menu-icon" id="menuToggle">
                &#9776;
            </div>
            <nav class="menu" id="menu">
                <a href="/perpus" class="text-white">Data Buku</a>
                <a href="/datauser" class="text-white">Data User</a>
                <a href="/peminjaman" class="text-white">Peminjaman</a>
            </nav>
        </div>
    </header>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Daftar Buku</h2>
            <a href="/perpus/tambah" class="btn btn-primary">Tambah Data Buku</a>
        </div>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nomor</th>
                    <th>Id Buku</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($buku as $perpus): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $perpus['id_buku'] ?></td>
                        <td><?= $perpus['judul'] ?></td>
                        <td><?= $perpus['penulis'] ?></td>
                        <td><?= $perpus['penerbit'] ?></td>
                        <td><?= $perpus['tahun_terbit'] ?></td>
                        <td>
                            <form action="/perpus/edit" method="post">
                                <input type="hidden" name="id_buku" value="<?= $perpus['id_buku'] ?>">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="/perpus/hapus" method="post">
                                <input type="hidden" name="id_buku" value="<?= $perpus['id_buku'] ?>">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('open');
        });
    </script>
</body>
</html>
