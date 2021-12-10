<?php
session_start();
if (!isset($_SESSION['username_admin'])) {
	echo "<script>
			alert('Lakukan login terlebih dahulu di halaman awal untuk bisa mengakses website ini');
			window.location = 'index.php';
			</script>";
	exit;
}
?>
<?php
include("config.php");
$nik = $_GET["nik"];
$sqlidform = "SELECT form_id_form FROM user WHERE nik = $nik";
$residform = mysqli_query($conn, $sqlidform);
$idform = mysqli_fetch_assoc($residform);
if (isset($idform['form_id_form'])) {
	$sqlform = "SELECT * FROM form INNER JOIN user ON user.nik = form.user_nik INNER JOIN hasil ON hasil.id_hasil = form.hasil_id_hasil WHERE user_nik = '$nik'";
	$resform = mysqli_query($conn, $sqlform);
	$form = mysqli_fetch_assoc($resform);
} else {
	echo "<script>
			alert('Data yang dipilih belum melakukan screening, oleh sebab itu data form user tidak ada. Halaman dialihkan ke menu admin');
			window.location = 'landingadmin.php';
			</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/landingadmin.css">
	<title>Form User</title>
</head>

<body>
	<div class="wrapper">
		<div class="header">
			<div class="header-logo">
				<ul>
					<li><img src="img/Palang.png"></li>
					<li>
						<h1>AYO DONOR</h1>
					</li>
				</ul>
			</div>
			<div class="header-list">
				<ul>
					<li onclick="window.location = 'landingadmin.php'">Back</li>
					<li onclick="window.location = 'logout.php'">Logout</li>
				</ul>
			</div>
		</div>
		<div class="content">
			<div class="box">
				<div class="form">
					<h3 class="box-title">DATABASE FORM PENDONOR</h3> <br>
					<div class="tabel1">
						<table border="1" cellpadding="16">
							<tr>
								<th>Umur</th>
								<th>Berat Badan</th>
								<th>Apakah pernah mengidap HIV/AIDS?</th>
								<th>Apakah anda memiliki pasangan yang mengidap HIV/AIDS?</th>
								<th>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C?</th>
								<th>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter?</th>
								<?php
								if ($form['jenis_kelamin'] == "Laki-Laki") {
									echo "<th>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)?</th>";
								} else if ($form['jenis_kelamin'] == "Perempuan") {
									echo "<th>Apakah Sedang Menstruasi?</th>";
								}
								?>
								<th>Kapan terakhir kali anda mendonorkan darah?</th>
								<th>Hasil</th>
								<th>Aksi</th>
							</tr>
							<tr>
								<td><?php echo $form['umur']; ?> Tahun</td>
								<td><?php echo $form['berat_badan']; ?> Kg</td>
								<td><?php echo $form['hiv']; ?></td>
								<td><?php echo $form['pasangan_hiv']; ?></td>
								<td><?php echo $form['kontak_hepatitis']; ?></td>
								<td><?php echo $form['suntik']; ?></td>
								<td><?php echo $form['sex_period']; ?></td>
								<td><?php echo $form['riwayat_donor']; ?></td>
								<td><?php echo $form['hasil_form']; ?></td>
								<td>
									<a href="updateadmin.php?nik=<?php echo $form['nik']; ?>" class="update"><span class="create">
											<ion-icon name="create-outline"></ion-icon>
										</span></a> <br> <br>
									<a href="deleteform.php?nik=<?php echo $form['nik']; ?>" class="delete" onclick="return confirm('Apakah anda yakin ingin menghapus form pada Nama: <?php echo $form['nama']; ?> dan NIK: <?php echo $form['nik']; ?>?')"><span class="delete">
											<ion-icon name="trash-outline"></ion-icon>
										</span></a>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>