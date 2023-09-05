<!DOCTYPE html> 
<html>
    <head> 
        <title>Mengirim Data ke Server</title>
</head>
<body>
    <form method="GET" accept="/php-dasar/proses-data.php"> 
        <input name="nama" placeholder="Kata kunci"/>
        <button type="submit">Cari</button> 
    </form> 
    <form method="POST" action="proses-data.php">
        <p>
            <label>Nama</label>
            <br/> <input type="text" name="nama"/>
        </p>
        <p>
            <label>Email</label> 
            <br/> <input type="email" name="email"/>
        </p>
        <p>
            <label>Jenis Kelamin</label>
            <br/> <input type="radio" value="L" name="jk"/> Laki Laki
            <br/> <input type="radio" value="p" name="jk"/> Perempuan
        </p>
        <p>
            <label>Umur</label>
            <br/> <select name="umur">
                <option value="8-29">Di bawah 30 tahun</option>
                <option value="30-60">30 sampai 60</option>
                <option value="68+">Diatas 60</option>
            </select>
        </p>
        <p>
            <label>Alamat</label>
            <br/>
            <textarea name="alamat"></textarea>
        </p>
        <p>
            <button type="submit">Kirim</button>
</p>
</body>
</html>
