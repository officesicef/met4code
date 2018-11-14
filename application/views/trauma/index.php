<br><br>
<h2 style="text-align: center;">Pregled svih trauma</h2>
<p style="text-align: center;">Ovde možete pregledati sve traume</p>
<br>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
        <div class="white-box">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                    		<th>ID traume</th>
							<th>Naziv traume</th>
							<th>Opis traume</th>
							<th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($trauma as $T){ ?>
						    <tr>
								<td><?php echo $T['TRAUMAID']; ?></td>
								<td><?php echo $T['TRAUMANAZIV']; ?></td>
								<td><?php echo $T['TRAUMAOPIS']; ?></td>
								<td>
						            <a href="<?php echo site_url('trauma/edit/'.$T['TRAUMAID']); ?>">Izmeni</a> | 
						            <a href="<?php echo site_url('trauma/remove/'.$T['TRAUMAID']); ?>">Ukloni</a>
						        </td>
						    </tr>
						<?php } ?>
                    </tbody>
                </table>
                <a href="<?php echo site_url('trauma/add');?>"><button class="btn btn-info">Dodaj novu traumu</button></a>
            </div>
        </div>
    </div>
</div>