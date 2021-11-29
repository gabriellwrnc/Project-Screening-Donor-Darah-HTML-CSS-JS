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
	$sqlform = "SELECT * FROM akun, form WHERE username = '$username' AND role = 'User'";
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
    <title>Hasil Form</title>
</head>
<body>
    <header> <h1>Profile User</h1> </header>

    <div class="nav">
        <ul>
            <li class="list">
                <a href="landingpage.php">
                    <span class="icon"></span>
                    <span class="tittle">Back</span>
                </a>
            </li>
            <li class="list">
                <a href="logout.php">
                    <span class="icon"></span>
                    <span class="tittle">Log Out</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="hasil">
        <p>Umur : <?php echo $umur; ?></p>
        <p>Berat Badan : <?php echo $berat_badan; ?> Kg</p>
        <p>Apakah pernah mengidap HIV/AIDS? : <?php echo $hiv; ?></p>
        <p>Apakah anda memiliki pasangan yang mengidap HIV/AIDS? : <?php echo $pasangan_hiv; ?></p>
        <p>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C? : <?php echo $kontak_hepatitis; ?></p>
        <p>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter : <?php echo $suntik; ?></p>
		<?php
		include("config.php");
			$username = $_SESSION["username"];
			$sqlidkelamin = "SELECT jenis_kelamin FROM akun, user WHERE username = '$username' AND role = 'User'";
			$residkelamin = mysqli_query($conn, $sqlidkelamin);
			$idkelamin = mysqli_fetch_assoc($residkelamin);
			if($idkelamin['jenis_kelamin'] == "Laki-Laki"){
				echo "<p>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)? : $sex_period</p>";
			}
			else if ($idkelamin['jenis_kelamin'] == "Perempuan"){
				echo "<p>Apakah Sedang Menstruasi?: $sex_period</p>";
			}
		?>
        
        <p>Kapan terakhir kali anda mendonorkan darah? : <?php echo $riwayat_donor; ?></p>
        
        <h3>Hasil : Tidak dapat mendonorkan darah</h3>
        <h4>Alasan : Karena batas umur untuk mendonorkan darah adalah >=17 tahun dan <=50 tahun (opsional)</h4>
    </div>
</body>
</html>