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
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <?php if ($user !== null): ?>
                    <tr>
                        <td><?= $user->getName() ?></td>
                        <td><?= $user->getEmail() ?></td>
                        <td><?= $user->getCity() ?></td>
                        <td><?= $user->getPhone() ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        <?php endif; ?>
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

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color: lightgreen;">
        New User successfully submitted!
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#userForm').on('submit', function(event) {
        event.preventDefault(); 

        $.ajax({
            url: 'create.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                console.log("Response received:", response);

                // Directly use the response object
                var newUser = response;

                $('#userTable tbody').append(
                    '<tr>' +
                    '<td>' + newUser.name + '</td>' +
                    '<td>' + newUser.email + '</td>' +
                    '<td>' + newUser.city + '</td>' +
                    '<td>' + newUser.phone + '</td>' +
                    '</tr>'
                );

                $('#userForm')[0].reset();

                $('#successModal').modal('show');

                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 3000);
            },
            error: function() {
                alert('There was an error processing your request.');
            }
        });
    });

    // Filter by city functionality
    $('#cityFilter').on('keyup', function() {
        var filterValue = $(this).val().toLowerCase();
        $('#userTable tbody tr').filter(function() {
            $(this).toggle($(this).find('td:nth-child(3)').text().toLowerCase().indexOf(filterValue) > -1);
        });
    });
});
</script>