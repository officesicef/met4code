<table border="1" width="100%">
    <tr>
		<th>ROLEID</th>
		<th>ROLENAZIV</th>
		<th>Actions</th>
    </tr>
	<?php foreach($role as $R){ ?>
    <tr>
		<td><?php echo $R['ROLEID']; ?></td>
		<td><?php echo $R['ROLENAZIV']; ?></td>
		<td>
            <a href="<?php echo site_url('role/edit/'.$R['ROLEID']); ?>">Edit</a> | 
            <a href="<?php echo site_url('role/remove/'.$R['ROLEID']); ?>">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
