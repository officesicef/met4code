<br><br><br><br><br>
<div class="container">
      <div class="row" style="    text-align: center;">
        <div class="col-sm-12">
			<table class="table-responsive" border="1">
			    <tr>
					<th>TERAPIJAID</th>
					<th>LEKARPACIJENT</th>
					<th>VEZBAID</th>
					<th>TERAPIJADATUM</th>
					<th>RADKOMENTAR</th>
					<th>UPUTSTVO</th>
					<th>Actions</th>
			    </tr>
				<?php foreach($terapija as $T){ ?>
			    <tr>
					<td><?php echo $T['TERAPIJAID']; ?></td>
					<td><?php echo $T['LEKARPACIJENT']; ?></td>
					<td><?php echo $T['VEZBAID']; ?></td>
					<td><?php echo $T['TERAPIJADATUM']; ?></td>
					<td><?php echo $T['RADKOMENTAR']; ?></td>
					<td><?php echo $T['UPUTSTVO']; ?></td>
					<td>
			            <a href="<?php echo site_url('terapija/edit/'.$T['TERAPIJAID']); ?>">Edit</a> | 
			            <a href="<?php echo site_url('terapija/remove/'.$T['TERAPIJAID']); ?>">Delete</a>
			        </td>
			    </tr>
				<?php } ?>

			</table>
		</div>
	</div>
</div>