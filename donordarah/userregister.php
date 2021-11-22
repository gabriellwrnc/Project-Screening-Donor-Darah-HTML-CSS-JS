<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/styleregister.css">
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
                </div>
                <div class="box signup">
                </div>

            </div>
            <div class="formWx">
                <div class="form signinForm">
                    <form action="" method="post">
                        <h3>Halo "(username)", <br> Mari bantu kami <br> melengkapi data dirimu : </h3>
                        <input type="text" placeholder="Nama">
                        <input type="text" placeholder="NIK">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="Tempat Lahir">
                        <input type="date" placeholder="Tanggal Lahir">
                        <input type="text" placeholder="Alamat Lengkap">
                        <p>Jenis Kelamin :</p> 
                        <input type="radio" name="jenis_kelamin" id = "laki" >
                        <label for="laki" class="label">Laki-laki</label>

                        <input type="radio" name="jenis_kelamin" id = "perempuan" > 
                        <label for="perempuan" class="label">Perempuan</label>

                        <input type="submit" class="submit"name="daftardata" value="Daftar">
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    
</body>

</html>