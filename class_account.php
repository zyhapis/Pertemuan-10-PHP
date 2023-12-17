<?php
class Account {
    public $nomor; // Properti untuk menyimpan nomor rekening (dapat diakses dari luar kelas)
    protected $saldo; // Properti untuk menyimpan saldo (hanya dapat diakses oleh kelas turunan)

    public function __construct($nomor, $saldo) {
        $this->nomor = $nomor; // Menginisialisasi properti nomor rekening
        $this->saldo = $saldo; // Menginisialisasi properti saldo
    }

    public function cetak() {
        echo 'Nomor Rekening: ' . $this->nomor; // Menampilkan nomor rekening
        echo '<br>Saldo: ' . $this->saldo; // Menampilkan saldo
    }
}
?>
