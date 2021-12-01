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
                    <h3 class="box-title">Update Biodata</h3>
                    <br>
                    <table cellpadding="20">
                        <tr>
                            <td>Nama</td>
                            <td>:<input type="text" name="nama" placeholder="Gabriel" required></td>
                        </tr>
                        <tr>
                            <td>Nik</td>
                            <td>:<input type="text" name="nik" placeholder="1915026020" required></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:<input type="tel" name="no_telepon" placeholder="082155444444" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:<input type="text" name="email"placeholder="gab@gmail.com" required></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:<input type="text" name="tempat_lahir" placeholder="Bekasi" required></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:<input type="text" name="alamat_lengkap" placeholder="Jl.Cinukir Raya" required></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin (Yang Terdata)</td>
                            <td>:Laki-Laki</td>
                        </tr>
                        <!-- yang keluar kalo dia belom isi form -->
                        <tr>
                            <td>Perubahan :</td>
                            
                            <td>
                            <label >
                                <input type="radio" name="jenis_kelamin" id = "laki" value="Laki-Laki">
                                <span class="check"></span>
                                Laki-Laki
                            </label>
                            <br>
                            <label >
                                <input type="radio" name="jenis_kelamin" id = "perempuan" value="Perempuan"> 
                                <span class="check"></span>
                                Perempuan
                            </label>
                            </td>
                        
                        </tr>
                    </table>
                    <!-- yang keluar kalo dia sudah isi forom -->
                    <p>Jenis kelamin tidak bisa diganti, karena anda sudah mengisi form</p>
                    <button type="submit" name="update">UPDATE</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>