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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/landingpage.css">
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
                    <li onclick="window.location = 'profile.php'">Profile</li>
					<?php
						include("config.php");
						$username = $_SESSION["username"];
						$sqlform = "SELECT akun.id_akun, user.form_id_form FROM akun INNER JOIN user ON akun.id_akun = user.akun_id_akun WHERE username = '$username' AND role = 'User'";
						$resform = mysqli_query($conn, $sqlform);
						$form = mysqli_fetch_assoc($resform);
						if(!is_null($form['form_id_form'])){
							echo "<li onclick='window.location = \"hasilform.php\"'>Form</li>";
						}
					?>
                    
                    <li onclick="window.location = 'logout.php'">Logout</li>
                </ul>
            </div>
        </div>

        <div class="main">
            <div class="container">
                <ul>
                    <li><h1>Selamat Datang, "(username)"</h1></li>
                    <li>
                        <p>ININININININININ APAJHASJDH WAUIHDUIWAHDSJKAHWUIH AJISDH</p>
                        <p>ININININININININ APAJHASJDH WAUIHDUIWAHDSJKAHWUIH AJISDH</p>
                        <p>ININININININININ APAJHASJDH WAUIHDUIWAHDSJKAHWUIH AJISDH</p>
                        <p>ININININININININ APAJHASJDH WAUIHDUIWAHDSJKAHWUIH AJISDH</p>
                    </li>
					<?php
						if(is_null($form['form_id_form'])){
							echo "<li><button class='btn-scr' onclick='window.location = \"screening.php\"')'><img src='' alt=''>Lakukan Screening</button></li>";
						}
					?>
                    
                </ul>
            </div>
            <div class="logo-wrapper">
                <img src="img/wrapperbackground.png" alt="">
            </div>
        </div>

        <div class="footer">
            <ul>
                <a href="#manfaat">
                    <li class="konten1">
                        <h3>Manfaat</h3> 
                        <h3> Mendonorkan</h3>
                    </li>
                </a>
                <a href="#goldar">
                    <li class="konten2">
                        <h3>Jenis Golongan</h3>
                        <h3>Darah</h3>
                    </li>
                </a>
                <a href="#tabel">
                    <li class="konten3">
                        <h3>Kecocokan</h3>
                        <h3>Sel Darah</h3>
                    </li>
                </a>
            </ul>
        </div>
    </div>

    <div class="isi-konten" id="manfaat">
        <div class="wrapper-konten">
            <h1>Manfaat Mendonorkan</h1>
            <ul>
                <li>
                    <h3>1. Mendeteksi Penyakit Serius</h3>
                    <p>Proses donor darah tentunya harus melalui beberapa prosedur. Tiap kali seseorang ingin mendonorkan darahnya, prosedur standarnya adalah pemferiksaan darah untuk mendeteksi penyakit serius. Sebut saja HIV, sifilis, hepatitis B, hepatitis C, hingga malaria. Hal ini penting dilakukan demi mengantisipasi adanya penularan penyakit melalui transfusi darah. Prosedur ini juga menjadi “lampu kuning” bagi pendonor agar lebih memperhatikan kondisi kesehatannya sendiri.</p>
                </li>
                <li>
                    <h3>2. Meningkatkan Produksi Sel Darah</h3>
                    <p>Manfaat donor darah juga bisa meningkatkan produksi sel darah merah. Kok bisa? Nah, ketika melakukan donor darah, sel darah memang akan berkurang. Namun, sumsum tulang belakang akan segera memproduksi sel darah merah baru untuk menggantikan yang hilang. Proses ini akan memakan waktu beberapa minggu. Dengan kata lain, seseorang yang mendonorkan darahnya secara teratur, tubuhnya akan menstimulasi pembentukan darah baru yang segar.</p>
                </li>
                <li>
                    <h3>3. Panjang Umur</h3>
                    <p>Manfaat donor darah lainnya juga bisa memperpanjang usia. Sebab menurut banyak penelitian, berbuat baik dapat membuat seseorang hidup lebih lama. Umur orang yang gemar menolong dan tak mementingkan diri sendiri dapat memiliki usia yang lebih panjang sekitar empat tahun.
                    <p>Menurut penelitian dari Mental Health Foundation, donor darah juga bisa menjaga kesehatan emosi seseorang. Membantu orang lain, seperti mendonorkan darah bisa mengurangi tingkat stres hingga membantu menghilangkan perasaan negatif.</p>
                    </p>
                </li>
                <li>
                    <h3>4. Menjaga Kesehatan Jantung</h3>
                    <p>Donor darah juga bermanfaat untuk memperlancar aliran darah hingga mencegah penyumbatan arteri. Rajin mendonorkan darah kira-kira mampu menurunkan risiko serangan jantung hingga 88 persen. Enggak cuma itu, mendonorkan darah juga bisa meminimalkan risiko kanker, stroke, dan serangan jantung. Menariknya lagi, manfaat donor darah juga bisa membuat kadar zat besi dalam darah jadi stabil.</p>
                </li>
            </ul>
        </div>
        <div class="konten1-gambar">
            <img src="img/donateblood.png">
        </div>
    </div>
    <div class="isi-konten2" id="goldar">
        <div class="wrapper-konten2">
            <h1>Jenis Golongan Darah</h1>
            <ul>
                <li>
                    <h3>1. Golongan darah A</h3>
                    <p>Orang dengan golongan darah A memiliki antigen A pada sel darah merahnya. Selain itu, orang dengan golongan darah A menghasilkan antibodi untuk melawan sel darah merah dengan antigen B.</p>
                </li>
                <li>
                    <h3>2. Golongan darah B</h3>
                    <p>Pemilik golongan darah B memiliki antigen A pada sel darah merahnya. Orang dengan golongan darah ini menghasilkan antibodi A untuk melawan sel darah merah dengan antigen A.</p>
                </li>
                <li>
                    <h3>3. Golongan darah AB</h3>
                    <p>Jika memiliki golongan darah AB, ini berarti pemiliknya memiliki antigen A dan B pada sel darah merah. Hal ini juga menandakan Anda tidak memiliki antibodi A dan B pada darah.</p>
                </li>
                <li>
                    <h3>4. Golongan darah O</h3>
                    <p>Orang yang memiliki golongan darah O tidak memiliki antigen A dan B pada sel darah merah. Namun, orang yang memiliki golongan darah O memproduksi antibodi A dan B di dalam darahnya.</p>
                    <p>Selain klasifikasi golongan darah ABO, darah juga dapat diklasifikasikan kembali berdasarkan faktor rhesus yang dimiliki. Faktor rhesus adalah antigen atau protein yang ada di permukaan sel darah merah. Dalam sistem ini, golongan darah terbagi menjadi rhesus positif dan rhesus negatif.</p>
                    <p>Jika sel darah merah memiliki faktor Rh, golongan darah Anda adalah Rh positif. Sebaliknya, golongan darah Anda dinyatakan Rh negatif bila tidak memiliki faktor Rh.</p>
                </li>
            </ul>
        </div>
        <div class="konten2-gambar">
            <img src="img/goldar.png">
        </div>
    </div>
    <div class="isi-konten3" id="tabel">
        <div class="wrapper-konten3">
            <h1>Tabel Kecocokan Sel Darah</h1>
            <table border="1" cellpadding="20" style="width:100%">
                <tr>
                    <th>Penerima</th>
                    <th>O-</th>
                    <th>O+</th>
                    <th>A-</th>
                    <th>A+</th>
                    <th>B-</th>
                    <th>B+</th>
                    <th>AB-</th>
                    <th>AB+</th>
                </tr>
                <tr>
                    <td>O-</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                </tr>
                <tr>
                    <td>O+</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                </tr>
                <tr>
                    <td>A-</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                </tr>
                <tr>
                    <td>A+</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                </tr>
                <tr>
                    <td>B-</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                </tr>
                <tr>
                    <td>B+</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Tidak cocok</td>
                </tr>
                <tr>
                    <td>AB-</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                    <td>Cocok</td>
                    <td>Tidak cocok</td>
                </tr>
                <tr>
                    <td>AB+</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                    <td>Cocok</td>
                </tr>
            </table>
        </div>
    </div>


    
</body>
</html>