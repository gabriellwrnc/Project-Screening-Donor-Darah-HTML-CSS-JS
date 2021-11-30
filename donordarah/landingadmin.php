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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/landingadmin.css">
    <title>Document</title>
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
					<li onclick="window.location = 'profileadmin.php'">Profile</li>
					<li onclick="window.location = 'logout.php'">Logout</li>
				</ul>
			</div>
		</div>
        <div class="content">
			<div class="box">
				<div class="form">
                    <h3 class="box-title">DATABASE CENTER</h3> <br>
                    <div class="tabel">
                        <table border="1" cellpadding="16">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>No.Telepon</th>
                                <th>Email</th>
                                <th>Alamat Lengkap</th>
                                <th>Tempat Lahir</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Gabriel D Lawrence</td>
                                <td>1915026020</td>
                                <td>Laki-Laki</td>
                                <td>082155663333</td>
                                <td>gab@gmail.com</td>
                                <td>Jl.Cikunir Raya</td>
                                <td>Bekasi</td>
                                <td>
                                    <a href="delete.php" class = "delete" onclick="return confirm('you want to delete this data?')"><span class="delete"><ion-icon name="trash-outline"></ion-icon></span></a> <br> <br>
                                    <a href="formuser.php"> <button>Form User</button> </a>
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