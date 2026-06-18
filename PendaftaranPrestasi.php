<?php
// File: PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik
    protected $jenisPrestasi;
    protected $tingkatPrestasi;

    // Constructor Subclass
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Overriding: Jalur Prestasi (Potongan Rp 50.000)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    // Implementasi Method Abstrak Info Jalur
    public function tampilkanInfoJalur() {
        return "Jalur: Prestasi | Jenis: {$this->jenisPrestasi} | Tingkat: {$this->tingkatPrestasi}";
    }

    // Metode Query Spesifik Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>