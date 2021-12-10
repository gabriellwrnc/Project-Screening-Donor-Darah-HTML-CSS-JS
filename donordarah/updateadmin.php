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
	<link rel="stylesheet" href="CSS/screening.css">
	<title>Form Screening</title>
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
			</div>
		</div>
		<div class="content">
			<div class="box">
				<div class="form">
					<form action="" method="POST">
						<h3 class="box-title">UPDATE SCREENING PENDONOR</h3> <br>
						<h5>NOTES: Tolong anda isi form ini berdasarkan kebenaran dan keadaan yang terjadi, karena keputusan anda akan berdampak kepada orang lain !</h5> <br>

						<table>
							<tr>
								<td>Umur </td>
								<td> : <input type="number" name="umur" value="<?php echo $form['umur']; ?>" required> Tahun</td>
							</tr>
							<tr>
								<td>Berat badan </td>
								<td> : <input type="number" name="berat_badan" value="<?php echo $form['berat_badan']; ?>" required> Kg</td>
							</tr>
						</table>

						<span>Apakah pernah mengidap HIV/AIDS? : </span><br>
						<label>
							<input type="radio" name="hiv" id="pernah" value="Pernah" <?php if ($form['hiv'] == "Pernah") {
																							echo "checked";
																						} ?>>
							<span class="check"></span>
							Pernah
						</label>
						<br>
						<label>
							<input type="radio" name="hiv" id="tidak" value="Tidak Pernah" <?php if ($form['hiv'] == "Tidak Pernah") {
																								echo "checked";
																							} ?>>
							<span class="cross"></span>
							Tidak Pernah
						</label>

						<br>

						<span>Apakah anda memiliki pasangan yang mengidap HIV/AIDS? : </span><br>
						<label>
							<input type="radio" name="pasangan_hiv" id="pernah" value="Pernah" <?php if ($form['pasangan_hiv'] == "Pernah") {
																									echo "checked";
																								} ?>>
							<span class="check"></span>
							Pernah
						</label>
						<br>
						<label>
							<input type="radio" name="pasangan_hiv" id="tidak" value="Tidak Pernah" <?php if ($form['pasangan_hiv'] == "Tidak Pernah") {
																										echo "checked";
																									} ?>>
							<span class="cross"></span>
							Tidak Pernah
						</label>

						<br>

						<span>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C? : </span><br>
						<label>
							<input type="radio" name="kontak_hepatitis" id="pernah" value="Pernah" <?php if ($form['kontak_hepatitis'] == "Pernah") {
																										echo "checked";
																									} ?>>
							<span class="check"></span>
							Pernah
						</label>
						<br>
						<label>
							<input type="radio" name="kontak_hepatitis" id="tidak" value="Tidak Pernah" <?php if ($form['kontak_hepatitis'] == "Tidak Pernah") {
																											echo "checked";
																										} ?>>
							<span class="cross"></span>
							Tidak Pernah
						</label>
						<br>

						<span>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter? : </span><br>
						<label>
							<input type="radio" name="suntik" id="pernah" value="Pernah" <?php if ($form['suntik'] == "Pernah") {
																								echo "checked";
																							} ?>>
							<span class="check"></span>
							Pernah
						</label>
						<br>
						<label>
							<input type="radio" name="suntik" id="tidak" value="Tidak Pernah" <?php if ($form['suntik'] == "Tidak Pernah") {
																									echo "checked";
																								} ?>>
							<span class="cross"></span>
							Tidak Pernah
						</label>

						<br>

						<?php
						include("config.php");
						if ($form['jenis_kelamin'] == "Laki-Laki") {
						?>
							<span>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)? : </span><br>
							<label>
								<input type='radio' name='sex_period' id='pernah' value='Pernah' <?php if ($form['sex_period'] == "Pernah") {
																										echo "checked";
																									} ?>>
								<span class='check'></span>
								Pernah
							</label>
							<br>
							<label>
								<input type='radio' name='sex_period' id='tidak' value='Tidak Pernah' <?php if ($form['sex_period'] == "Tidak Pernah") {
																											echo "checked";
																										} ?>>
								<span class='cross'></span>
								Tidak Pernah
							</label>
							<br>
						<?php
						} else if ($form['jenis_kelamin'] == "Perempuan") {
						?>
							<span>Apakah anda sedang menstruasi? : </span><br>
							<label>
								<input type='radio' name='sex_period' id='pernah' value='Iya' <?php if ($form['sex_period'] == "Iya") {
																									echo "checked";
																								} ?>>
								<span class='check'></span>
								Iya
							</label>
							<br>
							<label>
								<input type='radio' name='sex_period' id='tidak' value='Tidak' <?php if ($form['sex_period'] == "Tidak") {
																									echo "checked";
																								} ?>>
								<span class='cross'></span>
								Tidak
							</label>
							<br>
						<?php
						}
						?>
						<span>Kapan terakhir kali anda mendonorkan darah? : </span><br>
						<label>
							<input type="radio" name="riwayat_donor" id="pernah" value=">3 Bulan" <?php if ($form['riwayat_donor'] == ">3 Bulan") {
																										echo "checked";
																									} ?>>
							<span class="check"></span>
							Lebih dari 3 bulan yang lalu
						</label>
						<br>
						<label>
							<input type="radio" name="riwayat_donor" id="tidak" value="<=3 Bulan" <?php if ($form['riwayat_donor'] == "<=3 Bulan") {
																										echo "checked";
																									} ?>>
							<span class="check"></span>
							Kurang dari 3 bulan yang lalu
						</label>
						<br>

						<button type="submit" name="screening">SUBMIT</button>
					</form>
					<?php
					if (isset($_POST['screening'])) {
						include("config.php");
						$akun_id_akun = $form['akun_id_akun'];
						$umur = $_POST['umur'];
						$berat_badan = $_POST['berat_badan'];
						$hiv = $_POST['hiv'];
						$pasangan_hiv = $_POST['pasangan_hiv'];
						$kontak_hepatitis = $_POST['kontak_hepatitis'];
						$suntik = $_POST['suntik'];
						$sex_period =  $_POST['sex_period'];
						$riwayat_donor = $_POST['riwayat_donor'];

						$sqlscreening = "UPDATE form SET umur = '$umur', berat_badan = '$berat_badan', hiv = '$hiv', pasangan_hiv = '$pasangan_hiv', kontak_hepatitis = '$kontak_hepatitis', suntik = '$suntik', sex_period = '$sex_period', riwayat_donor = '$riwayat_donor' WHERE id_form = '$akun_id_akun'";

						if ($umur < 17 || $umur > 50 || $berat_badan < 47 || $hiv == "Pernah" || $pasangan_hiv == "Pernah" || $kontak_hepatitis == "Pernah" || $suntik == "Pernah" || $hiv == "Pernah" || $sex_period == "Pernah" || $sex_period == "Iya" || $riwayat_donor == "<=3 Bulan") {
							$sqlhasil = "UPDATE hasil SET hasil_form = 'Tidak dapat mendonorkan darah' WHERE id_hasil = '$akun_id_akun'";
						} else {
							$sqlhasil = "UPDATE hasil SET hasil_form = 'Bisa mendonorkan darah' WHERE id_hasil = '$akun_id_akun'";
						}

						if (mysqli_query($conn, $sqlscreening) && mysqli_query($conn, $sqlhasil)) {
							echo "<script>
									alert('Update telah berhasil!, anda dialihan ke halaman sebelumnya');
									window.location = 'formuser.php?nik=$nik';
									</script>";
						} else {
							echo "Error: " . mysqli_error($conn);
						}
					}

					?>
				</div>
			</div>
		</div>
	</div>


</body>

</html>