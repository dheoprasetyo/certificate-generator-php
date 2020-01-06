<?php 
require_once "../../config/connection.php";
$npm = $_GET['npm'];
$sql = $conn->query("DELETE FROM peserta WHERE npm ='$npm'");
if ($sql) {
	# code...
?>
<script type="text/javascript">alert('DAta Berhasil Diapus'); window.location.href="../../admin/mahasiswa/mahasiswa.php";</script>
<?php } ?>