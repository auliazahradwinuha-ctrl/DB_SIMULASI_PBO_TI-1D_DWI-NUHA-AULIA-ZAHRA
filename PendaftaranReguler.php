<?php
// File: PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik
    protected $pilihanProdi;
    protected $lokasiKampus;

    // Constructor Subclass
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $pilihanProdi, $lokasiKampus) {
        // Memanggil constructor dari abstract class induk (Pendaftaran)
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Implementasi Method Abstrak: Menghitung total biaya (Jalur Reguler = Biaya Dasar)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Implementasi Method Abstrak: Menampilkan info spesifik jalur
    public function tampilkanInfoJalur() {
        return "Jalur: Reguler | Prodi: {$this->pilihanProdi} | Lokasi: {$this->lokasiKampus}";
    }

    // ============================================================
    // METODE QUERY SPESIFIK (Mengambil data khusus Reguler)
    // ============================================================
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>