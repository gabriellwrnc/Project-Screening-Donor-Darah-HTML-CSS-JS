<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/styleloginAdm.css">
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
                    <h2>Let's serve our <i>Patient</i> <br> with <br> <b>Patience</b> and <b>Honesty</b></h2>
                </div>

            </div>
        <div class="formWx">
            <div class="form signinForm">
                <form action="landingadmin.php" method="post">
                    <h3>Welcome, <i>Admin</i> <br> Type your <i>Admin</i> Account : </h3>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <input type="submit" class="submit" name="login" value="Login">
                </form>
            </div>
        </div>
        </div>
        
    </div>
    
</body>

</html>