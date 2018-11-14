<br><br>
<h2 style="text-align: center;">Pregled programa rehabilitacije</h2>
<p style="text-align: center;">Ovde možete pregledati svoje programe rehabilitacije</p>
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
							<th>Naziv traume</th>
							<th>Lekar</th>
							<th>Zavrseno</th>
							<th>Vezbe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($programi as $c){ ?>
							<tr>
								<td><?php echo $c->TRAUMANAZIV; ?></td>
								<td><?php echo $c->USERNAME; ?></td>
								<td><?php if($c->ZAVRSENO == 0) { echo "Nije";} else { echo "Jeste";} ?></td>
								<td>
									<a href="<?php echo site_url('Lekarpacijent/vezbe/'.$c->LEKARPACIJENT); ?>">
										<button class="btn btn-info">Pregled zadatih vežbi</button>
									</a>
								</td>
							</tr>
						<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>