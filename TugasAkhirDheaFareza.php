<?php
session_start();
if ($_SESSION['level'] == ""){
  header("location:index.php");
  exit;
}elseif ($_SESSION['level'] == "admin") {
  header("location:dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<style type="text/css">
* {margin:0; padding:0;}
nav{
	position: fixed;
	background-color: rgb(10,101,146);
	 width: 100%;
	 height: 50px;
	 font-family: sans-serif;	 
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: rgb(10,101,146);
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;
}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#666;

}

nav ul li:hover a{
 color:#fff;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #fff;
 text-decoration: none;

}
</style>
<body>
	<div class="container">
		<nav>
		<ul>
			<li><a href="dash_kasir.php">Dashboard</a></li>
			<li><a href="transaksi.php">Transaksi</a></li>
			<li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')">Log Out</a></li>
		</ul>
	</nav>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	<center><h1 style="font-family: arial;">Selamat Datang di Dashboard </h1></center>
	</div>
</body>
</html>
<?php
session_start();
if ($_SESSION['level'] == ""){
  header("location:index.php");
  exit;
}elseif ($_SESSION['level'] == "kasir") {
  header("location:dash_kasir.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	
</head>
<!--css navbar-->
<style type="text/css">
* {margin:0; padding:0;}
nav{
	position: fixed;
	background-color: rgb(10,101,146);
	 width: 100%;
	 height: 50px;
	 font-family: sans-serif;	 
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: rgb(10,101,146);
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;
}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#666;

}

nav ul li:hover a{
 color:#fff;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #fff;
 text-decoration: none;

}
</style>
<body>
<div class="container">
	<nav>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="menu.php">Menu</a></li>
			<li><a href="kategori.php">Kategori</a></li>
			<li><a href="user.php">Kelola User</a></li>
			<li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')">Log Out</a></li>
		</ul>
	</nav>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	<center><h1 style="font-family: arial;"> Dhea Fareza </h1></center>
</div>

</body>
</html>
-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 11:41 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`kd_transaksi` int(11)
,`menu` varchar(100)
,`harga` int(11)
,`subtotal` int(11)
,`tgl_transaksi` datetime
,`no_meja` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_user`
-- (See below for the actual view)
--
CREATE TABLE `q_user` (
`kd_user` int(11)
,`nama` varchar(50)
,`no_hp` varchar(15)
,`username` varchar(50)
,`password` varchar(50)
,`level` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kd_kategori` int(11) NOT NULL,
  `kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kd_kategori`, `kategori`) VALUES
(1, 'Makanan Ringan'),
(2, 'Makanan Berat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `kd_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kd_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`kd_menu`, `menu`, `jenis`, `harga`, `status`, `foto`, `kd_kategori`) VALUES
(32, 'Ayam Goreng', 'Makanan', 15000, 'Tersedia', 'a.jpeg', 2),
(44, 'Nasi Goreng', 'Makanan', 10000, 'Tersedia', 'd.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kd_transaksi` int(11) NOT NULL,
  `kd_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `kd_user` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kd_transaksi`, `kd_menu`, `jumlah`, `subtotal`, `tgl_transaksi`, `kd_user`, `no_meja`) VALUES
(1, 13, 2, 20000, '2019-01-08 14:20:11', 18, 1),
(2, 7000, 10, 70000, '2019-01-09 09:17:28', 0, 17),
(2, 13, 10, 70000, '2019-01-09 09:19:19', 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kd_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kd_user`, `nama`, `no_hp`, `username`, `password`, `level`) VALUES
(17, 'Dafa Rizki Fadillah', '0000', 'admin', 'admin', 'admin'),
(18, 'casie', '2', 'dafa', 'sdcs', 'admin'),
(22, 'casie', '2', 'dafa', 'cash', 'kasir');

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS  select `tb_transaksi`.`kd_transaksi` AS `kd_transaksi`,`tb_menu`.`menu` AS `menu`,`tb_menu`.`harga` AS `harga`,`tb_transaksi`.`subtotal` AS `subtotal`,`tb_transaksi`.`tgl_transaksi` AS `tgl_transaksi`,`tb_transaksi`.`no_meja` AS `no_meja` from (`tb_transaksi` join `tb_menu`) where (`tb_transaksi`.`kd_menu` = `tb_menu`.`kd_menu`) ;

-- --------------------------------------------------------

--
-- Structure for view `q_user`
--
DROP TABLE IF EXISTS `q_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_user`  AS  select `tb_user`.`kd_user` AS `kd_user`,`tb_user`.`nama` AS `nama`,`tb_user`.`no_hp` AS `no_hp`,`tb_user`.`username` AS `username`,`tb_user`.`password` AS `password`,`tb_user`.`level` AS `level` from `tb_user` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kd_kategori`),
  ADD KEY `kd_kategori` (`kd_kategori`) USING BTREE;

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`kd_menu`),
  ADD KEY `kd_kategori` (`kd_kategori`) USING BTREE;

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD KEY `kd_user` (`kd_user`) USING BTREE,
  ADD KEY `kd_menu` (`kd_menu`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kd_user`),
  ADD KEY `kd_user` (`kd_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kd_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `kd_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `tb_menu_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `tb_kategori` (`kd_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<?php
session_start();

$conn = mysqli_connect("localhost","root","","db_restoran");
 if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn,"SELECT * FROM tb_user WHERE username ='$username' and password ='$password'");
    $cek = mysqli_num_rows($sql);
  if ($cek > 0){
  $data  = mysqli_fetch_assoc($sql);
  if ($data['level']=="admin") {
    $_SESSION['username']=$username;
    $_SESSION['level']="admin";
    echo "<script>alert('Selamat Datang $username');document.location.href='dashboard.php'</script>";
  }elseif ($data['level'] == 'kasir') {
    $_SESSION['username']=$username;
    $_SESSION['level']="kasir";
    echo "<script>alert('Selamat Datang $username');document.location.href='dash_kasir.php'</script>";
  }
}else{
    echo "<script>alert('Maaf Username/Password Anda Salah');document.location.href='index.php'</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
	
</head>
<!-- Warna rgb(10,101,146); -->
<body>
<div class="box">
	<form method="post">
		<h1>Login</h1>
		<label for="username">Username</label>
		<input type="text" name="username">
		<br>
		<label for="password">Password</label>
		<input type="password" name="password">
		<br>
		<input type="submit" name="login" value="Login" >
		<style type="text/css">
			.box{
            width: 320px;
            height: 420px;
            background-color: rgba(147,147,147);
            color: #000;
            bottom: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%,50%);
            box-sizing: border-box;
            padding: 70px 60px;
        }    
        }
        .h1{
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
            color: black;
            
        }
        .box p{
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        .box input{
            width: 100%;
            margin-bottom: 20px;
        }
        .box input[type="text"],input[type="password"]{
            border: none;
            border-bottom: 1px solid #fff;
            background:transparent;
            outline: none;
            height: 40px;
            color: black;
            font-size: 16;
        }
        .box input[type="submit"]{
            border: none;
            outline: none;
            height: 40px;
            background-color: rgb(10,101,146);
            color: white;
            font-size: 18px;
            border-radius: 15px;
        }
		</style>
	</form>
</div>
</body>
</html>
<?php
session_start();
include 'config/koneksi.php';
if ($_SESSION['level'] == ""){
  header("location:index.php");
  exit;
}elseif ($_SESSION['level'] == "admin") {
  header("location:dashboard.php");
  exit;
}

 if (isset($_POST['simpan'])) {
		$sql = mysqli_query($conn,"INSERT INTO tb_kategori VALUES(null,'$_POST[kategori]')");

		echo "<script>alert('Data Tersimpan');document.location.href='?menu=kategori'</script>";
	}
  $perintah = new oop();
  $table = "tb_kategori";
  $redirect = "?menu=kategori";
  @$where = "kd_kategori = $_GET[id]";
  if(isset($_GET['edit'])){
		$sql = mysqli_query($conn,"SELECT * FROM tb_kategori WHERE kd_kategori = '$_GET[id]'");
		$edit = mysqli_fetch_array($sql);
	}
   if(isset($_GET['hapus'])){
		$sql = mysqli_query($conn,"DELETE FROM tb_kategori WHERE kd_kategori = '$_GET[id]'");

		echo "<script>alert('Data Terhapus');document.location.href='?menu=kategori'</script>";
	}
	if (isset($_POST['updateuser'])) {
		$sql = mysqli_query($conn,"UPDATE tb_kategori SET kd_kategori='$_POST[kd_kategori]',kategori='$_POST[kategori]' WHERE kd_kategori='$_GET[id]'");
		if($sql){

		echo "<script>alert('Data Berhasil Terupdate');document.location.href='kate.php'</script>";
		}else{
			echo printf("Error : %s\n", mysqli_error($conn));
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Kategori</title>
</head>
<style type="text/css">
* {margin:0; padding:0;}
	nav{
	position: fixed;
	background-color: rgb(10,101,146);
	 width: 100%;
	 height: 30px;
	 font-family: sans-serif;	 
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: rgb(10,101,146);
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;

}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#666;

}

nav ul li:hover a{
 color:#fff;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #fff;
 text-decoration: none;

}
input[type=submit] {
      background-color: rgb(10,101,146);
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
	 .col-25 {
      float: left;
      width: 25%;
      margin-top: 20px;
    }

    /*  inputs: 75% width */
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 20px;
    }
    .col-60{
    	float: left;
    	width: 70%;
    	margin-top: 0px;
    }
   
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    table {
      font-family: Arial, Helvetica, sans-serif;
      background-color:grey;
      border: #212121 0,5px solid;
    
        
        }
       table th {
      padding: 10px 40px;
      border-left:0,5px solid black;
      border-bottom: 0,5px solid #000;
      background: #bdbdbd ;
    }
       table th:first-child{  
        border-left:none;  
    }
       table tr {
      text-align: center;
      padding-left: 20px;
    }
        td,th{
            color:black;
        }

</style>
<body>
	<div class="container">
		<nav>
		<ul>
	  <li><a href="dash_kasir.php">Dashboard</a></li>
      <li><a href="trans_kasir.php">Transaksi</a></li>
      <li><a href="main.php">Menu</a></li>
      <li><a href="kate.php">Kategori</a></li>
      <li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')">Log Out</a></li>
		</ul>
	</nav>
	<br><br><br>
	<form method="POST">
		<div class="row">
			<div class="col-25">
				<label for="kt">Kategori</label>
			</div>
			<div class="col-75">
				<input type="text" name="kategori" required style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" id="kt"  value="<?php echo @$edit[1]; ?>" > 
        </div>
    </div>
    <div class="row">
    	<input type="submit" value="Simpan" name="simpan">
    	<input type="submit" name="updateuser" value="Update">
    </div>
    </form>
    <center><table align="center">
      <br>
      <br>
      <tr align="center">
        <th>Kode kategori</th>
        <th>Kategori</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      $sql = "SELECT * FROM tb_kategori";
    if (isset($_POST['cari'])) {
        $sql="SELECT * FROM tb_kategori WHERE kd_kategori LIKE '$_POST[tcari]%' OR kategori LIKE '$_POST[tcari]%'";
      }else{
        $sql="SELECT * FROM tb_kategori";
      }   
      $sql= mysqli_query($conn,"SELECT * FROM tb_kategori");
      while($r=mysqli_fetch_array($sql)){
      ?>
      <tr>
        <td><?php echo $r['kd_kategori'];?></td>
        <td><?php echo $r['kategori'];?></td>
        <td><a onclick="return confirm('Yakin Ingin Menghapus?')" href="kate.php?hapus&id=<?php echo $r['kd_kategori'];?>">HAPUS</a></td>
          <td><a href="kate.php?edit&id=<?php echo $r['kd_kategori'];?>">EDIT</a></td>
      </tr>
      <?php } ?>
    </table></center>
	</div>

</body>
</html>
<?php
session_start();
include 'config/koneksi.php';

if ($_SESSION['level'] == ""){
  header("location:index.php");
  exit;
}elseif ($_SESSION['level'] == "kasir") {
  header("location:dash_kasir.php");
  exit;
}
  if (isset($_POST['simpan'])) {
    $sql = mysqli_query($conn,"INSERT INTO tb_kategori VALUES(null,'$_POST[kategori]')");

    echo "<script>alert('Data Tersimpan');document.location.href='?menu=kategori'</script>";
  }
  $perintah = new oop();
  $table = "tb_kategori";
  $redirect = "?menu=kategori";
  @$where = "kd_kategori = $_GET[id]";
  if(isset($_GET['edit'])){
    $sql = mysqli_query($conn,"SELECT * FROM tb_kategori WHERE kd_kategori = '$_GET[id]'");
    $edit = mysqli_fetch_array($sql);
  }
   if(isset($_GET['hapus'])){
    $sql = mysqli_query($conn,"DELETE FROM tb_kategori WHERE kd_kategori = '$_GET[id]'");

    echo "<script>alert('Data Terhapus');document.location.href='?menu=kategori'</script>";
  }
 if (isset($_POST['updateuser'])) {
    $sql = mysqli_query($conn,"UPDATE tb_kategori SET kd_kategori='$_POST[kd_kategori]',kategori='$_POST[kategori]' WHERE kd_kategori='$_GET[id]'");
    if($sql){

    echo "<script>alert('Data Berhasil Terupdate');document.location.href='kategori.php'</script>";
    }else{
      echo printf("Error : %s\n", mysqli_error($conn));
      exit();
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Kategori</title>
</head>
<style type="text/css">
* {margin:0; padding:0;}
	nav{
	position: fixed;
	background-color: rgb(10,101,146);
	 width: 100%;
	 height: 30px;
	 font-family: sans-serif;	 
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: rgb(10,101,146);
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;

}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#666;

}

nav ul li:hover a{
 color:#fff;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #fff;
 text-decoration: none;

}
input[type=submit] {
      background-color: rgb(10,101,146);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
	 .col-25 {
      float: left;
      width: 25%;
      margin-top: 20px;
    }

    /*  inputs: 75% width */
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 20px;
    }
    .col-60{
    	float: left;
    	width: 70%;
    	margin-top: 0px;
    }
   
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    table {
      font-family: Arial, Helvetica, sans-serif;
      background-color:grey;
      border: #212121 0,5px solid;
    
        
        }
       table th {
      padding: 10px 40px;
      border-left:0,5px solid black;
      border-bottom: 0,5px solid #000;
      background: #bdbdbd ;
    }
       table th:first-child{  
        border-left:none;  
    }
       table tr {
      text-align: center;
      padding-left: 20px;
    }
        td,th{
            color:black;
        }

</style>
<body>
	<div class="container">
		<nav>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="kategori.php">Kategori</a></li>
      <li><a href="user.php">Kelola User</a></li>
      <li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')">Log Out</a></li>
		</ul>
	</nav>
	<br><br><br><br><br><br><br>
  <form method="POST">
		<div class="row">
			<div class="col-25">
				<label for="kt">Kategori</label>
			</div>
			<div class="col-75">
				<input type="text" name="kategori" required style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" id="kt" value="<?php echo @$edit[1]; ?>"> 
        </div>
    </div>
    <br>
    <br>
    <div class="row"><center>
    	<input type="submit" value="Simpan" name="simpan">
      <input type="submit" name="updateuser" value="Update">
    </div></center>
  </form>
    <center><table align="center">
      <br>
      <br>
     <center><table align="center">
      <br>
      <br>
      <tr align="center">
        <th>Kode kategori</th>
        <th>Kategori</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      $sql = "SELECT * FROM tb_kategori";
    if (isset($_POST['cari'])) {
        $sql="SELECT * FROM tb_kategori WHERE kd_kategori LIKE '$_POST[tcari]%' OR kategori LIKE '$_POST[tcari]%'";
      }else{
        $sql="SELECT * FROM tb_kategori";
      }   
      $sql= mysqli_query($conn,"SELECT * FROM tb_kategori");
      while($r=mysqli_fetch_array($sql)){
      ?>
      <tr>
        <td><?php echo $r['kd_kategori'];?></td>
        <td><?php echo $r['kategori'];?></td>
        <td><a onclick="return confirm('Yakin Ingin Menghapus?')" href="kategori.php?hapus&id=<?php echo $r['kd_kategori'];?>">HAPUS</a></td>
          <td><a href="kategori.php?edit&id=<?php echo $r['kd_kategori'];?>">EDIT</a></td>
      </tr>
      <?php } ?>
    </table></center>
	</div>

</body>
</html>
 <?php 
session_start();
$_SESSION =[];
session_unset();
session_destroy();

header("location:index.php");
exit;
  ?>
<?php 

include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
  $tmp = $_FILES['foto']['tmp_name'];
  $folder = "image/";
  $nama_file = $_FILES['foto']['name'];

  move_uploaded_file($tmp,"$folder/$nama_file");
  $a = mysqli_query($conn, "INSERT INTO tb_menu VALUES(null,'$_POST[menu]','$_POST[jenis]','$_POST[harga]','$_POST[status]','$nama_file','$_POST[kategori]')");
  echo "<script>alert('Berhasil Tersimpan');document.location.href='?menu=menu'</script>";
}

if (isset($_GET['hapus'])) {
  $b = mysqli_query($conn,"DELETE FROM tb_menu WHERE kd_menu = '$_GET[id]'");
  echo "<script>alert('Berhasil Dihapus');document.location.href='?menu=menu''</script>";
}

if (isset($_GET['edit'])) {
  $edit = "SELECT * FROM tb_menu WHERE kd_menu = '$_GET[id]'";
  $take = mysqli_query($conn,$edit);
    $ambil = mysqli_fetch_array($take);
}

if(isset($_POST['update'])){
  $tmp = $_FILES['foto']['tmp_name'];
  $folder = "image/";
  $nama_file = $_FILES['foto']['name'];

  move_uploaded_file($tmp,"$folder/$nama_file");
  $c = mysqli_query($conn,"UPDATE tb_menu SET menu = '$_POST[menu]', jenis = '$_POST[jenis]',harga = '$_POST[harga]', status = '$_POST[status]', foto = '$nama_file', kategori = '$_POST[kategori]' WHERE menu = '$_POST[menu]'");
  echo "<script>alert('Berhasil Diubah');document.location.href='?menu=menu''</script>";
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>transaksi</title>
</head>
<style type="text/css">
* {margin:0; padding:0;}
nav{
  position: fixed;
  background-color: rgb(10,101,146);
   width: 100%;
   height: 50px;
   font-family: sans-serif;  
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: rgb(10,101,146);
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;
}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#666;

}

nav ul li:hover a{
 color:#fff;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #fff;
 text-decoration: none;

}
  .button{
    background-color:rgb(10,101,146);
     border:none;
     color: white;
     width: 90px;
     height: 30px;
     border-radius: 10px;
  }
  .button:hover{
    background-color:rgb(10,101,146);
    color: white;
  }
   table tr {
      text-align: center;
      padding-left: 20px;
    }
        td,th{
            color:black;
        }
        table th {
      padding: 10px 40px;
      border-left:0,5px solid black;
      border-bottom: 0,5px solid #000;
      background: #bdbdbd ;
    }
</style>
<body>
  <nav>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="kategori.php">Kategori</a></li>
      <li><a href="user.php">Kelola User</a></li>
      <li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')">Log Out</a></li>
    </ul>
  </nav>
  <br>
  <br><br>
  <center><h1 style="font-family:sans-serif; color:rgba(10,101,146);">Kelola Menu</h1></center>
    <br><br>
    <center><form method="post" enctype="multipart/form-data">
      <table align="center">
        <tr>
          <td>Menu</td>
          <td><input type="text" name="menu" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[1];?>"></td>
        </tr>
        <tr>
          <td>Jenis</td>
          <td><select name="jenis" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
              <option>Makanan</option>
              <option>Minuman</option>
          </select></td>
        </tr>
        <tr>
          <td>Harga</td>
          <td><input type="text" name="harga" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[3];?>"></td>
        </tr>
        <tr>
          <td>Status</td>
          <td><input type="text" name="status" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[4];?>"></td>
        </tr>
        <tr>
          <td>Foto</td>
          <td><input type="file" name="foto" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[5];?>"></td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td>
            <select name="kategori" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
            <?php 
            $i = 0;
            $a = "SELECT * FROM tb_kategori";
            $b = mysqli_query($conn,$a);
            while ($row = mysqli_fetch_array($b)) {
              $i++;
             ?>
            <option value="<?= $row[0];?>"><?= $row[1];?></option>
          <?php } ?>
          </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td><br><input type="submit" name="simpan" value="Simpan" class="button" style="margin-right: 10px"><input type="submit" name="update" value="Update" class="button"></td>
        </tr>
      </table><br>
      <div align="center">
      <td><input type="text" name="tcari" style="margin-left: 40px;margin-right: 10px; margin-top: 30px; width: 400px" placeholder="Cari" value="<?php echo @$_POST['tcari']; ?>" class="cari" ><input type="submit" name="cari" class="button" value="Search"></td>
    </div>
    </form>
    <form method="post">
      <table cellpadding="10" border="1" style="margin-top: 30px;border-collapse: collapse;" align="center">
        <tr>
          <th>Kode Menu</th>
          <th>Menu</th>
          <th>Jenis</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Foto</th>
          <th>Kode Kategori</th>
          <th>Aksi</th>
        </tr>
        <?php
          $sql = "SELECT * FROM tb_menu";
          if (isset($_POST['cari'])) {
              $sql="SELECT * FROM tb_menu WHERE kd_menu LIKE '$_POST[tcari]%' OR menu LIKE '$_POST[tcari]%' OR jenis LIKE '$_POST[tcari]%' OR harga LIKE '$_POST[tcari]%' OR status LIKE '$_POST[tcari]%'";
            }else{
              $sql="SELECT * FROM tb_menu";
            }
          $qry = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($qry)){
          ?>
        <tr>
          <td><?php echo $row[0]; ?></td>
          <td><?php echo $row[1]; ?></td>
          <td><?php echo $row[2]; ?></td>
          <td>Rp.<?= number_format($row[3],2,',','.'); ?></td>
          <td><?php echo $row[4]; ?></td>
          <td><img src="image/<?php echo $row[5];?>" style="width: 90px; height: 50px;"></td>
          <td><?php echo $row[6]; ?></td>
          <td><a href="?menu=menu&edit&id=<?php echo $row[0];?>">Edit</a> | <a href="?menu=menu&hapus&id=<?php echo $row[0];?>">Hapus</a></td>
        </tr>
      <?php } ?>
      </table>
    </form></center>
</body>
</html>
    style:
    body{
            margin: 0;
            padding: 0;
            position: relative;
            background-position: center;
            font-family: sans-serif;
            height: 610px;
            
        }
        .box{
            width: 350px;
            height: 550px;
            background:  transparent;
            color: #fff;
            top: 3%;    
            left: 50%;
            position: absolute;
            transform: translate(-50%,10%);
            box-sizing: border-box;
            padding: 90px 50px;
        }
            
        }
        .h1{
            margin: 0;
            padding: 0 0 18px;
            text-align: center;
            font-size: 20px;
            
        }
        .box p{
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
        }
        .box input{
            width: 100%;
            margin-bottom: 20px;
            color: aliceblue;
        }
        .box input[type="text"],input[type="password"]{
            border: none;
            border-bottom: 1px solid #fff;
            background:transparent;
            outline: none;
            height: 40px;
            color: white;
            font-size: 16;
        }
        
      .box input[type="text"],input[type="password2"]{
            border: none;
            border-bottom: 1px solid #fff;
            background:transparent;
            outline: none;
            height: 40px;
            color: white;
            font-size: 16;
        }
         input[type=text], select, textarea{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }
    input[type=date], select, textarea{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }
    input[type=file], select, textarea{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }
    /* Style the label to display next to the inputs */
    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    /* Style the submit button */
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
    input[type=button] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: center;
    }


    /* Floating column for labels: 25% width */
    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    /* Floating column for inputs: 75% width */
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
</style>

<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
  include 'config/koneksi.php';
if ($_SESSION['level'] == ""){
  header("location:index.php");
  exit;
}elseif ($_SESSION['level'] == "admin") {
  header("location:dashboard.php");
  exit;
}
if(isset($_GET['batal'])){
    $hapus = mysqli_query ($conn,"DELETE FROM tb_transaksi WHERE kd_transaksi = '$_GET[id]'");
}

if (isset($_POST['simpan'])) {
  @$menu = $_POST['menu'];
  $sql2 = mysqli_query($conn,"SELECT * FROM tb_menu WHERE menu ='$menu'");
  $tgl = date('Y-m-d H:i:s');
  @$a = $_POST['subtotal']; 
  $sql = mysqli_query($conn,"INSERT INTO tb_transaksi VALUES ('$_POST[kd_transaksi]','13','$_POST[jumlah]','$a','$tgl','18','$_POST[meja]')");
  if ($sql){
  echo "<script>alert('Pesanan Selesai');document.location.href='trans_kasir.php'</script>";
  }else {
  echo "<script>alert('Pesanan Belum Selelai');document.location.href='trans_kasir.php'</script>";
}
}
if (isset($_GET['hapus'])) {
  $b = mysqli_query($conn,"DELETE FROM tb_transaksi WHERE kd_transaksi = '$_GET[id]'");
  echo "<script>alert('Berhasil Dihapus');document.location.href='trans_kasir.php'</script>";
}

$kembali="";
if (isset($_POST['tbayar'])) {
  $kembali = $_POST['kembali'];
  $total = $_POST['total'];
  $bayar = $_POST['bayar'];
  $kembali = $bayar - $total;
  echo "<script>alert('Transaksi Selesai Terima Kasih');</script>";

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Transaksi</title>
</head>
<style type="text/css">
* {margin:0; padding:0;}
nav{
  position: fixed;
  background-color: rgb(10,101,146);
   width: 100%;
   height: 50px;
   font-family: sans-serif;  
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: rgb(10,101,146);
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;
}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#666;

}

nav ul li:hover a{
 color:#fff;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #fff;
 text-decoration: none;

}
input[type=submit] {
      background-color: rgb(10,101,146);
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
   .col-25 {
      float: left;
      width: 25%;
      margin-top: 20px;
    }

    /*  inputs: 75% width */
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 20px;
    }
    .col-60{
      float: left;
      width: 70%;
      margin-top: 0px;
    }
   
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    table {
      font-family: Arial, Helvetica, sans-serif;
      background-color:grey;
      border: #212121 0,5px solid;
    
        
        }
       table th {
      padding: 10px 40px;
      border-left:0,5px solid black;
      border-bottom: 0,5px solid #000;
      background: #bdbdbd ;
    }
       table th:first-child{  
        border-left:none;  
    }
       table tr {
      text-align: center;
      padding-left: 20px;
    }
        td,th{
            color:black;
        }

</style>
<body>
  <nav>
    <ul>
      <li><a href="dash_kasir.php">Dashboard</a></li>
      <li><a href="trans_kasir.php">Transaksi</a></li>
      <li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')">Log Out</a></li>
    </ul>
  </nav>
  <br>
  <br><br>
  <h1 style="font-family:sans-serif; color:rgba(10,101,146);">Form Transaksi</h1>
  <center><form  method="post" name="autoSumForm" style="margin-left: 50px;">
    <div class="row">
      <div class="col-25">
        <label for="js">No. Transaksi</label>
      </div>
      <div class="col-75">
        <input type="text" name="kd_transaksi" id="js" required style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[0]; ?>">
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="barang">Menu</label>
      </div>
      <div class="col-75">
        <td>
          <select name="menu" onchange="price();" id="barang" required style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
            <option disabled selected>--Pilih--</option>
            <?php 
            $a = "SELECT * FROM tb_menu";
            $b = mysqli_query($conn,$a);
            while ($row = mysqli_fetch_array($b)) {
             ?>
              <option value="<?php echo $row[3];?>"><?= $row[1]?></option>
            <?php } ?>
          </select>
        </td>
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="harga">Harga</label>
      </div>
      <div class="col-75">
        <input type="text" name="harga" id="harga" onblur="return hit();" readonly="readonly"style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[2]; ?>">
        </div>
      </div>
       <div class="row">
      <div class="col-25">
        <label for="jumlah">Jumlah</label>
      </div>
      <div class="col-75">
        <input type="text" name="jumlah" id="jumlah" required onblur="return hit();" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[3]; ?>">
        </div>
      </div>
       <div class="row">
      <div class="col-25">
        <label for="w">Subtotal</label>
      </div>
      <div class="col-75">
        <input type="text" name="subtotal" id="w" readonly="readonly" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[0]; ?>">
        </div>
      </div>
      <div class="row">
      <div class="col-25">
        <label for="lvl">Kode User</label>
      </div>
      <div class="col-75">
        <td>
       <select name="user" id="lvl" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;"><option disabled selected>--Pilih--</option>
        <?php 
              $s = mysqli_query($conn, "SELECT * FROM tb_user");
              while ($z = mysqli_fetch_array($s)){
               ?>
              <option value="<?php echo @$_POST['user'] ?>"><?= $z[0];?></option>
              <?php } ?>
        </select>
      </td>
      </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label>No Meja</label>
        </div>
        <div class="col-75">
          <td><select name="meja" required style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
            <option disabled selected>--Pilih--</option>
            <?php 
            
            for ($a = 1; $a <= 100; $a++){
             ?>
            <option><?= $a;?></option>
          <?php } ?>
          </select></td>
        </div>
      </div>
      <br>
    <div class="row">
      <input type="submit" value="Pesan" name="simpan">
      <input type="submit" name="update" value="Update">

    </div>
  </form></center>
 <br>
      <!--<input type="text" name="tcari" placeholder="cari" style=" width: 8%;padding: 2px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
      <input type="submit" name="cari" value="cari">
    </form>-->
    <center><form method="post">
      <table border="1" style="margin-top: 30px;">
        <tr>
          <th>No Transaksi</th>
          <th>Menu</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
          <th>Tgl Transaksi</th>
          <th>No Meja</th>
          <th>Aksi</th>
        </tr>
        <?php 
        @$a = "SELECT * FROM tb_transaksi";
        @$b = mysqli_query(@$conn,$a);
        while (@$c = mysqli_fetch_array($b)) {
         ?>
        <tr>
          <td><?= $c[0]; ?></td>
          <td><?= $c[1]; ?></td>
          <td><?= $c[2]; ?></td>
          <td><?= $c[3]; ?></td>
          <td><?= $c[4]; ?></td>
          <td><?= $c[5]; ?></td>
          <td><a href="trans_kasir.php?batal&id=<?php echo $c[0];?>">Batal</a></td>
        </tr>
      <?php } ?>
      </table><br><br>
      <?php 
      @$a1 = mysqli_query($conn,"SELECT SUM(tb_transaksi.subtotal) FROM tb_transaksi;");
      @$a2 = mysqli_fetch_row($a1);
       ?>
       <div class="row">
       <div class="col-25">
      <p>Total</p>
      </div>
      <div class="col-75"><input  type="text" name="total" value="<?php echo $a2[0]; ?>" style=" width: 60%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
        </div>
      <div class="col-25">
      <p>Bayar</p>
      </div>
      <div class="col-75"><input type="text" name="bayar" style=" width: 60%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
      </div>
      <div class="col-25">
    <h3>Kembali</h3>
    </div>
    <div class="col-75"><input type="text" name="kembali" value="<?= $kembali;?>" style=" width: 60%;padding: 12px;border: 3px solid #ccc;border-radius: 8px;box-sizing: border-box;resize: vertical; font-size: 18px;"></div>
    <input type="submit" name="tbayar" value="Bayar">
    </form></center>
<script type="text/javascript">
  function price(){
    var tes = document.getElementById("barang").value;
       document.getElementById("harga").value = tes;
  }
</script>
<script type="text/javascript">
  function hit(){
    var b1 = parseFloat(document.autoSumForm.harga.value);
    var b2 = parseFloat(document.autoSumForm.jumlah.value);
    document.autoSumForm.subtotal.value = b1 * b2;
  }
</script>
</body>
</html>
<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
  include 'config/koneksi.php';
if(isset($_GET['batal'])){
    $hapus = mysqli_query ($conn,"DELETE FROM tb_transaksi WHERE kd_transaksi = '$_GET[id]'");
}

if (isset($_POST['simpan'])) {
  @$menu = $_POST['menu'];
  $sql2 = mysqli_query($conn,"SELECT * FROM tb_menu WHERE menu ='$menu'");
  $tgl = date('Y-m-d H:i:s');
  @$a = $_POST['subtotal']; 
  $sql = mysqli_query($conn,"INSERT INTO tb_transaksi VALUES ('$_POST[kd_transaksi]','13','$_POST[jumlah]','$a','$tgl','18','$_POST[meja]')");
  if ($sql){
  echo "<script>alert('Pesanan Selesai');document.location.href='transaksi.php'</script>";
  }else {
  echo printf("Error: %s\n", mysqli_error($conn));
  exit();
}
}
if (isset($_GET['hapus'])) {
  $b = mysqli_query($conn,"DELETE FROM tb_transaksi WHERE kd_transaksi = '$_GET[id]'");
  echo "<script>alert('Berhasil Dihapus');document.location.href='transaksi.php'</script>";
}

$kembali="";
if (isset($_POST['tbayar'])) {
  $kembali = $_POST['kembali'];
  $total = $_POST['total'];
  $bayar = $_POST['bayar'];
  $kembali = $bayar - $total;
  echo "<script>alert('Transaksi Selesai Terima Kasih');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
</head>
<style type="text/css">
* {margin:0; padding:0;}
nav{
	position: fixed;
	background-color: rgb(10,101,146);
	 width: 100%;
	 height: 50px;
	 font-family: sans-serif;	 
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: rgb(10,101,146);
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;
}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#666;

}

nav ul li:hover a{
 color:#fff;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #fff;
 text-decoration: none;

}
input[type=submit] {
      background-color: rgb(10,101,146);
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
	 .col-25 {
      float: left;
      width: 25%;
      margin-top: 20px;
    }

    /*  inputs: 75% width */
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 20px;
    }
    .col-60{
    	float: left;
    	width: 70%;
    	margin-top: 0px;
    }
   
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    table {
      font-family: Arial, Helvetica, sans-serif;
      background-color:grey;
      border: #212121 0,5px solid;
    
        
        }
       table th {
      padding: 10px 40px;
      border-left:0,5px solid black;
      border-bottom: 0,5px solid #000;
      background: #bdbdbd ;
    }
       table th:first-child{  
        border-left:none;  
    }
       table tr {
      text-align: center;
      padding-left: 20px;
    }
        td,th{
            color:black;
        }

</style>
<body>
	<nav>
		<ul>
			<li><a href="dash_kasir.php">Dashboard</a></li>
      <li><a href="transaksi.php">Transaksi</a></li>
      <li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')">Log Out</a></li>
		</ul>
	</nav>
	<br>
	<br><br>
	<h1 style="font-family:sans-serif; color:rgba(10,101,146);">Form Transaksi</h1>
	<center><form  method="post" name="autoSumForm" style="margin-left: 50px;">
    <!--<a href="javascript:window.print();" class="btn btn-secondary btn-lg offset-sm-11" role="button" aria-disabled="true">Print</a>
    <br><br><br>-->
    <div class="row">
      <div class="col-25">
        <label for="js">No. Transaksi</label>
      </div>
      <div class="col-75">
        <input type="text" name="kd_transaksi" id="js" required style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[0]; ?>">
        </div>
      </div>
		<div class="row">
      <div class="col-25">
        <label for="barang">Menu</label>
      </div>
      <div class="col-75">
        <td>
          <select name="menu" onchange="price();" id="barang" required style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
            <option disabled selected>--Pilih--</option>
            <?php 
            $a = "SELECT * FROM tb_menu";
            $b = mysqli_query($conn,$a);
            while ($row = mysqli_fetch_array($b)) {
             ?>
              <option value="<?php echo $row[3];?>"><?= $row[1]?></option>
            <?php } ?>
              
          </select>
        </td>
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="harga">Harga</label>
      </div>
      <div class="col-75">
        <input type="text" name="harga" id="harga" onblur="return hit();" readonly style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[2]; ?>">
        </div>
      </div>
       <div class="row">
      <div class="col-25">
        <label for="jumlah">Jumlah</label>
      </div>
      <div class="col-75">
        <input type="text" name="jumlah" id="jumlah" required onblur="return hit();" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[3]; ?>">
        </div>
      </div>
       <div class="row">
      <div class="col-25">
        <label for="w">Subtotal</label>
      </div>
      <div class="col-75">
        <input type="text" name="subtotal" id="w" readonly style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[0]; ?>">
        </div>
      </div>
      <div class="row">
      <div class="col-25">
        <label for="lvl">Kode User</label>
      </div>
      <div class="col-75">
        <td>
       <select name="user" id="lvl" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;"><option disabled selected>--Pilih--</option>
        <?php 
              $s = mysqli_query($conn, "SELECT * FROM tb_user");
              while ($z = mysqli_fetch_array($s)){
               ?>
              <option value="<?php echo @$_POST['user'] ?>"><?= $z[1];?></option>
              <?php } ?>
        </select>
      </td>
      </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label>No Meja</label>
        </div>
        <div class="col-75">
          <td><select name="meja" required style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
            <option disabled selected>--Pilih--</option>
            <?php 
            
            for ($a = 1; $a <= 100; $a++){
             ?>
            <option><?= $a;?></option>
          <?php } ?>
          </select></td>
        </div>
      </div>
      <br>
    <div class="row">
      <input type="submit" value="Pesan" name="simpan">
    </div>
	</form></center>
 <br>
      <!--<input type="text" name="tcari" placeholder="cari" style=" width: 8%;padding: 2px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
      <input type="submit" name="cari" value="cari">
    </form>-->
    <center><form method="post">
      <table border="1" style="margin-top: 30px;">
        <tr>
          <th>No Transaksi</th>
          <th>Menu</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
          <th>Tgl Transaksi</th>
          <th>Kode User</th>
          <th>No Meja</th>
          <th>Aksi</th>
        </tr>
        <?php 
        @$a = "SELECT * FROM tb_transaksi";
        @$b = mysqli_query(@$conn,$a);
        while (@$c = mysqli_fetch_array($b)) {
         ?>
        <tr>
          <td><?= $c[0]; ?></td>
          <td><?= $c[1]; ?></td>
          <td><?= $c[2]; ?></td>
          <td>Rp.<?=number_format($c[3],2,',','.');  ?></td>
          <td><?= $c[4]; ?></td>
          <td><?= $c[5]; ?></td>
          <td><?= $c[6]; ?></td>
          <td><a href="transaksi.php?batal&id=<?php echo $c[0];?>">Batal</a></td>
        </tr>
      <?php } ?>
      </table><br><br>
      <?php 
      @$a1 = mysqli_query($conn,"SELECT SUM(tb_transaksi.subtotal) FROM tb_transaksi");
      @$a2 = mysqli_fetch_row($a1);
       ?>
       <div class="row">
       <div class="col-25">
      <p>Total</p>
      </div>
      <div class="col-75"><input  type="text" name="total" value="<?php echo $a2[0]; ?>" style=" width: 60%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
        </div>
      <div class="col-25">
      <p>Bayar</p>
      </div>
      <div class="col-75"><input type="text" name="bayar" style=" width: 60%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
      </div>
      
      <div class="col-25">
    <h3>Kembali</h3>
    </div>
    <div class="col-75"><input type="text" name="kembali" value="<?= $kembali;?>" style=" width: 60%;padding: 12px;border: 3px solid #ccc;border-radius: 8px;box-sizing: border-box;resize: vertical; font-size: 18px;"></div>
    <input type="submit" name="tbayar" value="Bayar">
    </form></center><br>
    <br>
    <br>
<script type="text/javascript">
  function price(){
    var tes = document.getElementById("barang").value;
       document.getElementById("harga").value = tes;
  }
</script>
<script type="text/javascript">
  function hit(){
    var b1 = parseFloat(document.autoSumForm.harga.value);
    var b2 = parseFloat(document.autoSumForm.jumlah.value);
    document.autoSumForm.subtotal.value = b1 * b2;
  }
</script>
</body>
</html>

<?php
session_start();
include 'config/koneksi.php';

if ($_SESSION['level'] == ""){
  header("location:index.php");
  exit;
}elseif ($_SESSION['level'] == "kasir") {
  header("location:dash_kasir.php");
  exit;
}
if (isset($_POST['simpan'])) {
		$sql = mysqli_query($conn,"INSERT INTO tb_user VALUES(null,'$_POST[nama]','$_POST[nohp]','$_POST[username]','$_POST[password]','$_POST[level]')");

		echo "<script>alert('Data Tersimpan');document.location.href='?menu=user'</script>";
	}
  $perintah = new oop();
  $table = "tb_user";
  $redirect = "?menu=user";
  @$where = "nama = $_GET[id]";


  /*if(isset($_POST['simpan'])) {
  	$nama = $_POST['nama'];
  	$nohp = $_POST['nohp'];
  	$username = $_POST['username'];
  	$password = $_POST['password'];
  	$level = $_POST['level'];

  	$value = "'','$nama','$nohp','$username','$password','$level'";
  	$cek = $perintah->countWhere("username","username",$table,"username",$username);
  	if ($cek['username'] > 0) {
        echo "<script>alert('username tidak boleh sama');document.location.href='user.php'</script>";
      }
      else{
        $perintah->simpan($table,$value,"user.php");
      }
  }*/
  if(isset($_GET['edit'])){
		$sql = mysqli_query($conn,"SELECT * FROM tb_user WHERE kd_user = '$_GET[id]'");
		$edit = mysqli_fetch_array($sql);
	}
	if (isset($_POST['updateuser'])) {
		$sql = mysqli_query($conn,"UPDATE tb_user SET nama='$_POST[nama]',no_hp='$_POST[nohp]', username='$_POST[username]',password='$_POST[password]',level='$_POST[level]' WHERE kd_user='$_GET[id]'");
		if($sql){

		echo "<script>alert('Data Berhasil Terupdate');document.location.href='user.php'</script>";
		}else{
			echo printf("Error : %s\n", mysqli_error($conn));
			exit();
		}
	}
	 if(isset($_GET['hapus'])){
		$sql = mysqli_query($conn,"DELETE FROM tb_user WHERE kd_user = '$_GET[id]'");

		echo "<script>alert('Data Terhapus');document.location.href='?menu=user'</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kelola User</title>
	<style type="text/css">
	* {margin:0; padding:0;}
	nav{
	position: fixed;
	background-color: rgb(10,101,146);
	 width: 100%;
	 height: 30px;
	 font-family: sans-serif;	 
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: rgb(10,101,146);
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;

}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#666;

}

nav ul li:hover a{
 color:#fff;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #fff;
 text-decoration: none;

}
    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    /* Style  button */
    input[type=submit] {
      background-color: rgb(10,101,146);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    
    }
    

    /*  labels: 25% width */
    .col-25 {
      float: left;
      width: 25%;
      margin-top: 20px;
    }

    /*  inputs: 75% width */
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 20px;
    }
   
    .row:after {
      content: "";
      display: table;
      clear: both;
    }


    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
table {
      font-family: Arial, Helvetica, sans-serif;
      background-color:grey;
      border: #212121 0,5px solid;
    
        
        }
       table th {
      padding: 10px 40px;
      border-left:0,5px solid black;
      border-bottom: 0,5px solid #000;
      background: #bdbdbd ;
    }
       table th:first-child{  
        border-left:none;  
    }
       table tr {
      text-align: center;
      padding-left: 20px;
    }
        td,th{
            color:black;
        }

	</style>
</head>
<body>
	<div class="container">
		<nav>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="kategori.php">Kategori</a></li>
      <li><a href="user.php">Kelola User</a></li>
      <li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')">Log Out</a></li>
	</nav>
	<br>
	<br>
	<br><br>
	<h1 style="font-family:sans-serif; color:rgba(10,101,146);">Kelola User</h1>
	  
      
		<center><form  method="post">
    <div class="row">
      <div class="col-25">
        <label for="nama">Nama Lengkap</label>
      </div>
      <div class="col-75">
        <input style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" type="text" id="nama" name="nama" placeholder="Masukan nama.." required value="<?php echo @$edit['nama']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="ry">No HP</label>
      </div>
      <div class="col-75">
        <input style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" type="text" id="ry" name="nohp" placeholder="No HP" required value="<?php echo @$edit['no_hp'];?>">
      </div>
    </div>
       <div class="row">
      <div class="col-25">
        <label for="us">Username</label>
      </div>
      <div class="col-75">
        <input style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" type="text" id="us" name="username" placeholder="Username" required value="<?php echo @$edit['username'];?>">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="pw">Password</label>
      </div>
      <div class="col-75">
        <input style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" type="text" id="pw" name="password" placeholder="Password" required value="<?php echo @$edit['password'];?>">
      </div>
    </div>
       <!--<div class="row">
      <div class="col-25">
        <label for="lvl">Level</label>
      </div>
      <div class="col-75">
        <input type="text" id="lvl" name="level" required>
      </div>
    </div>-->
    <div class="row">
    <div class="col-25">
    <label for="lvl">Level</label>
	</div>
    <div class="col-75">
        <select style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" name="level" id="lvl" value="<?php echo @$edit[5]; ?>">
          <option>admin</option>
          <option>kasir</option>
        </select>
    </div>
  </div>
      <br>
    <div class="row">
      <input type="submit" value="Simpan" name="simpan">
      <input type="submit" name="updateuser" value="Update">
    </div>
    
   </form></center>
        <br>
      <br>
      <form method="post">
      <div class="s" style="float: right;">
      <input type="text" name="tcari" style="width:50%;padding:5px;box-sizing: border-box; resize: vertical; text-align: right;border-radius: 2px;" value="<?php echo @$_POST['tcari']; ?>"class="cari">
      <input type="submit" name="cari" value="Cari" style=" width: 80px; border: 0; background-color: rgb(10,101,146); height: 31px; color: white; border-radius: 4px;" >
    </div>
    </form><br>
    <form>    
      <center><table align="center">
  <br>
  <br>
  <br>
    <tr align="center">
    	<th>Kode User</th>
        <th>Nama</th>
        <th>No HP</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th colspan="2" align="center">Aksi</th>

    </tr>
    <?php 	
    $sql = "SELECT * FROM q_user";
    if (isset($_POST['cari'])) {
        $sql="SELECT * FROM q_user WHERE kd_user LIKE '$_POST[tcari]%' OR nama LIKE '$_POST[tcari]%' OR no_hp LIKE '$_POST[tcari]%' OR username LIKE '$_POST[tcari]%'";
      }else{
        $sql="SELECT * FROM q_user";
      }		
 			$qry= mysqli_query($conn,$sql);
 			while($r=mysqli_fetch_array($qry)){
			?>
<tr>
				<td><?php echo $r['kd_user'];?></td>
				<td><?php echo $r['nama'];?></td>
				<td><?php echo $r['no_hp'];?></td>
				<td><?php echo $r['username'];?></td>
				<td><?php echo $r['password'];?></td>
				<td><?php echo $r['level'];?></td>
				<td><a onclick="return confirm('Yakin Ingin Menghapus?')" href="user.php?hapus&id=<?php echo $r['kd_user'];?>">HAPUS</a></td>
					<td><a href="user.php?edit&id=<?php echo $r['kd_user'];?>">EDIT</a></td>
			</tr>
			<?php } ?>
  </table></center>
  </form>

  <br>
  <br>
    </div>
</body>
</html>
