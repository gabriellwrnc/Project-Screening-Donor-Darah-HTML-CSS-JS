<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Screening</title>
</head>
<body>
    <header> <h1>Screening Pendonor</h1> </header>

    <div class="survey">
        <form action="" method="POST">
            <p>*Disclaimer: semua yang anda isi harus berdasarkan kebenaran dan keadaan yang terjadi, karena resiko akan anda tanggung sendiri</p> <br>

            <span>Umur (Tahun): </span>
            <input type="number" name="umur" required> <br><br>

            <span>Berat badan (Kg) : </span>
            <input type="number" name="umur" required> <br><br>

            <span>Apakah pernah mengidap HIV/AIDS? : </span><br>
            <input type="radio" name="hiv" id="tidak" value="Tidak Pernah">
            <label for="tidak">Tidak Pernah</label>
            <br>
            <input type="radio" name="hiv" id="pernah" value="Pernah">
            <label for="pernah">Pernah</label> <br><br>

            <span>Apakah anda memiliki pasangan yang mengidap HIV/AIDS? : </span><br>
            <input type="radio" name="hivpasangan" id="tidak1" value="Tidak Pernah">
            <label for="tidak1">Tidak Pernah</label>
            <br>
            <input type="radio" name="hivpasangan" id="pernah1" value="Pernah">
            <label for="pernah1">Pernah</label> <br><br>

            <span>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis B atau C? : </span><br>
            <input type="radio" name="hepatitis" id="tidak2" value="Tidak Pernah">
            <label for="tidak2">Tidak Pernah</label>
            <br>
            <input type="radio" name="hepatitis" id="pernah2" value="Pernah">
            <label for="pernah2">Pernah</label> <br><br>

            <span>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter : </span><br>
            <input type="radio" name="obat" id="tidak3" value="Tidak Pernah">
            <label for="tidak3">Tidak Pernah</label>
            <br>
            <input type="radio" name="obat" id="pernah3" value="Pernah">
            <label for="pernah3">Pernah</label> <br><br>

            <span>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)? : </span><br>
            <input type="radio" name="pengaman" id="tidak4" value="Tidak Pernah">
            <label for="tidak4">Tidak Pernah</label>
            <br>
            <input type="radio" name="pengaman" id="pernah4" value="Pernah">
            <label for="pernah4">Pernah</label> <br><br>

            <span>Kapan terakhir kali anda mendonorkan darah? : </span><br>
            <input type="radio" name="donor" id="tidak5" value=">3 Bulan">
            <label for="tidak5">>3 Bulan</label>
            <br>
            <input type="radio" name="donor" id="pernah5" value="<3 Bulan">
            <label for="pernah5"><=3 Bulan</label> <br><br>

            <span>Apakah sedang menstruasi? : </span><br>
            <input type="radio" name="mens" id="tidak6" value="Tidak Pernah">
            <label for="tidak6">Tidak Pernah</label>
            <br>
            <input type="radio" name="mens" id="pernah6" value="Pernah">
            <label for="pernah6">Pernah</label> <br><br>

            <button type="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>