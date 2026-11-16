
<?php

require_once "Database.php";
require_once "Produk.php";

$db = new Database();
$produk = new Produk($db->getConnection());

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$data = $produk->cari($id);

if (!$data) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produk->ubah(
        $id,
        $_POST['nama'],
        $_POST['harga'],
        $_POST['stok']
    );

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk Koperasi</title>
</head>
<body>

    <h2>Edit Data Produk</h2>

    <form method="POST">

        <label>Nama Produk</label><br>
        <input
            type="text"
            name="nama"
            value="<?= htmlspecialchars($data['nama']) ?>"
            required
        >

        <br><br>

        <label>Harga</label><br>
        <input
            type="number"
            name="harga"
            value="<?= htmlspecialchars($data['harga']) ?>"
            required
        >

        <br><br>

        <label>Stok</label><br>
        <input
            type="number"
            name="stok"
            value="<?= htmlspecialchars($data['stok']) ?>"
            required
        >

        <br><br>

        <button type="submit">Simpan Perubahan</button>

        <a href="index.php">Kembali</a>

    </form>

</body>
</html>
