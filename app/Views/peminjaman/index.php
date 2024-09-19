<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <h2>Daftar Peminjaman</h2>
            <a href="/peminjaman/create" class="btn btn-primary">Tambah Peminjaman</a>
        </div>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Buku ID</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peminjaman as $item): ?>
                <tr>
                    <td><?= $item['PeminjamanID']; ?></td>
                    <td><?= $item['UserID'];?></td>
                    <td><?= $item['BukuID'];?></td>
                    <td><?= $item['TanggalPeminjaman']; ?></td>
                    <td><?= $item['TanggalPengembalian']; ?></td>
                    <td><?= $item['StatusPeminjaman']; ?></td>
                    <td>
                        <a href="/peminjaman/edit/<?= $item['PeminjamanID']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/peminjaman/delete/<?= $item['PeminjamanID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
