<h2>Aktualizovat aktualitu</h2>
		<br>
        <form action="upload_aktualne.php" method="post" enctype="multipart/form-data">
            <input type="file" name="aktualne" id="aktualne"><br>
            <input type="submit" value="Odeslat" class="btn tlac" style="width:128px; margin: 30px">
		</form>

	<div class="row">
		<?php $aktuality = Db::queryAll("SELECT * FROM `taf_aktualne` ORDER BY `id` DESC");
		for ($i = 1; $i <= 3; $i++) { ?>
			<div class="col">
				<div class="box">
					<p><strong><?php echo $i; ?>.</strong> <small><?php echo $aktuality[$i - 1]["img"]; ?></small></p>
            		<img src="../img/aktualne/<?php echo $aktuality[$i - 1]["img"]; ?>" class="img-fluid" style="margin-bottom: 15px">
					<p><a href="delete_aktualne.php?img=<?php echo $aktuality[$i - 1]["img"]; ?>">Smazat obrázek</a></p>
				</div>
			</div>
		<?php } ?>
	</div>