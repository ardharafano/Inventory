<html>
<title>Data Paging</title>
<link href="style.css" rel="stylesheet" type="text/css">
<body>

<?php
$konek = mysqli_connect("localhost","root","","malasngoding_kios");

// Langkah 1. Tentukan batas,cek halaman & posisi data
$batas   = 5;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}

// Langkah 2. Sesuaikan query dengan posisi dan batas
$query  = "SELECT * FROM anggota LIMIT $posisi,$batas";
$tampil = mysqli_query($konek, $query);

echo "<table>
      <tr><th>No</th><th>Nama Barang</th><th>Harga Jual</th><th>Jumlah</th><th>Opsi</th></tr>";

$no = $posisi+1;
while ($data=mysqli_fetch_array($tampil)){
  echo "<tr>
          <td>$nama</td>
          <td>$harga</td>
          <td>$jumlah</td>
        </tr>";
  $no++;
} 
echo "</table>";
// Langkah 3: Hitung total data dan halaman serta link 1,2,3 
$query2     = mysqli_query($konek, "select * from barang");
$jmldata    = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$batas);

echo "<br> Halaman : ";

for($i=1;$i<=$jmlhalaman;$i++)
if ($i != $halaman){
 echo " <a href=\"paging.php?halaman=$i\">$i</a> | ";
}
else{ 
 echo " <b>$i</b> | "; 
}
echo "<p>Total anggota : <b>$jmldata</b> orang</p>";
?>
</body>
</html>

buat juga script CSSnya untuk mempercantik tampilan dari tablenya

script style.css

table { border-collapse: collapse; }
th {
  background-color: #2e6ab1;
  padding-left: 14px;
  padding-right: 8px;
  border: 1px solid #cccccc;
  text-align:left;
  color:#ffffff;
}
td {
  font-size: 11pt; 
  background-color: #F0F0F0;
  padding-left: 8px;
  padding-right: 8px;
  padding-top: 5px;
  padding-bottom: 5px;
  border: 1px solid #cccccc;
}
input,select { font-size: 10pt; }