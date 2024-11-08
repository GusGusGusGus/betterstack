<h1>PHP Test Application</h1>
<div class="form-group">
    <label for="cityFilter" class="control-label">Filter by City:</label>
    <input type="text" id="cityFilter" class="form-control" placeholder="Enter city name">
</div>
<table class="table table-striped" id="userTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>City</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <?foreach($users as $user){?>
        <tr>
            <td><?=$user->getName()?></td>
            <td><?=$user->getEmail()?></td>
            <td><?=$user->getCity()?></td>
            <td><?=$user->getPhone()?></td>
        </tr>
        <?}?>
    </tbody>
</table>

<form id="userForm" class="form-horizontal">
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
        <label for="phone" class="col-sm-2 control-label">Phone:</label>
        <div class="col-sm-10">
            <input name="phone" type="text" class="form-control" id="phone"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Create new row</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#userForm').on('submit', function(event) {
        event.preventDefault(); 

        $.ajax({
            url: 'create.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                var newUser = JSON.parse(response);

                $('#userTable tbody').append(
                    '<tr>' +
                    '<td>' + newUser.name + '</td>' +
                    '<td>' + newUser.email + '</td>' +
                    '<td>' + newUser.city + '</td>' +
                    '<td>' + newUser.phone + '</td>' +
                    '</tr>'
                );

                $('#userForm')[0].reset();
            },
            error: function() {
                alert('There was an error processing your request.');
            }
        });
    });
});
</script>