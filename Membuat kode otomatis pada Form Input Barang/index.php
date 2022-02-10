<?php
	// https://www.malasngoding.com
	// menghubungkan dengan koneksi database
	$koneksi = mysqli_connect("localhost", "root", "", "latihan_generate_code");
 
	// mengambil data barang dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT max(kode) as kodeTerbesar FROM barang");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kodeBarang, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "BRG";
	$kodeBarang = $huruf . sprintf("%03s", $urutan);
	?>

<?php 
// Penginputan data ke Database

if (isset($_POST['submit'])) {

// Tangkap data dari tabel Form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

// Input data ke table 
mysqli_query($koneksi, "INSERT INTO barang VALUES
		('$kode', '$nama', '$jumlah', '$harga')
	") or die(mysqli_error($koneksi));

header("location: index.php");
} 
?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

<h2><a href="https://www.malasngoding.com/membuat-kode-otomatis-dengan-php-dan-mysqli">Kode Otomatis PHP dan MySQLi - www.malasngoding.com</a></h2>
 
	<style>
		body{
			font-family: 'Roboto';
		}
		table {
			border-collapse: collapse;
		}
 
		table, th, td {
			border: 1px solid black;
			padding: 10px;
		}
	</style>
 
	<form method="post" action="">
		<label>Kode Barang</label><br/>

		<!-- 
			Perhatikan pada form input kode barang. pada form input kode barang ini kita bisa langsung menampilkan kode barang pada value nya. dan silahkan tambahkan atribut readonly teman-teman ingin agar kode barang tidak bisa diubah oleh user pada saat penginputan data barang.
		 -->
		<input type="text" name="kode" required="required" value="<?php echo $kodeBarang ?>" readonly>
 
		<br>
 
		<label>Nama Barang</label><br/>
		<input type="text" name="nama" required="required">
		
		<br>
 
		<label>Jumlah</label><br/>
		<input type="number" name="jumlah" required="required">
 
		<br>
 
		<label>Harga</label><br/>
		<input type="number" name="harga" required="required">
 
		<br>
 
		<button type="submit" name="submit">Submit</button>
	</form>
 
	<br>
	<hr>
	<br>
 
	<table border="1">
		<thead>
			<tr>
				<th>Kode</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$barang = mysqli_query($koneksi,"SELECT * FROM barang");
			while($b = mysqli_fetch_array($barang)){
				?>
				<tr>
					<td><?php echo $b['kode']; ?></td>
					<td><?php echo $b['nama_barang']; ?></td>
					<td><?php echo $b['jumlah']; ?></td>
					<td><?php echo "Rp. ".number_format($b['harga'])." ,-"; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>	
	
</body>
</html>