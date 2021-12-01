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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
    <link rel="stylesheet" href="CSS/userupdate.css">
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
                    <li onclick="window.location = 'profile.php'">Back</li>
                    <li onclick="window.location = 'logout.php'">Logout</li>
                </ul>
            </div>
        </div>

        <div class="content">
            <div class="box">
                <div class="form">
                    <form action="" method="POST">
                        <h3 class="box-title">Update Biodata</h3>
                        <br>
                        <table cellpadding="20">
                            <tr>
                                <td>Nama</td>
                                <td>:<input type="text" name="nama" value="<?php echo $profil['nama']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td>:<input type="number" name="nik" value="<?php echo $profil['nik']; ?>" min='0' required></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:<input type="tel" name="no_telepon" value="<?php echo $profil['no_telepon']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:<input type="text" name="email" value="<?php echo $profil['email']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:<input type="text" name="tempat_lahir" value="<?php echo $profil['tempat_lahir']; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:<input type="text" name="alamat_lengkap" value="<?php echo $profil['alamat_lengkap']; ?>" required></td>
                            </tr>
                            <?php
                            if (!isset($profil['form_id_form'])) {
                            ?>
                                <tr>
                                    <td>Jenis Kelamin :</td>

                                    <td>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" <?php if ($profil['jenis_kelamin'] == "Laki-Laki") {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                            <span class="check"></span>
                                            Laki-Laki
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?php if ($profil['jenis_kelamin'] == "Perempuan") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                            <span class="check"></span>
                                            Perempuan
                                        </label>
                                    </td>

                                </tr>
                        </table>
                    <?php
                            } else {
                                $_POST['jenis_kelamin'] = $profil['jenis_kelamin'];
                    ?>
                        <tr>
                            <td>Jenis Kelamin (Yang Terdata)</td>
                            <td>:<?php echo $profil['jenis_kelamin']; ?></td>
                        </tr>
                        </table>
                        <p>Jenis kelamin tidak bisa diganti, karena anda sudah mengisi form</p>
                    <?php
                            }
                    ?>
                    <button type="submit" name="update">UPDATE</button>
                    </form>
                </div>
                <?php
                if (isset($_POST['update'])) {
                    include("config.php");
                    $tempnik = $profil['nik'];
                    $nama = htmlspecialchars($_POST['nama']);
                    $nik = $_POST['nik'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $no_telepon = htmlspecialchars($_POST['no_telepon']);
                    $email = htmlspecialchars($_POST['email']);
                    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
                    $alamat_lengkap = htmlspecialchars($_POST['alamat_lengkap']);

                    $sqlupdate = "UPDATE user SET nik = '$nik', nama = '$nama', no_telepon = '$no_telepon', email = '$email', tempat_lahir = '$tempat_lahir', jenis_kelamin = '$jenis_kelamin' WHERE nik = $tempnik";
                    if (mysqli_query($conn, $sqlupdate)) {
                        echo "<script>
								alert('Update telah berhasil!, anda dialihan ke halaman profile');
								window.location = 'profile.php';
								</script>";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>