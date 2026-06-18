<?php
// File: PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik
    protected $skIkatanDinas;
    protected $instansiSponsor;

    // Constructor Subclass
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Overriding: Jalur Kedinasan (Surcharge tambahan 25%)
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    // Implementasi Method Abstrak Info Jalur
    public function tampilkanInfoJalur() {
        return "Jalur: Kedinasan | No SK: {$this->skIkatanDinas} | Sponsor: {$this->instansiSponsor}";
    }

    // Metode Query Spesifik Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>