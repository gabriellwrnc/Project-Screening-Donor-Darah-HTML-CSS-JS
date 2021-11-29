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
<?php
	include ("config.php");
	$username = $_SESSION['username'];
	$sqlform = "SELECT * FROM akun INNER JOIN form ON akun.id_akun = form.id_form WHERE username = '$username' AND role = 'User'";
	$resform = mysqli_query($conn, $sqlform);
	$form = mysqli_fetch_assoc($resform);
	
	$umur = $form['umur'];
	$berat_badan = $form['berat_badan'];
	$hiv = $form['hiv'];
	$pasangan_hiv = $form['pasangan_hiv'];
	$kontak_hepatitis = $form['kontak_hepatitis'];
	$suntik = $form['suntik'];
	$sex_period = $form['sex_period'];
	$riwayat_donor = $form['riwayat_donor'];
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/form.css">
    <title>Hasil Form</title>
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
					<li onclick="window.location = 'landingpage.php'">Back</li>
					<li onclick="window.location = 'logout.php'">Logout</li>
				</ul>
			</div>
		</div>

		<div class="content">
			<div class="box">
				<div class="form">
					<h3 class="box-title">Hasil Form Screening</h3>
					<br>
					<table>
						<tr>
							<td>Username</td>
							<td>: <?php echo $username; ?></td>
						</tr>
						<tr>
							<td>Umur</td>
							<td>: <?php echo $umur; ?> Tahun</td>
						</tr>
						<tr>
							<td>Berat Badan</td>
							<td>: <?php echo $berat_badan; ?> Kg</td>
						</tr>
						<tr>
							<td>Apakah pernah mengidap HIV/AIDS?</td>
							<td>: <?php echo $hiv; ?></td>
						</tr>
						<tr>
							<td>Apakah anda memiliki pasangan yang mengidap HIV/AIDS? :</td>
							<td>: <?php echo $pasangan_hiv; ?></td>
						</tr>
						<tr>
							<td>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C?</td>
							<td>: <?php echo $kontak_hepatitis; ?></td>
						</tr>
						<tr>
							<td>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter</td>
							<td>: <?php echo $suntik; ?></td>
						</tr>
						<?php
						include("config.php");
							$username = $_SESSION["username"];
							$sqlidkelamin = "SELECT jenis_kelamin FROM akun, user WHERE username = '$username' AND role = 'User'";
							$residkelamin = mysqli_query($conn, $sqlidkelamin);
							$idkelamin = mysqli_fetch_assoc($residkelamin);
							if($idkelamin['jenis_kelamin'] == "Laki-Laki"){
								echo "
								<tr>
									<td>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)?</td>
									<td>: $sex_period</td>
								</tr>
								";
							}
							else if ($idkelamin['jenis_kelamin'] == "Perempuan"){
								echo "
								<tr>
									<td>Apakah Sedang Menstruasi?</td>
									<td>: $sex_period</td>
								</tr>
								";
							}
						?>
						<tr>
							<td>Kapan terakhir kali anda mendonorkan darah?</td>
							<td>: <?php echo $riwayat_donor; ?></td>
						</tr>
					</table>
					
					
				</div>
				<div class="hasil" >
					<h3>Hasil : 
					<?php
						include ('config.php');
						$username = $_SESSION['username'];
						$sqlhasil = "SELECT hasil.hasil_form FROM akun INNER JOIN hasil ON akun.id_akun = hasil.id_hasil WHERE username = '$username' AND role = 'User'";
						$reshasil = mysqli_query($conn, $sqlhasil);
						$hasil = mysqli_fetch_assoc($reshasil);
						$hasil_form = $hasil['hasil_form'];
						if($hasil_form == 'Bisa mendonorkan darah'){
							echo $hasil_form;
							$alasan = false;
						}
						else if($hasil_form == 'Tidak dapat mendonorkan darah'){
							echo $hasil_form;
							$alasan = true;
						}
						
					?>
					</h3>
					<h5>
					<?php
						if($alasan == true){
							$pernah = true;
							echo "Alasan:<br/>";
							if($umur < 17 || $umur > 50){
								echo "Karena batas umur untuk mendonor darah adalah >= 17 tahun dan <= 50 tahun<br/>";
								$pernah = false;
							}
							else if($berat_badan < 47){
								echo "Karena minimal berat badan untuk mendonor adalah >= 47 KG<br/>";
								$pernah = false;
							}
							else if($pernah == true){
								if($hiv == "Pernah"){
									echo "Karena anda mengidap HIV/AIDS<br/>";
								}
								if($pasangan_hiv == "Pernah"){
									echo "Karena anda memiliki pasangan yang mengidap HIV/AIDS, dikhawatirkan anda mempunyai penyakit tersebut<br/>";
								}
								if($kontak_hepatitis == "Pernah"){
									echo "Karena anda pernah melakukan kontak dengan seseorang yang memiliki penyakit hepatitis B atau C, dikhawatirkan anda tertular pada penyakit tersebut<br/>";
								}
								if($suntik == "Pernah"){
									echo "Karena anda pernah menyuntik obat tanpa sepengetahuan dokter, dikhawatirkan obat tersebut akan berdampak buruk bagi seseorang<br/>";
								}
								if($idkelamin['jenis_kelamin'] == "Laki-Laki"){
									if($sex_period == "Pernah"){
										echo "Karena anda pernah melakukan oral atau anal seks tanpa menggunakan pengaman(kondom)<br/>";
									}
								}
								if($idkelamin['jenis_kelamin'] == "Perempuan"){
									if($sex_period == "Pernah"){
										echo "Karena anda sedang menstruasi<br/>";
									}
								}
								if($riwayat_donor == "<=3 Bulan"){
									echo "Karena anda sudah mendonor kurang dari sama dengan 3 bulan<br>";
								}
							}
						}
					?>
					</h5>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>