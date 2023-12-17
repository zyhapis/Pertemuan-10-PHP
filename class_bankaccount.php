<?php
require_once 'class_account.php'; // Mengimpor kelas Account

class BankAccount extends Account
{
    public $customer; // Properti untuk menyimpan nama pelanggan (dapat diakses dari luar kelas)

    public function __construct($no, $saldo_awal, $cust)
    {
        parent::__construct($no, $saldo_awal); // Memanggil konstruktor kelas induk (Account)
        $this->customer = $cust; // Menginisialisasi properti customer (nama pelanggan)
    }

    public function cetak()
    {
        parent::cetak(); // Memanggil fungsi cetak dari kelas induk (Account) untuk menampilkan nomor rekening dan saldo
        echo '<br>Nama Pelanggan: ' . $this->customer; // Menampilkan nama pelanggan
    }

    // Mendapatkan nomor rekening
    public function getNomorRekening()
    {
        return $this->nomor;
    }

    // Mendapatkan nama pelanggan
    public function getNamaCustomer()
    {
        return $this->customer;
    }

    // Mendapatkan saldo awal
    public function getSaldoAwal()
    {
        return $this->saldo;
    }
}

?>