 <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">Data Nilai</a>
            </div>
        </div>
    </nav>

    <!-- #Top Bar -->
   <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                
               <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                    <div class="email">Anda login sebagai <?php echo $_SESSION['jabatan'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <?php include "mahasiswa/navigasi.php";?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                Data Soal
                                            </h2>
                                            
                                        </div>
                                        <div class="body"><table border="1">
		<tbody>
			<?php
                // $no = 0;
                // $sql = $conn->query("SELECT * FROM soal");
                // while ($data=$sql->fetch_assoc()){
                    
                // // include "koneksi.php";
                $conn = new mysqli("localhost", "root", "", "to");  
				$sql = "SELECT * FROM soal  ORDER BY RAND ()";
				$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
				$jumlah = mysqli_num_rows($query);
				$no = 0;
				while($data = mysqli_fetch_array($query)){?>
					<form action="kunci.php" method="post">
						<input type="text" name="id[]" value="<?php echo $data['id_soal']; ?>">
						<input type="text" name="jumlah" value="<?php echo $jumlah; ?>">
					
						<tr>
							<td><?php echo $no = $no+1; ?></td>
							<td><?php echo $data['soal'];?></td>
						</tr>
 
						<?php
							if(!empty($data['foto'])){
								echo "<tr><td></td><td><img src='images/$data[foto]' width='200' height='200'></td></tr>";
							}
						?>
 
						<tr>
							<td></td>
							<td>A. <input name="pilihan[<?php echo $data['id']?>]" type="radio" value="A"><?php echo $data['a'];?></td>
						</tr>
						<tr>
							<td></td>
							<td>B. <input name="pilihan[<?php echo $data['id']?>]" type="radio" value="B"><?php echo $data['b'];?></td>
						</tr>
						<tr>
							<td></td>
							<td>C. <input name="pilihan[<?php echo $data['id']?>]" type="radio" value="C"><?php echo $data['c'];?></td>
						</tr>
						<tr>
							<td></td>
							<td>D. <input name="pilihan[<?php echo $data['id']?>]" type="radio" value="D"><?php echo $data['d'];?></td>
						</tr>
 
						
 
				<?php }
			?>
 
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')">
					</td>
				</tr>
 
			</form>
 
 
		</tbody>
	</table>
                                                </div>
    </section>
