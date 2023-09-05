
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD Data Gambar</title>
</head>
<body>
    <div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
    <div class="card-header fw-bold">
        TAMBAH GAMBAR
        </div>
        <div class="card-body">
            <form action="simpan.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group fw-bold">
                    <label>Judul</label>
                    <input type="text" name="judul" placeholder="Masukkan judul" class="form-control">
                </div>
                
                <div class="form-group fw-bold">
                    <label>GAMBAR</label>
                    <input type="file" name="gambar"  class="form-control">
                </div>
               
                <button type="submit" class="btn btn-success mt-2">SIMPAN</button>
                <button type="reset" class="btn btn-warning mt-2">RESET</button>
            
</from>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0G1n4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfskb29ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVUtG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxh1mW15/YESvpz13" crossorigin="anonymous"></script>
</body>
</html>