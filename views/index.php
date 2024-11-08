<h1>PHP Test Application</h1>
<div class="form-group">
    <label for="cityFilter" class="control-label">Filter by City:</label>
    <input type="text" id="cityFilter" class="form-control" placeholder="Enter city name">
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
		</tr>
	</thead>
	<tbody>
		<?foreach($users as $user){?>
		<tr>
			<td><?=$user->getName()?></td>
			<td><?=$user->getEmail()?></td>
			<td><?=$user->getCity()?></td>
		</tr>
		<?}?>
	</tbody>
</table>				

<form method="post" action="create.php" class="form-horizontal">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name:</label>
		<div class="col-sm-10">
			<input name="name" type="text" class="form-control" id="name"/>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">E-mail:</label>
		<div class="col-sm-10">
			<input name="email" type="text" class="form-control" id="email"/>
		</div>
	</div>
	<div class="form-group">
		<label for="city" class="col-sm-2 control-label">City:</label>
		<div class="col-sm-10">
			<input name="city" type="text" class="form-control" id="city"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Create new row</button>
		</div>
	</div>
</form>

<script>
document.getElementById('cityFilter').addEventListener('keyup', function() {
    var filter = this.value.toLowerCase();
    var rows = document.querySelectorAll('#userTable tbody tr');

    rows.forEach(function(row) {
        var city = row.cells[2].textContent.toLowerCase();
        if (city.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>