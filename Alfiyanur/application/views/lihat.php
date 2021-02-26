<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//echo "Halo! Ayo coba var_dump<br>";

$this->load->database();
$db = $this->db;

//Database connection
$host = $db->hostname;
$databasename = $db->database;
$dbuser = $db->username;
$dbpassword = $db->password;
$connection = mysqli_connect($host, $dbuser, $dbpassword, $databasename);
$connection->set_charset("utf8");

//var_dump($db);
//echo "<br>database: " . $db->database;



/*
<p>Order</p>
<p>
1:dok_pribadi<br> 
2:lap_bulanan<br>
3:lap_harian<br>
4:lap_lain<br>
5:lap_tahunan
</p>
*/
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lihat Dokumen</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<script src="<?php echo base_url() ?>assets/js/qrcode.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery-1.12.1.min.js"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		
		<style>
			html{
				font-family: 'Ubuntu', sans-serif;
			}
			
			table{
				border-collapse: collapse;
			}
			
			td{
				padding: 15px;
				border: 1px solid #a3a3a3;
				border-left: 1px solid white;
				border-right: 1px solid white;
				vertical-align: top;
			}
		</style>
	</head>
	<body>
		<?php
		if(isset($_GET["c"]) && isset($_GET["id"])){
			$c = mysqli_real_escape_string($connection, $_GET["c"]);
			$id = mysqli_real_escape_string($connection, $_GET["id"]);
			
			if(isset($_GET["barcode"])){
				$linktogenerate = base_url() . "lihat/?c=".$c."&id=".$id;
				//echo "QR";
				//echo $linktogenerate;
				
				?>
				<div style="margin: 50px; text-align: center;">
					<div id="qrcode" style="display: inline-block;"></div>
				</div>
				<script>
					//Main QR
					var qrcode = new QRCode(document.getElementById("qrcode"), {
						width : 512,
						height : 512
					});

					function gen() {	
						setTimeout(function(){
							qrcode.makeCode("<?php echo $linktogenerate ?>");
						},250)
					}
					
					setTimeout(function(){gen()}, 250);
				</script>
				
				<?php
			}else{
				//echo "viewing...";
				
				$table = "";
				switch($c){
					case "1" :
						$table = "dok_pribadi";
						break;
					case "2" :
						$table = "lap_bulanan";
						break;
					case "3" :
						$table = "lap_harian";
						break;
					case "4" :
						$table = "lap_lain";
						break;
					case "5" :
						$table = "lap_tahunan";
						break;
				}
				
				$sql = "SELECT * FROM $table WHERE unid = '$id'";
				$result = mysqli_query($connection, $sql);
				if($result){
					if(mysqli_num_rows($result) > 0){
						$row = mysqli_fetch_assoc($result);
						?>
						<div style="margin: 50px;">
							<div style="text-align: center">
								<img src="<?php echo base_url() ?>assets/sivd/sivdlogo.png">
							</div>
							<h1 align="center" style="font-size: 20px;">Sistem Informasi Valid Dokumen (SIVD)<br>Notaris Kalimantan Timur</h1>
							
							
							<table id="example1" class="table">
								<tbody>
								<tr><td width="15%">Nama Dokumen</td><td>: <?php echo $row["nama_file"] ?></td></tr> 
								<tr><td>Keterangan</td><td><?php echo $row["keterangan"] ?></td></tr>
								<tr><td>No Surat</td><td>: <?php echo $row["nomor_akta"] ?></td></tr>
								<tr><td>Tanggal Surat</td><td>: <?php echo $row["date_upload"] ?></td></tr>
								<tr><td>Unduh File:</td><td>: <a target="_blank" href="<?php echo base_url() ?>assets/files/<?php echo $table ?>/<?php echo $row["file_upload"] ?>">Klik untuk mengunduh file.</a></td></tr>
								
								<tr><td colspan="2">Dokumen ini adalah Benar dan Tercatat dalam database, untuk memastikan bahwa dokumen tersebut benar, pastikan bahwa URL dalam browser anda adalah <b class="text-danger" style="color: #ed3237;">http://sivd.surgacoding.com</b> dan bentuk fisik dokumen <b class="text-danger" style="color: #ed3237;">sama</b> seperti gambar di bawah ini</td></tr>
								<tr><td colspan="2">
								
								
								<?php
								if(explode(".", $row["file_upload"])[1] == "pdf"){
									?>
									<iframe src="<?php echo base_url() ?>assets/files/<?php echo $table ?>/<?php echo $row["file_upload"] ?>" width="100%" height="500px">
									<?php
								}
								?>


								</td></tr>

								</tbody>
							</table>
							
							
							<!--
							<p>Nama Dokumen: <?php echo $row["nama_file"] ?></p>
							<p>Nomor Akta: <?php echo $row["nomor_akta"] ?></p>
							<p>Tanggal Diunggah: <?php echo $row["date_upload"] ?></p>
							<p>Unduh File: <a target="_blank" href="<?php echo base_url() ?>assets/files/<?php echo $table ?>/<?php echo $row["file_upload"] ?>">Klik untuk mengunduh file.</a></p>
							
							<?php
							if(explode(".", $row["file_upload"])[1] == "pdf"){
								?>
								<iframe src="<?php echo base_url() ?>assets/files/<?php echo $table ?>/<?php echo $row["file_upload"] ?>" width="100%" height="500px">
								<?php
							}
							?>
							-->
						</div>
						<?php
					}
				}
				
			}
			
		}		
		?>
	</body>
</html>