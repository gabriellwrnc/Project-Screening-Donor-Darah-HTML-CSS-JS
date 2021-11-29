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
    <title>Form Screening</title>
</head>
<body>
    <header> <h1>Screening Pendonor</h1> </header>

    <div class="survey">
        <form action="" method="POST">
            <p>*Disclaimer: semua yang anda isi harus berdasarkan kebenaran dan keadaan yang terjadi, karena resiko akan anda tanggung sendiri</p> <br>

            <span>Umur (Tahun): </span>
            <input type="number" name="umur" required> <br><br>

            <span>Berat badan (Kg) : </span>
            <input type="number" name="berat_badan" required> <br><br>

            <span>Apakah pernah mengidap HIV/AIDS? : </span><br>
            <input type="radio" name="hiv" id="tidak" value="Tidak Pernah">
            <label for="tidak">Tidak Pernah</label>
            <br>
            <input type="radio" name="hiv" id="pernah" value="Pernah">
            <label for="pernah">Pernah</label> <br><br>

            <span>Apakah anda memiliki pasangan yang mengidap HIV/AIDS? : </span><br>
            <input type="radio" name="pasangan_hiv" id="tidak1" value="Tidak Pernah">
            <label for="tidak1">Tidak Pernah</label>
            <br>
            <input type="radio" name="pasangan_hiv" id="pernah1" value="Pernah">
            <label for="pernah1">Pernah</label> <br><br>

            <span>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C? : </span><br>
            <input type="radio" name="kontak_hepatitis" id="tidak2" value="Tidak Pernah">
            <label for="tidak2">Tidak Pernah</label>
            <br>
            <input type="radio" name="kontak_hepatitis" id="pernah2" value="Pernah">
            <label for="pernah2">Pernah</label> <br><br>

            <span>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter : </span><br>
            <input type="radio" name="suntik" id="tidak3" value="Tidak Pernah">
            <label for="tidak3">Tidak Pernah</label>
            <br>
            <input type="radio" name="suntik" id="pernah3" value="Pernah">
            <label for="pernah3">Pernah</label> <br><br>
			<?php
			include("config.php");
			$username = $_SESSION["username"];
			$sqlidkelamin = "SELECT akun.id_akun, user.nik, user.jenis_kelamin FROM akun INNER JOIN user ON akun.id_akun = user.akun_id_akun WHERE username = '$username' AND role = 'User'";
			$residkelamin = mysqli_query($conn, $sqlidkelamin);
			$idkelamin = mysqli_fetch_assoc($residkelamin);
			if($idkelamin['jenis_kelamin'] == "Laki-Laki"){
				echo "<span>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)? : </span><br>
					<input type='radio' name='sex_period' id='tidak4' value='Tidak Pernah'>
					<label for='tidak4'>Tidak Pernah</label>
					<br>
					<input type='radio' name='sex_period' id='pernah4' value='Pernah'>
					<label for='pernah4'>Pernah</label> <br><br>";
			}
			else if ($idkelamin['jenis_kelamin'] == "Perempuan"){
				echo "<span>Apakah sedang menstruasi? : </span><br>
				<input type='radio' name='sex_period' id='tidak4' value='Tidak Pernah'>
				<label for='tidak4'>Tidak Pernah</label>
				<br>
				<input type='radio' name='sex_period' id='pernah6' value='Pernah'>
				<label for='pernah4'>Pernah</label> <br><br>";
			}
			?>
            <span>Kapan terakhir kali anda mendonorkan darah? : </span><br>
            <input type="radio" name="riwayat_donor" id="tidak5" value=">3 Bulan">
            <label for="tidak5">>3 Bulan</label>
            <br>
            <input type="radio" name="riwayat_donor" id="pernah5" value="<3 Bulan">
            <label for="pernah5"><=3 Bulan</label> <br><br>

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
				if(mysqli_query($conn, $sqlscreening) && mysqli_query($conn, $sqlnik)){
					mysqli_query($conn, $sqlidform);
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
</body>
</html>