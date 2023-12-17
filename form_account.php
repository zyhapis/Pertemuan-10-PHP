<?php
// Memasukkan class BankAccount agar dapat digunakan di halaman ini
require_once 'class_bankaccount.php';

// Inisialisasi array untuk menyimpan objek BankAccount
$bank_accounts = [];

// Fungsi untuk menambahkan akun ke dalam array $bank_accounts
function tambahAkun($nomor, $saldo, $nama)
{
    global $bank_accounts;
    $bank_accounts[] = new BankAccount($nomor, $saldo, $nama);
}

// Memeriksa apakah metode permintaan adalah POST dan tombol 'submit' ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Mendapatkan nilai dari inputan form
    $nomor = $_POST['nomor'];
    $nama = $_POST['nama'];
    $saldo = isset($_POST['saldo']) ? $_POST['saldo'] : 0; // Memastikan ada nilai pada saldo, jika kosong, diganti dengan 0

    // Menambahkan beberapa akun secara manual
    tambahAkun("010", 6250000, "Messi");
    tambahAkun("070", 8743500, "Ronaldo");

    // Menambahkan akun baru dari inputan form
    tambahAkun($nomor, $saldo, $nama);
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Form Account Bank</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/7fc1b7dd83.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light" style="font-family: 'Poppins', sans-serif;">
    <div class="container mt-5 shadow-lg p-0">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="bg-primary text-center py-5">
                    <img src="pay-by-bank-card.svg" alt="svg" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white p-4 d-flex align-items-center justify-content-center h-100">
                    <div class="w-75">
                        <h2 class="text-center mb-4">Form Account Bank</h2>
                        <form method="POST">
                            <div class="form-group">
                                <label for="nomorRekening">Nomor Rekening</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-credit-card"></i>
                                        </span>
                                    </div>
                                    <input id="nomorRekening" name="nomor" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namaCustomer">Nama Customer</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-id-card"></i>
                                        </span>
                                    </div>
                                    <input id="namaCustomer" name="nama" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="saldoAwal">Saldo Awal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-wallet"></i>
                                        </span>
                                    </div>
                                    <input id="saldoAwal" name="saldo" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 <?php echo !empty($bank_accounts) ? '' : 'd-none'; ?>">
        <div class="container mt-3">
            <table class="table table-striped">
                <thead style="background-color: #007bff; color: white;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No.Rekening</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Saldo Awal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bank_accounts as $index => $account): ?>
                        <tr>
                            <th scope="row">
                                <?php echo $index + 1; ?>
                            </th>
                            <td><strong>
                                    <?php echo $account->getNomorRekening(); ?>
                                </strong></td>
                            <td><strong>
                                    <?php echo $account->getNamaCustomer(); ?>
                                </strong></td>
                            <td><strong>Rp
                                    <?php echo is_numeric($account->getSaldoAwal()) ? number_format($account->getSaldoAwal(), 2, ',', '.') : '0.00'; ?>
                                </strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>