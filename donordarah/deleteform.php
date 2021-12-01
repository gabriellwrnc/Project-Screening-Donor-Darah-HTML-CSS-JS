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
<?php
	include ("config.php");
	$alert = false;
	$nik = $_GET["nik"];
	$sqlfind = "SELECT * FROM user WHERE nik = $nik";
	$resfind = mysqli_query($conn, $sqlfind);
	$findrow = mysqli_num_rows($resfind);
	if($findrow == 1){
		$sqldelete = "DELETE FROM form WHERE user_nik = $nik;";
		if(mysqli_query($conn, $sqldelete)){
			$alert = true;
		}
	}
	else if($findrow == 0){
		echo "<script>
			alert('Harap menginput nik yang ada pada tabel, silahkan klik ok untuk ke menu admin');
			window.location = 'landingadmin.php';
			</script>";
	}
?>

<html>
	<head>
		<title>Document</title>
	</head>
	<body>
		<script>
			<?php
				if($alert == true){
					?>
					alert("Hapus data telah berhasil!");
					window.location = "landingadmin.php";
					<?php
				}
				else{
					?>
					alert("Hapus data gagal!");
					window.location = "landingadmin.php";
					<?php
				}
				?>
		</script>
	</body>
</html>