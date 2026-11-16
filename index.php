<?php

require_once "Database.php";
require_once "Produk.php";

$db = new Database();
$produk = new Produk($db->getConnection());

$data = $produk->semua();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk Koperasi</title>
</head>
<body>

    <h2>Koperasi Desa Merah Putih</h2>

    <a href="tambah.php">+ Tambah Produk</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data as $item) : ?>

            <tr>
                <td><?= htmlspecialchars($item['id']) ?></td>

                <td><?= htmlspecialchars($item['nama']) ?></td>

                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>

                <td><?= htmlspecialchars($item['stok']) ?></td>

                <td>
                    <a href="edit.php?id=<?= $item['id'] ?>">
                        Ubah
                    </a>

                    |

                    <a href="hapus.php?id=<?= $item['id'] ?>"
                       onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                        Hapus
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

</body>
</html>
