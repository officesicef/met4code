<br><br>
<h2 style="text-align: center;">Pregled svih vežbi</h2>
<p style="text-align: center;">Ovde možete pregledati sve vežbe</p>
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
                    		<th>ID vežbe</th>
							<th>Naziv vežbe</th>
							<th>Opis vežbe</th>
							<th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($vezba as $V){ ?>
						    <tr>
								<td><?php echo $V['VEZBAID']; ?></td>
								<td><?php echo $V['VEZBANAZIV']; ?></td>
								<td><?php echo $V['VEZBAOPIS']; ?></td>
								<td>
						            <a href="<?php echo site_url('vezba/edit/'.$V['VEZBAID']); ?>">Izmeni</a> | 
						            <a href="<?php echo site_url('vezba/remove/'.$V['VEZBAID']); ?>">Ukloni</a>
						        </td>
						    </tr>
						<?php } ?>
                    </tbody>
                </table>
                <a href="<?php echo site_url('vezba/add');?>"><button class="btn btn-info">Dodaj novu vežbu</button></a>
            </div>
        </div>
    </div>
</div>