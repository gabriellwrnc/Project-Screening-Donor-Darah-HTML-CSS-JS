<?php
	session_start();
	if(!isset($_SESSION['username'])){
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
	<link rel="stylesheet" href="CSS/screening.css">
    <title>Form Screening</title>
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
			</div>
		</div>
		<div class="content">
			<div class="box">
				<div class="form">
					<form action="" method="POST">
						<h3 class="box-title">SCREENING PENDONOR</h3> <br>
						<h5>NOTES: Tolong anda isi form ini berdasarkan kebenaran dan keadaan yang terjadi, karena keputusan anda akan berdampak kepada orang lain !</h5> <br>

						<table>
						<tr>
							<td>Umur (Tahun)</td>
							<td>: <input type="number" name="umur" required></td>
						</tr>
						<tr>
							<td>Berat badan (Kg)</td>
							<td>: <input type="number" name="berat_badan" required></td>
						</tr>
						</table>

						<span>Apakah pernah mengidap HIV/AIDS? : </span><br>
						<label >
							<input type="radio" name="hiv" id="pernah" value="Pernah">
							<span class="check"></span>
							Pernah
						</label>
						<br>
						<label >
							<input type="radio" name="hiv" id="tidak" value="Tidak Pernah">
							<span class="cross"></span>
							Tidak Pernah
						</label>

						<br>

						<span>Apakah anda memiliki pasangan yang mengidap HIV/AIDS? : </span><br>
						<label >
							<input type="radio" name="pasangan_hiv" id="pernah" value="Pernah">
							<span class="check"></span>
							Pernah
						</label>
						<br>
						<label >
							<input type="radio" name="pasangan_hiv" id="tidak" value="Tidak Pernah">
							<span class="cross"></span>
							Tidak Pernah
						</label>

						<br>

						<span>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C? : </span><br>
						<label >
							<input type="radio" name="kontak_hepatitis" id="pernah" value="Pernah">
							<span class="check"></span>
							Pernah
						</label>
						<br>
						<label >
							<input type="radio" name="kontak_hepatitis" id="tidak" value="Tidak Pernah">
							<span class="cross"></span>
							Tidak Pernah
						</label>

						<br>

						<span>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter : </span><br>
						<label >
							<input type="radio" name="suntik" id="pernah" value="Pernah">
							<span class="check"></span>
							Pernah
						</label>
						<br>
						<label >
							<input type="radio" name="suntik" id="tidak" value="Tidak Pernah">
							<span class="cross"></span>
							Tidak Pernah
						</label>

						<br>

						<?php
						include("config.php");
						$username = $_SESSION["username"];
						$sqlidkelamin = "SELECT akun.id_akun, user.nik, user.jenis_kelamin FROM akun INNER JOIN user ON akun.id_akun = user.akun_id_akun WHERE username = '$username' AND role = 'User'";
						$residkelamin = mysqli_query($conn, $sqlidkelamin);
						$idkelamin = mysqli_fetch_assoc($residkelamin);
						if($idkelamin['jenis_kelamin'] == "Laki-Laki"){
							echo "<span>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)? : </span><br>
								<label >
									<input type='radio' name='sex_period' id='pernah' value='Pernah'>
									<span class='check'></span>
									Pernah
								</label>
								<br>
								<label >
									<input type='radio' name='sex_period' id='tidak'  value='Tidak Pernah'>
									<span class='cross'></span>
									Tidak Pernah
								</label>
								
								<br>";
						}
						else if ($idkelamin['jenis_kelamin'] == "Perempuan"){
							echo "<span>Apakah sedang menstruasi? : </span><br>
							<label >
									<input type='radio' name='sex_period' id='pernah' value='Iya'>
									<span class='check'></span>
									Iya
								</label>
								<br>
								<label >
									<input type='radio' name='sex_period' id='tidak'  value='Tidak'>
									<span class='cross'></span>
									Tidak
								</label>
								
								<br>";
						}
						?>
						<span>Kapan terakhir kali anda mendonorkan darah? : </span><br>
						<label >
							<input type="radio" name="riwayat_donor" id="pernah" value=">3 Bulan">
							<span class="check"></span>
							Lebih dari 3 bulan yang lalu
						</label>
						<br>
						<label >
							<input type="radio" name="riwayat_donor" id="tidak" value="<=3 Bulan">
							<span class="cross"></span>
							Kurang dari 3 bulan yang lalu
						</label> 
						<br>

						<button type="submit" name="screening">SUBMIT</button>
					</form>
					<?php
						if(isset($_POST['screening'])){
							include("config.php");
							$akun_id_akun = $idkelamin['id_akun'];
							$umur = $_POST['umur'];
							$berat_badan = $_POST['berat_badan'];
							$hiv = $_POST['hiv'];
							$pasangan_hiv = $_POST['pasangan_hiv'];
							$kontak_hepatitis = $_POST['kontak_hepatitis'];
							$suntik = $_POST['suntik'];
							$sex_period =  $_POST['sex_period'];
							$riwayat_donor = $_POST['riwayat_donor'];
							
							$sqlscreening = "INSERT INTO form (id_form, umur, berat_badan, hiv, pasangan_hiv, kontak_hepatitis, suntik, sex_period, riwayat_donor) VALUES ('$akun_id_akun', '$umur', '$berat_badan', '$hiv', '$pasangan_hiv', '$kontak_hepatitis', '$suntik', '$sex_period', '$riwayat_donor')";
							$sqlnik = "UPDATE form SET user_nik = (SELECT nik FROM  user WHERE akun_id_akun = '$akun_id_akun') WHERE id_form = '$akun_id_akun'";
							$sqlidform = "UPDATE user SET form_id_form = '$akun_id_akun' WHERE akun_id_akun = '$akun_id_akun'";
							
							if($umur < 17 && $umur > 50 || $berat_badan < 47 || $hiv == "Pernah" || $pasangan_hiv == "Pernah" || $kontak_hepatitis == "Pernah" || $suntik == "Pernah" || $hiv == "Pernah" || $sex_period == "Pernah" || $sex_period == "Iya" || $riwayat_donor == "<=3 Bulan"){
								$sqlhasil = "INSERT INTO hasil (id_hasil, hasil_form, form_id_form) VALUES ($akun_id_akun, 'Tidak dapat mendonorkan darah', $akun_id_akun)";
							}
							else{
								$sqlhasil = "INSERT INTO hasil (id_hasil, hasil_form, form_id_form) VALUES ($akun_id_akun, 'Bisa mendonorkan darah', $akun_id_akun)";
							}
							$sqlidhasil = "UPDATE form SET hasil_id_hasil = '$akun_id_akun' WHERE id_form = $akun_id_akun";
							
							if(mysqli_query($conn, $sqlscreening) && mysqli_query($conn, $sqlnik) && mysqli_query($conn, $sqlhasil)){
								mysqli_query($conn, $sqlidform);
								mysqli_query($conn, $sqlidhasil);
								echo "<script>
									alert('Screening telah berhasil!, anda dialihan ke landing page');
									window.location = 'landingpage.php';
									</script>";
							}
							else{
								echo "Error: ". mysqli_error($conn);
							}
						}
						
					?>
				</div>
			</div>
		</div>
	</div>

		
</body>
</html>