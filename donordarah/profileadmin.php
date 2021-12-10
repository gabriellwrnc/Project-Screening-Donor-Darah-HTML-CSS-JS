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
$username = $_SESSION['username_admin'];
$sqlprofil = "SELECT * FROM akun INNER JOIN admin ON akun.id_akun = admin.akun_id_akun WHERE username = '$username' AND role = 'Admin'";
$resprofil = mysqli_query($conn, $sqlprofil);
$profil = mysqli_fetch_assoc($resprofil);

$nama = $profil['nama'];
$no_telepon = $profil['no_telepon'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Landing Admin</title>
	<link rel="stylesheet" href="CSS/profileadmin.css">
</head>

<body>
	<div class="wrapper">
		<div class="header">
			<div class="header-logo">
				<ul>
					<li><img src="img/logo1.png"></li>
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
					<h3 class="box-title">Biodata ADMIN</h3>
					<br>
					<table cellspacing="25">
						<tr>
							<td>Nama</td>
							<td>
								<p>: <?php echo $nama; ?></p>
							</td>
						</tr>
						<tr>
							<td>No.Telepon</td>
							<td>
								<p>: <?php echo $no_telepon; ?></p>
							</td>
						</tr>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>