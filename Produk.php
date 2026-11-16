<?php
class Produk {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function semua() {
        $stmt = $this->pdo->query("SELECT * FROM produk ORDER BY id ASC");
        return $stmt->fetchAll();
    }
    public function cari($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM produk WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }
    public function tambah($nama, $harga, $stok) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO produk (nama, harga, stok) VALUES (?, ?, ?)"
        );

        return $stmt->execute([$nama, $harga, $stok]);
    }
    public function ubah($id, $nama, $harga, $stok) {
        $stmt = $this->pdo->prepare(
            "UPDATE produk SET nama = ?, harga = ?, stok = ? WHERE id = ?"
        );

        return $stmt->execute([$nama, $harga, $stok, $id]);
    }
    public function hapus($id) {
        $stmt = $this->pdo->prepare(
            "DELETE FROM produk WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }
}
