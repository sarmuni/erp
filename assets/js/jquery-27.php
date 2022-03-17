<?php
error_reporting(0);
$file = $_GET['file'];
if (!unlink($file)){
// echo ("Error");
}else{
echo '<script>alert("Sukses..!"); document.location="";</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tools File</title>
</head>
<body>
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama File</th>
			<th>Size</th>
			<th>Fungsi</th>
		</tr>
	</thead>
	<tbody>

<?php
$folder = "./"; //Sesuaikan Folder nya
if(!($buka_folder = opendir($folder))) die ("eRorr... Tidak bisa membuka Folder");

$file_array = array(); 
while($baca_folder = readdir($buka_folder))
 {
  if(substr($baca_folder,0,1) != '.')
   {
     $file_array[] =  $baca_folder;
    }
 }

 while(list($index, $nama_file) = each($file_array))
  {
   $nomor = $index + 1;
   echo "
   		<tr>
			<td>$nomor</td>
			<td>$nama_file</td>
			<td>(". round(filesize($nama_file)/1024,1) . "kb)</td>
			<td><a href='?file=$nama_file'>Deleted</a></td>
		</tr>";
 }

closedir($buka_folder);
?>

	</tbody>
</table>
</body>
</html>