<!DOCTYPE html>
<html>
    <head>
        <title>Komentar</title>
    </head>
<body> 
    <table border="1">
        <thead>
            <tr>
            <th>Nana</th>
            <th>Email</th> 
            <th>Komentar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../koneksi.php";
            $query = mysqli_query($connection, "SELECT * FROM contact_us ");
            while($row = mysqli_fetch_array($query))
             { 
            echo '<tr>';
            echo '<td>'.$row['nama'].'</td>';
            echo '<td>'.$row['email'].'</td>';
            echo '<td>'.$row['komentar'].'</td>'; 
            echo '</tr>';
            }
            ?>
        </tbody>

</table>
        </body>
</html>