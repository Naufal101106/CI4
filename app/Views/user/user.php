<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
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
            <h2>Daftar User</h2>
            <a href="/register" class="btn btn-primary">Tambah Data User</a>
        </div>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($user as $data): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['Username'] ?></td>
                        <td><?= $data['Password'] ?></td>
                        <td><?= $data['Email'] ?></td>
                        <td><?= $data['NamaLengkap'] ?></td>
                        <td><?= $data['Alamat'] ?></td>
                        <td>
                            <form action="/user/edit" method="post">
                                <input type="hidden" name="UserID" value="<?= $data['UserID'] ?>">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="/user/hapus" method="post">
                                <input type="hidden" name="UserID" value="<?= $data['UserID'] ?>">
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
