<?php
	session_start();
	if(!isset($_SESSION['username_admin'])){
		echo "<script>
			alert('Lakukan login terlebih dahulu di halaman awal untuk bisa mengakses website ini');
			window.location = 'index.php';
			</script>";
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admin</h1>
    <h3>Database User</h3>
    <table border="1" cellpadding="20">
        <tr>
            <td>Nama</td>
            <td>Nomor Telepon</td>
            <td>Email</td>
            <td>Tempat Lahir</td>
            <td>Tanggal Lahir</td>
            <td>Alamat Lengkap</td>
            <td>Aksi</td>
        </tr>
        <tr>
            <td>Akhmad Syaukani Akbar</td>
            <td>0852XXXXXXXX</td>
            <td>cozycat2001@gmail.com</td>
            <td>Samarinda</td>
            <td>23/01/01</td>
            <td>Jln.Samratulangi</td>
            <td><button>Hapus Data</button></td>
        </tr>
    </table>

    <h3>Data Form User</h3>
    <table border="1" cellpadding="20">
        <tr>
            <td>Umur</td>
            <td>Berat Badan</td>
            <td>Apakah pernah menghidap HIV/AIDS?</td>
            <td>Apakah anda memiliki pasangan yang mengidap HIV/AIDS?</td>
            <td>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C?</td>
            <td>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter</td>
            <td>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)?</td>
            <td>Kapan terakhir kali anda mendonorkan darah?</td>
            <td>Apakah Sedang Menstruasi?</td>
            <td>Hasil</td>
            <td>Alasan</td>
        </tr>
        <tr>
            <td>80kg</td>
            <td>Tidak Pernah</td>
            <td>Tidak Pernah</td>
            <td>Tidak Pernah</td>
            <td>Tidak Pernah</td>
            <td>Tidak Pernah</td>
            <td>Tidak Pernah</td>
            <td>3 bulan yang lalu</td>
            <td> - </td>
            <td>Tidak dapat mendonorkan darah</td>
            <td>Batasan untuk mendonorkan darah adalah >=17 tahun dan <=50 tahun</td>
            <td><button>Edit</button></td>
        </tr>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>