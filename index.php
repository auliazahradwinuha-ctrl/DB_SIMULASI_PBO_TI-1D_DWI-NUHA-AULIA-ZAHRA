<?php
// File: index.php

// 1. Import seluruh komponen sistem PMB
require_once 'koneksi/database.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 2. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Koneksi ke database gagal. Pastikan MySQL Anda aktif.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi PBO - Dashboard Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #3498db;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .header h1 { margin: 0; color: #2c3e50; font-size: 24px; }
        .header p { margin: 5px 0 0; color: #7f8c8d; font-size: 16px; }
        
        .jalur-title {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px 15px;
            border-radius: 4px;
            margin-top: 30px;
            font-size: 18px;
        }
        .reguler { background-color: #3498db; }
        .prestasi { background-color: #2ecc71; }
        .kedinasan { background-color: #e67e22; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
            background: #fff;
        }
        table, th, td {
            border: 1px solid #dddddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }
        td {
            padding: 10px 12px;
            font-size: 14px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .badge {
            background: #eee;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>SISTEM SIMULASI PENDAFTARAN MAHASISWA BARU</h1>
        <p>Nama: <b>Dwi Nuha Aulia Zahra</b> | Kelas: <b>TI 1D</b></p>
    </div>

    <div class="jalur-title reguler">JALUR REGULER</div>
    <table>
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="20%">Nama Calon</th>
                <th width="15%">Asal Sekolah</th>
                <th width="10%" class="text-center">Nilai Ujian</th>
                <th width="15%" class="text-right">Biaya Dasar</th>
                <th width="20%">Informasi Spesifik Jalur</th>
                <th width="15%" class="text-right">Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataReguler = PendaftaranReguler::getDaftarReguler($db);
            $no = 1;
            foreach ($dataReguler as $row) {
                // Instansiasi menjadi Objek Konkrit
                $maba = new PendaftaranReguler(
                    $row->id_pendaftaran, $row->nama_calon, $row->asal_sekolah, 
                    $row->nilai_ujian, $row->biaya_pendaftaran_dasar, 
                    $row->pilihan_prodi, $row->lokasi_kampus
                );
                ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><b><?= $maba->getNamaCalon(); ?></b></td>
                    <td><?= $maba->getAsalSekolah(); ?></td>
                    <td class="text-center"><?= $maba->getNilaiUjian(); ?></td>
                    <td class="text-right">Rp <?= number_format($maba->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge"><?= $maba->tampilkanInfoJalur(); ?></span></td>
                    <td class="text-right"><b>Rp <?= number_format($maba->hitungTotalBiaya(), 0, ',', '.'); ?></b></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <div class="jalur-title prestasi">JALUR PRESTASI (Diskon Rp 50.000)</div>
    <table>
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="20%">Nama Calon</th>
                <th width="15%">Asal Sekolah</th>
                <th width="10%" class="text-center">Nilai Ujian</th>
                <th width="15%" class="text-right">Biaya Dasar</th>
                <th width="20%">Informasi Spesifik Jalur</th>
                <th width="15%" class="text-right">Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
            $no = 1;
            foreach ($dataPrestasi as $row) {
                // Instansiasi menjadi Objek Konkrit
                $maba = new PendaftaranPrestasi(
                    $row->id_pendaftaran, $row->nama_calon, $row->asal_sekolah, 
                    $row->nilai_ujian, $row->biaya_pendaftaran_dasar, 
                    $row->jenis_prestasi, $row->tingkat_prestasi
                );
                ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><b><?= $maba->getNamaCalon(); ?></b></td>
                    <td><?= $maba->getAsalSekolah(); ?></td>
                    <td class="text-center"><?= $maba->getNilaiUjian(); ?></td>
                    <td class="text-right">Rp <?= number_format($maba->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge"><?= $maba->tampilkanInfoJalur(); ?></span></td>
                    <td class="text-right" style="color: #2ecc71;"><b>Rp <?= number_format($maba->hitungTotalBiaya(), 0, ',', '.'); ?></b></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <div class="jalur-title kedinasan">JALUR KEDINASAN (Surcharge 25%)</div>
    <table>
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="20%">Nama Calon</th>
                <th width="15%">Asal Sekolah</th>
                <th width="10%" class="text-center">Nilai Ujian</th>
                <th width="15%" class="text-right">Biaya Dasar</th>
                <th width="20%">Informasi Spesifik Jalur</th>
                <th width="15%" class="text-right">Total Biaya Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
            $no = 1;
            foreach ($dataKedinasan as $row) {
                // Instansiasi menjadi Objek Konkrit
                $maba = new PendaftaranKedinasan(
                    $row->id_pendaftaran, $row->nama_calon, $row->asal_sekolah, 
                    $row->nilai_ujian, $row->biaya_pendaftaran_dasar, 
                    $row->sk_ikatan_dinas, $row->instansi_sponsor
                );
                ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><b><?= $maba->getNamaCalon(); ?></b></td>
                    <td><?= $maba->getAsalSekolah(); ?></td>
                    <td class="text-center"><?= $maba->getNilaiUjian(); ?></td>
                    <td class="text-right">Rp <?= number_format($maba->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge"><?= $maba->tampilkanInfoJalur(); ?></span></td>
                    <td class="text-right" style="color: #e67e22;"><b>Rp <?= number_format($maba->hitungTotalBiaya(), 0, ',', '.'); ?></b></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>