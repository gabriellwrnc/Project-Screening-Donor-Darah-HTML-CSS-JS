<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
				alert('Lakukan login terlebih dahulu di halaman awal user untuk bisa mengakses website ini');
				window.location = 'loginuser.php';
				</script>";
    exit;
}
?>
<?php
include("config.php");
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
    <link rel="stylesheet" href="CSS/profile.css">
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
                    <h3 class="box-title">Biodata</h3>
                    <br>
                    <table cellspacing="25">
                        <tr>
                            <td>Nama</td>
                            <td>
                                <p>: <?php echo $nama; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Nik</td>
                            <td>
                                <p>: <?php echo $nik; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <p>: <?php echo $jenis_kelamin; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>No.Telepon</td>
                            <td>
                                <p>: <?php echo $no_telepon; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <p>: <?php echo $email; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>
                                <p>: <?php echo $tempat_lahir; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <p>: <?php echo $alamat_lengkap; ?></p>
                            </td>
                        </tr>
                    </table>
                    <a href="userupdate.php"><button>UPDATE</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>