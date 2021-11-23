<?php 

    if (isset($_POST['daftar'])){
        header("Location: userregister.php");
    }

?>

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
                <form action="landinguser.php" method="post">
                    <h3>Selamat Datang, <i>Pendonor</i> <br> Masukkan akun anda : </h3>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <input type="submit" class="submit" name="login" value="Login">
                </form>
            </div>

            <div class="form signupForm">
                <form action="" method="post">
                    <h3>Ayo Daftar dulu : </h3>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <input type="password" placeholder="Confirm Password">
                    <input type="submit" class="submit" name="daftar" value="Daftar">
                </form>
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