<br><br>
<h2 style="text-align: center;">Pregled zadatih vežbi za rehabilitaciju</h2>
<p style="text-align: center;">Ovde možete pregledati svoje vežbe za rehabilitaciju</p>
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
							<th>Naziv vežbe</th>
            				<th>Uputstvo</th>
							<th>Opis vežbe</th>
							<th>Rok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($terapije as $c){ ?>
							<tr>
								<td><?php echo $c->VEZBANAZIV; ?></td>
								<td><?php echo $c->UPUTSTVO; ?></td>
								<td><?php echo $c->VEZBAOPIS; ?></td>
								<td><?php echo $c->TERAPIJADATUM; ?></td>
							</tr>
						<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>