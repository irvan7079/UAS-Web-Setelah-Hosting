<?php
require('proses_koneksi.php');
if (!isset($_SESSION['username'])) {
  header("Location: admin_login.php");
}

$result = mysqli_query($conn, "SELECT * FROM komik");

$komik = [];

while ($row = mysqli_fetch_assoc($result)) {
    $komik[] = $row;
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
    <title>Daftar komik</title>
    <style>
        h3{
            padding-top: 50px;
            font-size: 32px;
            margin-bottom: 50px;
        }
        table th {
            text-align: center;
            background-color: #909090;
            color: black;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 50px;
            border: 2px solid black;
        }
        table td, table th {
            border: 1px solid black;
            background-color: #87aa65;
            padding: 6px;
            width: 100px;
        }
        .hapus a {
            text-decoration: none;
        }
        tr td .delete{
            background-color: #FF0000;
            color: white;
            padding: 5px 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        tr td .delete:hover{
            background: black;
            transition: ease 0.5s;
        }
        tr td .edit{
            background-color: #fff700;
            color: black;
            padding: 5px 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        tr td .edit:hover{
            background: white;
            transition: ease 0.5s;
        }
        .search-bar{
            width: 25%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 10px;
            margin-bottom: 15px;
            margin-right: 50%;
            resize: vertical;
            float: right;
        }
        div button[type="submit"]{
            background-color: black;
            color: white;
            margin-top: 10px;
            margin-right: 10px;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        footer {
            margin-top: 90px;
        }
    </style>
</head>
<header>
    <a href="#"><h1><img src="images/ZhongliB.png" width="140px" height="120px"></h1></a>
    <nav>
      <a href="admin_menu.php">Home</a>
      <a href="admin_menu_akun_user.php">Akun User</a>
      <a href="proses_logout.php" class="me">Log Out</a>
    </nav>
  </header>
  <div class="mode">
    <p id="change-mode">Dark Mode</p>
    <img id="icon-mode" src="images/moon.png">
    <input type="checkbox" onclick="lightMode()">
    <br>
  </div>
<body>
    <h3 align="center">Daftar komik</h3>
    <a href="admin_tambah_komik.php" class="tambah_komik">Tambah Komik</a>
    <table border=1px>
        <tr>
            <th>No.</th>
            <th>Sampul</th>
            <th>Nama</th>
            <th>Genre</th>
            <th>Waktu Upload</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; foreach ($komik as $kmk):?>
        <tr>
            <td><?php echo $i ;?></td>
            <td><?php echo"<img src='img/$kmk[sampul]' width='50' height='50'>";?></td>
            <td><?php echo"<a href='dataKomik/$kmk[data_komik]' target='_blank'>$kmk[nama]</a>";?></td>
            <td><?php echo $kmk["genre"] ;?></td>
            <td><?php echo $kmk["waktu_upload"] ;?></td>
            <td><a href="admin_edit_komik.php?id=<?php echo $kmk["id"]; ?>" class="edit">   Edit   </a>
            <a href="proses_hapus_komik.php?id=<?php echo $kmk["id"];?>" onclick = "return confirm('Anda yakin ingin mengahpus data ini ?')" class="delete">   Hapus   </a></td>
        </tr>
        <?php $i++; endforeach;?>
    </table>
    <footer>
    <nav>
      <br>
      <a href="https://youtube.com/channel/UCjRc-gYlqHi1x9fwCMeVEGw">Youtube</a>
      <a href="https://instagram.com/mirvanhakimmm">Instagram</a>
      <a href="https://www.tiktok.com/@muhammad_irvan_hakim?_t=8VzzYA3N1qj&_r=1">TikTok</a>
    </nav>
    <p>&copy Copyright 2022 - by Muhammad Irvan Hakim </p>
  </footer>
  <script src="script.js"></script>
</body>
</html>
</body>
</html>