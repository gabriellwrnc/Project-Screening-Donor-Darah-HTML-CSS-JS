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
                    <h3 class="box-title">DATABASE FORM PENDONOR</h3> <br>
                    <div class="tabel1">
                        <table border="1" cellpadding="16">
                            <tr>
                                <th>Umur</th>
                                <th>Berat Badan</th>
                                <th>Apakah pernah mengidap HIV/AIDS?</th>
                                <th>Apakah anda memiliki pasangan yang mengidap HIV/AIDS?</th>
                                <th>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C?</th>
                                <th>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter?</th>
                                <th>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)?</th>
                                <th>Kapan terakhir kali anda mendonorkan darah?</th>
                                <th>Hasil</th>
                                <th>Aksi</th>
                            </tr>
                            <tr>
                                <td>20 Tahun</td>
                                <td>50 Kg</td>
                                <td>Tidak Pernah</td>
                                <td>Tidak Pernah</td>
                                <td>Tidak Pernah</td>
                                <td>Tidak Pernah</td>
                                <td>>3 Bulan</td>
                                <td>Bisa Mendonorkan Darah</td>
                                <td>Bekasi</td>
                                <td>
                                    <a href="updateadmin.php" class = "update"><span class="create"><ion-icon name="create-outline"></ion-icon></span></a> <br> <br>
                                    <a href="delete.php" class = "delete" onclick="return confirm('you want to delete this data?')"><span class="delete"><ion-icon name="trash-outline"></ion-icon></span></a>
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