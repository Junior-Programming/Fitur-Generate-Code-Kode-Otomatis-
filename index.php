<?php  
$koneksi = mysqli_connect("localhost", "root", "", "latihan_generate_code");

// Mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(kode) as kodeTerbesar FROM barang");

$data = mysqli_fetch_assoc($query);

$kodeBarang = $data['kodeTerbesar'];


// Mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);


// Bilangan yang di ambil ini ditambah 1 untuk menentukan nomor urut berikutnya 
$urutan++;


// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
echo $kodeBarang;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Latihan Membuat fitur Generate Code</title>
</head>
<body>

	<h1>Form input Generate Code</h1>

	<form action="" method="post">
		
	</form>
	
</body>
</html>