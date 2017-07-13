<?php
require_once 'db/conection.php';
$userList = null;
if($query = $db->query("SELECT * FROM users_table")){
    if(!$query->num_rows) {
        echo '<div class="alert alert-warning">
             <strong>warning!</strong> No user data available.
             </div>';
    }
}

$canDisplayData = 0;

if(isset($_GET['id'])){
    deleteUser($_GET['id']);
}
else {
$canDisplayData = 1;
}

function deleteUser($id){
    GLOBAL $db;

    if( $query = $db->query("DELETE FROM users_table WHERE id={$id}")){
        header("location:index.php");
        $canDisplayData = 1;
        echo '<div class="alert alert-success">
             <strong>Success!</strong> User deleted succefully!.
             </div>';
    } else {
        header("location:index.php");
        $canDisplayData = 1;
        echo '<div class="alert alert-danger">
             <strong>ERROR!</strong> User doens\'t exist!
             </div>';
    }
unset($_GET['id']);
}
?>

<!DOCTYPE html>
</div>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <meta charset="utf-8">
        <title>user manager</title>
    </head>
    <body>

        <h3 align="center">User Manager v.1.0</h3>


        <div class=""  style="max-width:70%;margin-left:15%;">
            <!-- Add user button -->
                <button onclick="location.href='create_user.php'" type="button" class="btn btn-primary" name="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Add user
                </button>
        </div>

        <div class="panel panel-default" style="max-width:70%;margin-left:15%;">
            <div class="panel-heading">Registered users</div>

            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <th>id</Dth>
                    <th>Name</Dth>
                    <th>Email</Dth>
                    <th>Create date</Dth>
                    <th></th>
                </tr>


<?php
while($canDisplayData && $userData = $query->fetch_object())
{
?>
    <tr>
        <th><?php echo $userData->id; ?></th>
        <th><?php echo $userData->user_name; ?></th>
        <th><?php echo $userData->user_mail; ?></th>
        <th><?php echo $userData->create_date; ?></th>
        <th>
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default" name="Edit">Edit</button>
                <button type="button" class="btn btn-danger" name="Delete" onclick="location.href='index.php?id=<?php echo $userData->id; ?>'">Delete</button>
            </div>
        </th>
    </tr>
<?php
}
 ?>
        </table>
        </div>
    </body>
</html>
