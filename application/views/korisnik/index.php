<table border="1" width="100%">
    <tr>
		<th>KORISNIKID</th>
		<th>PASSWORD</th>
		<th>ROLEID</th>
		<th>USERNAME</th>
		<th>EMAIL</th>
		<th>Actions</th>
    </tr>
	<?php foreach($korisnik as $K){ ?>
    <tr>
		<td><?php echo $K['KORISNIKID']; ?></td>
		<td><?php echo $K['PASSWORD']; ?></td>
		<td><?php echo $K['ROLEID']; ?></td>
		<td><?php echo $K['USERNAME']; ?></td>
		<td><?php echo $K['EMAIL']; ?></td>
		<td>
            <a href="<?php echo site_url('korisnik/edit/'.$K['KORISNIKID']); ?>">Edit</a> | 
            <a href="<?php echo site_url('korisnik/remove/'.$K['KORISNIKID']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
