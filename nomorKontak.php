<?php
/*
  Plugin Name: Nomor Kontak
  Plugin URI: https://www.facebook.com/ridwan.hasanah3
  Description: Menamahkan Nomor Kontak pada Footer
  Version: 1.0
  Author: Ridwan Hasanah
  Author URI: https://www.facebook.com/ridwan.hasanah3
*/

function rh_nomor_kontak(){

	$options = get_option("rh-nomor-kontak-fields" ); //get_option() untuk mengambil data
	$nomor_telepon = $options['rh-nomor-kontak-nomortlp'];

	?>
	<div id="kontak-container">
		<div id="kontal-bar">
		<a href="tel:<?php echo $nomor_telepon;?>">
		<?php echo 'Hubungi Kami : '.$nomor_telepon;?>
		</a>
	   </div>
    </div>
<?php
}

add_action('wp_footer','rh_nomor_kontak');

function rh_nomor_kontak_css(){
	?>
	<style type="text/css">
		#kontak-container{
			position: relative;
		}
		#kontal-bar{
			position: fixed;
			bottom: 0;
			z-index: 999;
			width: 100%; 
			background-color: #fff; 
			border-top: 2px solid #f00;
			padding: 2px; 
			text-align: center; 
			font-weight: bold;
		}
	</style>
	<?php
}

add_action('wp_head',"rh_nomor_kontak_css" );

function rh_nomor_kontak_menu(){
	add_menu_page(
		'Nomor Kontak',
		'Nomor Kontak',
		'manage_options',
		'nomor-kontak',
		'rh_nomor_kontak_options'
		 );
}

add_action('admin_menu','rh_nomor_kontak_menu' );

function rh_nomor_kontak_options(){
	echo "<h2>Nomor Kontak</h2>";

	if ($_POST['rh-nomor-kontak-submit']) {
		$options['rh-nomor-kontak-nomortlp'] = $_POST['rh-nomor-kontak-nomortlp'];
		update_option("rh-nomor-kontak-fields",$options); //update_option() fungsi untuk menyimpan inputan
		echo '<div class="updated"><p><srong>Option Saved.</p><strong></div>';

	}

	$options = get_option("rh-nomor-kontak-fields");
	?>
	<form method="post">
		<table class="form-table">
			<tr>
				<td width="100px"><label for="rh-nomor-kontak-nomortlp">Nomor Telp: </label></td>
				<td><input type="text" size="20" id="rh-nomor-kontak-nomortlp" name="rh-nomor-kontak-nomortlp" value="<?php echo $options['rh-nomor-kontak-nomortlp'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" id="rh-nomor-kontak-submit" name="rh-nomor-kontak-submit" class="button" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php
}


?>