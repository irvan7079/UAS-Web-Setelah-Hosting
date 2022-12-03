<?php
require("proses_koneksi.php");
if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT nama, genre FROM komik WHERE id = $id");

$komik = [];

while ($row = mysqli_fetch_assoc($result)) {
    $komik[] = $row;
}

$kmk = $komik[0];

if (isset($_POST["tambah"])) {
    $nama = htmlspecialchars($_POST["nama"]);
    $genre = htmlspecialchars($_POST["genre"]);

    $sql = "UPDATE komik SET
            nama = '$nama',
            genre = '$genre'
            WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ( $result ) {
        echo"
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'admin_menu_data_komik.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('Data gagal diubah');
                document.location.href = 'admin_menu_data_komik.php';
            </script>
        ";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css?v=<?php echo time();?>/">
    <link rel="shortcut icon" href="images/LogoZhongliB.ico">
    <title>Edit Komik</title>
    <style>
    body {
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #588d24;
    }

    .container {
      width: 60%;
      height: 60vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: rgb(117, 159, 26);
      border-radius: 10px;
    }

    .container h1 {
      color: black;
      text-align: center;
    }

    table {
      margin-bottom: auto;
      border-collapse: collapse;
      background: rgb(107, 202, 81);
      color: #000000;
    }

    th, td {
      text-align: left;
      border: 2px solid #000000;
      padding: 20px 30px;
    }

    .tambah{
      color: #eeeeee;
      background: #222222;
      border-radius: 10px;
      padding: 0.8rem 1.8rem;
      align-items: center;
      margin-left: 42%;
    }

    .tambah:hover{
      color: #222222;
      background: #eeeeee;
      transition: ease 0.5s;
    }
    </style>
</head>
<body>
    <div class="container">
    <h1>Edit Komik</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" value="<?php echo $kmk["nama"]; ?>"><br><br>
        <label for="genre">Genre : </label>
        <input type="text" name="genre" value="<?php echo $kmk["genre"]; ?>"><br><br>
        <button type="submit" name="tambah" class="tambah">Submit Edit Komik</button>
    </form>
    </div>
</body>
</html>