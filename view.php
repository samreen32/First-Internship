<?php
    require_once('database.php');
    $res = $database->read();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Civil Aviation Form- Read</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
                <th>Title</th>
				<th>First Name</th>
                <th>Last Name</th>
				<th>Gender</th>
				<th>Address</th>
                <th>Address 2</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>About Yourself</th>
				<th>Extras</th>
			</tr>
			<?php 
			    while($r = mysqli_fetch_assoc($res)){
			?>
			<tr>
				<td><?php echo $r['id']; ?></td>
                <td><?php echo $r['title']; ?></td>
				<td><?php echo $r['first_name']; ?></td>
				<td><?php echo $r['last_name']; ?></td>
				<td><?php echo $r['gender']; ?></td>
				<td><?php echo $r['address']; ?></td>
                <td><?php echo $r['address2']; ?></td>
                <td><?php echo $r['city']; ?></td>
                <td><?php echo $r['state']; ?></td>
                <td><?php echo $r['zip']; ?></td>
                <td><?php echo $r['textarea']; ?></td>
				<td><a href="update.php?id=<?php echo $r['id']; ?>">Edit</a> <a href="delete.php?id=<?php echo $r['id']; ?>">Delete</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
</body>
</html>