<?php 
require_once "../../config/connection.php";
$id = $_GET['id'];
$sql = $conn->query("DELETE FROM user WHERE id ='$id'");
if ($sql) {
	# code...
?>
<script type="text/javascript">alert('DAta Berhasil Diapus'); window.location.href="../../admin/pengguna/pengguna.php";</script>
<?php } ?>