<?php
	session_start();
	if(!isset($_SESSION['username'])){
		echo "<script>
				alert('Lakukan login terlebih dahulu di halaman awal user untuk bisa mengakses website ini');
				window.location = 'loginuser.php';
				</script>";
		exit;
	}  
?>
<?php
	include ("config.php");
	$username = $_SESSION['username'];
	$sqlprofil = "SELECT * FROM akun INNER JOIN user ON akun.id_akun = user.akun_id_akun WHERE username = '$username' AND role = 'User'";
	$resprofil = mysqli_query($conn, $sqlprofil);
	$profil = mysqli_fetch_assoc($resprofil);
	
	$nama = $profil['nama'];
    $nik = $profil['nik'];
    $jenis_kelamin = $profil['jenis_kelamin'];
	$no_telepon = $profil['no_telepon'];
	$email = $profil['email'];
	$tempat_lahir = $profil['tempat_lahir'];
	$alamat_lengkap = $profil['alamat_lengkap'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
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

    <div class="profile">
        <h3>Data Pribadi</h3>
        <p>Nama : <?php echo $nama; ?></p> <a href="#">ubah</a>
        <p>Nik : <?php echo $nik; ?></p> <a href="#">ubah</a>
        <p>Jenis Kelamin : <?php echo $jenis_kelamin; ?></p><a href="#">ubah</a>
        <p>No.Telepon : <?php echo $no_telepon; ?></p> <a href="#">ubah</a>
        <p>Email : <?php echo $email; ?></p> <a href="#">ubah</a>
        <p>Tempat Lahir : <?php echo $tempat_lahir; ?></p> <a href="#">ubah</a>
        <p>Alamat : <?php echo $alamat_lengkap; ?></p> <a href="#">ubah</a>
    </div>
</body>
</html>