<?php
// File: index.php

// 1. Import semua file yang dibutuhkan
require_once 'koneksi.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 2. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Gagal terhubung ke database.");
}

echo "<h2>Simulasi PBO - Polimorfisme & Abstraksi</h2>";
echo "<h4>Nama: Dwi Nuha Aulia Zahra | Kelas: TI 1D</h4>";
echo "<hr>";

// ============================================================
// LAKUKAN SIMULASI UNTUK MASING-MASING JALUR
// ============================================================

// --- JALUR REGULER ---
echo "<h3>1. DAFTAR MAHASISWA JALUR REGULER</h3>";
$dataReguler = PendaftaranReguler::getDaftarReguler($db);

foreach ($dataReguler as $row) {
    // Mengubah data array dari DB menjadi Objek Konkrit
    $maba = new PendaftaranReguler(
        $row->id_pendaftaran,
        $row->nama_calon,
        $row->asal_sekolah,
        $row->nilai_ujian,
        $row->biaya_pendaftaran_dasar,
        $row->pilihan_prodi,
        $row->lokasi_kampus
    );

    echo "Nama: <b>" . $maba->getNamaCalon() . "</b><br>";
    echo $maba->tampilkanInfoJalur() . "<br>";
    echo "Total Biaya (Murni): Rp " . number_format($maba->hitungTotalBiaya(), 0, ',', '.') . "<br><br>";
}

echo "<hr>";

// --- JALUR PRESTASI ---
echo "<h3>2. DAFTAR MAHASISWA JALUR PRESTASI</h3>";
$dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);

foreach ($dataPrestasi as $row) {
    $maba = new PendaftaranPrestasi(
        $row->id_pendaftaran,
        $row->nama_calon,
        $row->asal_sekolah,
        $row->nilai_ujian,
        $row->biaya_pendaftaran_dasar,
        $row->jenis_prestasi,
        $row->tingkat_prestasi
    );

    echo "Nama: <b>" . $maba->getNamaCalon() . "</b><br>";
    echo $maba->tampilkanInfoJalur() . "<br>";
    // Disini fungsi hitungTotalBiaya() otomatis memotong Rp 50.000 (Polimorfisme)
    echo "Total Biaya (Diskon): Rp " . number_format($maba->hitungTotalBiaya(), 0, ',', '.') . "<br><br>";
}

echo "<hr>";

// --- JALUR KEDINASAN ---
echo "<h3>3. DAFTAR MAHASISWA JALUR KEDINASAN</h3>";
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

foreach ($dataKedinasan as $row) {
    $maba = new PendaftaranKedinasan(
        $row->id_pendaftaran,
        $row->nama_calon,
        $row->asal_sekolah,
        $row->nilai_ujian,
        $row->biaya_pendaftaran_dasar,
        $row->sk_ikatan_dinas,
        $row->instansi_sponsor
    );

    echo "Nama: <b>" . $maba->getNamaCalon() . "</b><br>";
    echo $maba->tampilkanInfoJalur() . "<br>";
    // Disini fungsi hitungTotalBiaya() otomatis menambah surcharge 25% (Polimorfisme)
    echo "Total Biaya (Surcharge 25%): Rp " . number_format($maba->hitungTotalBiaya(), 0, ',', '.') . "<br><br>";
}