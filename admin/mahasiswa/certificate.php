<?php
    //memanggil connect.php untuk ceck
    require_once "../../config/connection.php";

// if (isset($_POST['certificate'])) {
	$nama = $_POST['namacetak'];
	$nilai = $_POST['nilaicetak'];

	if ($nilai >= 85) {
		$nilai = 'Grade A';
	} else if ($nilai < 85 && $nilai >= 75) {
		$nilai = 'Grade B';
	} else if ($nilai < 75 && $nilai >= 60) {
		$nilai = 'Grade C';
	} else {
		$nilai = 'Grade D';
	}
	
	if (empty($nama)) {
		$gambar = "1.jpg";
	}
		else {
		$gambar = "images.jfif";
	}

	function acak($panjang)
	{
		$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
	  $pos = rand(0, strlen($karakter)-1);
	  $string .= $karakter{$pos};
		}
		return $string;
	}
	//cara memanggilnya
	$hasil_1= acak(5);

	$image = imagecreatefromjpeg($gambar);
	$white = imageColorAllocate($image, 255, 255, 255);
	$black = imageColorAllocate($image, 0, 0, 0);
	// $fontpath = realpath('font/');
	// putenv('GDFONTPATH='.$fontpath);

	$font = "C:/xampp/htdocs/sertifikat/admin/mahasiswa/font/QuinchoScript_PersonalUse.ttf";
	// $font = mb_convert_encoding($font, 'big5', 'utf-8');
	$size = 30;
	// $npm = 'A';
	//definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
	$image_width = imagesx($image);  
	//membuat textbox agar text centered
	$text_box = imagettfbbox($size,10,$font,$nama);
	$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
	$text_height = $text_box[3]-$text_box[1];
	$x = ($image_width/2) - ($text_width/2);
	//generate sertifikat beserta namanya
	imagettftext($image, $size, 0, $x, 200, $black, $font, $nama);

	$text_box = imagettfbbox($size,10,$font,$nilai);
	$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
	$text_height = $text_box[3]-$text_box[1];
	$x = ($image_width/2) - ($text_width/2);
	//generate sertifikat beserta npmnya
	imagettftext($image, $size, 0, $x, 285, $black, $font, $nilai);
	//tampilkan di browser
	header("Content-type:  image/jpeg");
	imagepng($image);
	imagepng($image,"C:/xampp/htdocs/sertifikat/$hasil_1.png");
	// printf('<img src="data:image/png;base64,%s"/>', 
    //             base64_encode(ob_get_clean()));

	imagedestroy($image);
// }
?>
