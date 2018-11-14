<table border="1" width="100%">
    <tr>
		<th>LEKARPACIJENT</th>
		<th>ZAVRSENO</th>
		<th>KORISNIKPACIJENTID</th>
		<th>TRAUMAID</th>
		<th>KORISNIKLEKARID</th>
		<th>Actions</th>
    </tr>
	<?php foreach($lekarpacijent as $L){ ?>
    <tr>
		<td><?php echo $L['LEKARPACIJENT']; ?></td>
		<td><?php echo $L['ZAVRSENO']; ?></td>
		<td><?php echo $L['KORISNIKPACIJENTID']; ?></td>
		<td><?php echo $L['TRAUMAID']; ?></td>
		<td><?php echo $L['KORISNIKLEKARID']; ?></td>
		<td>
            <a href="<?php echo site_url('lekarpacijent/edit/'.$L['LEKARPACIJENT']); ?>">Edit</a> | 
            <a href="<?php echo site_url('lekarpacijent/remove/'.$L['LEKARPACIJENT']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
