<!-- import excel ke mysql --> 
<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include 'excelreader/excel_reader2.php';

// upload file xls

//jika tombol import ditekan
if(isset($_POST['submit'])){

$target2 = basename($_FILES['filesertif']['name']);
// $target = $_FILES['filepegawai']['name'];
move_uploaded_file($_FILES['filesertif']['tmp_name'], $target2); 

// // beri permisi agar file xls dapat di baca
// chmod($_FILES['filepegawai']['name'], 0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filesertif']['name'], false);

// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index = 0);

// jumlah default data yang berhasil di import
$berhasil = 0;
	for ($i=2; $i<=$jumlah_baris; $i++)
	{
		// menangkap data dan memasukkan ke variabel sesuai dengan kolomnya masing-masing
		$npk=$data->val($i, 1);
		$nama=$data->val($i, 2);
		$sekolah=$data->val($i, 3);
	
		if($npk != "" && $nama != "" && $sekolah != ""){
			// input data ke database (table pegawai)
			//$q = "INSERT INTO pegawai SET(nama,alamat,telepon) VALUES('$nama','$alamat','$telepon')";
			//$hasil = mysqli_query($conn,$q);
			mysqli_query($conn, "INSERT INTO sertif VALUES('$npk','$nama','$sekolah')");
			$berhasil++;
			}
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filesertif']['name']);
 
// alihkan halaman ke excel.php
header("location:sert.php?berhasil=$berhasil");
?>