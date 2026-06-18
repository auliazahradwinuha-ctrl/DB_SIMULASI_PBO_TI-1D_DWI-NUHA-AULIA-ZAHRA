// Inisialisasi koneksi
$database = new Database();
$db = $database->getConnection();

// Memanggil metode query spesifik secara statis tanpa membuat instansiasi objek
$dataReguler = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);