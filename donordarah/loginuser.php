<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/stylelogin.css">
</head>

<body>

    <img class="background" src="img/background.png">
    <img class="logo-tangan" src="img/background2.png">

    <div class="header">
        <div class="header-logo">
            <ul>
                <li><img src="img/logo1.png"></li>
                <li>
                    <h1>AYO DONOR</h1>
                </li>
            </ul>
        </div>
    </div>

    <div class="wrapper">

        <div class="container">
            <div class="whitebg">

                <div class="box signin">
                    <h2>Sudah Punya Akun ?</h2>
                    <button class="signinBtn">Login</button>
                </div>
                <div class="box signup">
                    <h2>Belum Punya Akun ?</h2>
                    <button class="signupBtn">Daftar</button>
                </div>

            </div>
            <div class="formWx">
                <div class="form signinForm">
                    <form action="" method="post">
                        <h3>Selamat Datang, <i>Pendonor</i> <br> Masukkan akun anda : </h3>
                        <input type="text" name="login_username" placeholder="Username" required>
                        <input type="password" name="login_password" placeholder="Password" required>
                        <input type="submit" class="submit" name="login" value="Login">
                    </form>
                    <?php
                    include("config.php");
                    if (isset($_POST['login'])) {
                        $log_username = mysqli_real_escape_string($conn, $_POST['login_username']);
                        $password = $_POST['login_password'];
                        $res = mysqli_query($conn, "SELECT * FROM akun WHERE username = '" . strtolower($log_username) . "' AND role = 'User'");
                        $count = mysqli_num_rows($res);
                        if ($count == 1) {
                            $verif = mysqli_fetch_assoc($res);
                            if (password_verify($password, $verif['password'])) {
                                session_start();
                                $_SESSION["username"] = $log_username;
                                echo "<script>
								alert('Selamat Datang Kembali');
								window.location = 'landingpage.php';
								</script>";
                                exit;
                            } else {
                                echo "<script>
								alert('Maaf Password anda salah, silahkan coba kembali')</script>";
                            }
                        } else {
                            echo "<script>alert('Maaf Username atau Password salah, silahkan coba kembali')</script>";
                        }
                    }
                    ?>
                </div>

                <div class="form signupForm">
                    <form action="" method="post">
                        <h3>Ayo Daftar dulu : </h3>
                        <input type="text" name="daftar_username" placeholder="Username" required>
                        <input type="password" name="daftar_password" placeholder="Password" required>
                        <input type="password" name="daftar_cpassword" placeholder="Confirm Password" required>
                        <input type="submit" class="submit" name="daftar" value="Daftar">
                    </form>
                    <?php
                    include("config.php");
                    if (isset($_POST["daftar"])) {
                        $username = $_POST['daftar_username'];
                        $password = $_POST['daftar_password'];
                        $cpassword = $_POST['daftar_cpassword'];

                        $sqlusername = "SELECT username FROM akun WHERE username = '$username'";
                        $resusername = mysqli_query($conn, $sqlusername);

                        if (mysqli_num_rows($resusername) >= 1) {
                            echo "<script>
							alert('Username sudah dipakai, silahkan menggunakan username lain');
							history.back();
							</script>";
                        } else if ($cpassword != $_POST['daftar_password']) {
                            echo "<script>
							alert('password tidak sama dengan confirmation password, silahkan coba lagi');
							history.back();
							</script>";
                        } else {
                            session_start();
                            $_SESSION['username_daftar'] = $username;
                            $_SESSION['password_daftar'] = $password;
                            header("Location: userregister.php");
                        }
                    }
                    ?>
                </div>

            </div>
        </div>

    </div>

    <script>
        const signinBtn = document.querySelector('.signinBtn')
        const signupBtn = document.querySelector('.signupBtn')
        const formWX = document.querySelector('.formWx')
        const wrapper = document.querySelector('.wrapper')

        signupBtn.onclick = function() {
            formWX.classList.add('active')
            wrapper.classList.add('active')
        }

        signinBtn.onclick = function() {
            formWX.classList.remove('active')
            wrapper.classList.remove('active')
        }
    </script>

</body>

</html>