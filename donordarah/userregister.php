<?php
session_start();
if (!isset($_SESSION["username_daftar"])) {
	echo "<script>
				alert('Masukkan akun baru terlebih dahulu di halaman awal user untuk melakukan registrasi');
				window.location = 'loginuser.php';
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
	<link rel="stylesheet" href="CSS/styleregister.css">
</head>

<body>

	<img class="background" src="img/background.png">
	<img class="logo-tangan" src="img/background2.png">

	<div class="header">
		<div class="header-logo">
			<ul>
				<li><img src="img/logo1.png"></li>
				<li>
					<h1>AYO DONOR</h1>
				</li>
			</ul>
		</div>
	</div>

	<div class="wrapper">

		<div class="container">
			<div class="whitebg">

				<div class="box signin">
				</div>
				<div class="box signup">
				</div>

			</div>
			<div class="formWx">
				<div class="form signinForm">
					<form action="" method="post">
						<h3>Halo <?php echo $_SESSION['username_daftar']; ?>, <br> Mari bantu kami <br> melengkapi data dirimu : </h3>
						<input type="text" name="nama" placeholder="Nama" required>
						<input type="number" name="nik" placeholder="NIK" required>
						<input type="tel" name="no_telepon" placeholder="Nomor Telepon" required>
						<input type="text" name="email" placeholder="Email" required>
						<input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
						<input type="text" name="alamat_lengkap" placeholder="Alamat Lengkap" required>
						<p>Jenis Kelamin :</p>
						<label>
                            <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" >
                            <span class="check"></span>
                            Laki-Laki
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                            <span class="check"></span>
                            Perempuan
                        </label>

						<input type="submit" class="submit" name="daftar2" value="Daftar">
					</form>
					<?php
					if (isset($_POST["daftar2"])) {
						include("config.php");
						$username = htmlspecialchars($_SESSION['username_daftar']);
						$password = htmlspecialchars(password_hash($_SESSION['password_daftar'], PASSWORD_DEFAULT));
						$nama = htmlspecialchars($_POST["nama"]);
						$nik = htmlspecialchars($_POST["nik"]);
						$no_telepon = htmlspecialchars($_POST["no_telepon"]);
						$email = htmlspecialchars($_POST["email"]);
						$tempat_lahir = htmlspecialchars($_POST["tempat_lahir"]);
						$alamat_lengkap = htmlspecialchars($_POST["alamat_lengkap"]);
						$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);

						$sqlnik = "SELECT nik FROM user WHERE nik = '$nik'";
						$sqlemail = "SELECT email FROM user WHERE email = '$email'";

						$resnik = mysqli_query($conn, $sqlnik);
						$resemail = mysqli_query($conn, $sqlemail);

						if (mysqli_num_rows($resnik) >= 1) {
							echo "<script>
								alert('NIK sudah dipakai, anda tidak bisa mendaftar 2 akun');
								history.back();
								</script>";
						} else if (mysqli_num_rows($resemail) >= 1) {
							echo "<script>
								alert('Email sudah dipakai, silahkan menggunakan email lain');
								history.back();
								</script>";
						} else {
							$sqlid = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'donor_darah' AND TABLE_NAME = 'akun'";

							$resid = mysqli_query($conn, $sqlid);
							$ai = mysqli_fetch_assoc($resid);
							$id_akun = $ai['AUTO_INCREMENT'];

							$sqlakun = "INSERT INTO akun (username, password, role) VALUES ('" . strtolower($username) . "', '$password', 'User')";
							$sqluser = "INSERT INTO user (nik, nama, no_telepon, email, tempat_lahir, alamat_lengkap, jenis_kelamin, akun_id_akun) VALUES ('$nik', '" . ucwords($nama) . "', '$no_telepon', '" . strtolower($email) . "', '" . ucwords($tempat_lahir) . "', '" . ucwords($alamat_lengkap) . "', '$jenis_kelamin', '$id_akun')";
							$sqlusernik = "UPDATE akun SET user_nik = $nik WHERE id_akun = $id_akun";
							if (mysqli_query($conn, $sqlakun) && mysqli_query($conn, $sqluser)) {
								mysqli_query($conn, $sqlusernik);
								$_SESSION['username'] = $_SESSION['username_daftar'];
								$_SESSION['id_akun'] = $id_akun;
								$_SESSION['username_daftar'] = null;
								$_SESSION['password_daftar'] = null;
								echo "<script>
									alert('Register telah berhasil, silahkan login menggunakan akun anda yang baru');
									window.location = 'landingpage.php';
									</script>";
							} else {
								echo "Error: " . mysqli_error($conn);
							}
						}
					}
					?>
				</div>
			</div>
		</div>

	</div>

</body>

</html>