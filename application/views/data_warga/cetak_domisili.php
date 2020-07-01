<?php

$id_user = $user['id_user'];

//JOIN KETUA RT dengan KTP
$query_rt = "SELECT *
			  FROM  `tb_ktp` JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
							 JOIN `tb_rt_rw`   ON  `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
			  WHERE`tb_ketuart`.`user_id` = $id_user
			";

$rt = $this->db->query($query_rt)->row();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Cetak Barang</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		.line-title {
			border: 0;
			border-style: unset;
			border-top: 1px solid #000;
		}
	</style>
</head>

<body>
	<img src="assets/img/logo_desa_kita.jpg" style="width: 60px; height:auto; position:absolute;">
	<table style="width: 100%;">
		<tr>
			<td align="center">
				<span style="line-height: 1.6; font-weight:bold;">
					PEMERINTAH KABUPATEN KULON PROGO
					<br>KECAMATAN LENDAH
					<br>DESA BUMIREJO
				</span>
				<hr />
				<b><u>SURAT KETERANGAN DOMISILI</u></b>
			</td>
			<span>
				Yang Bertanda Tangan Dibawah Ini :
				<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama &nbsp;&nbsp; : <?php echo $rt->nama ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan : <?php echo "Ketua RT " . $rt->rt . " Rw " . $rt->rw ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat&nbsp;&nbsp;: <?php echo  $rt->alamat ?>
				<br><br>Menerangkan Bahwa :
				<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $ktp->nama ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat, Tanggal Lahir : <?php echo $ktp->tempatLahir . "," . $ktp->tanggalLahir ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo  $ktp->jenisKelamin ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $ktp->pekerjaan ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $ktp->agama ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status Perkawinan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo  $ktp->statusPerkawinan ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kewarganegaraan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $ktp->kewarganegaraan ?>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo  $ktp->alamat ?>
			</span>
		</tr>

	</table>

	<p>
		<br>Dengan ini menerangkan bahwa orang yang bersangkutab benar tinggal berdomisili di Desa
		Bumirejo Kecamatan Lendah Kabupaten Kulon Progo.

		<br>Demikian surat keterangan domisili ini kami buat sebagaimana perlunya semoga dapat
		digunakan sebagaimana mestinya. Dan kepada yang berkepentingan agar menjadi maklum
	</p>
	<br class="line-title">

</body>

</html>