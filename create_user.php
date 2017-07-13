<?php
require_once "db/conection.php";

if(isset($_POST['user_name'], $_POST['user_mail'])){
    $username = mysqli_real_escape_string($db, trim($_POST['user_name']));
    $usermail = mysqli_real_escape_string($db, trim($_POST['user_mail']));

    $query = $db->prepare("INSERT INTO users_table (user_name, user_mail, create_date) VALUES (?,?,?)");//$db->prepare("ISERT INTO users_table (user_name, user_mail, create_date) VALUES (?,?,?)");

    $query->bind_param('sss', $username,$usermail,date("Y-m-d h:i:sa"));

    $query->execute();
    header("location:index.php");
    //echo $username . ' : ' . $usermail;
}

 ?>


 <!DOCTYPE html>
 <html>
     <head>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
         integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


         <meta charset="utf-8">
         <title>Add new user</title>
     </head>
     <body>
         <h3 align="center">Add new user</h3>

         <div class="panel panel-default" style="max-width:40%; margin-left:30%">
                <form class="" action="create_user.php" method="post">

                    <div class="input-group" style="margin:20px">
                        <span class="input-group-addon" id="username">username</span>
                        <input type="text" class="form-control"  name="user_name" id="username">
                    </div>

                    <div class="input-group" style="margin:20px">
                        <span class="input-group-addon" id="user_mail">E-mail    </span>
                        <input type="email" class="form-control"  name="user_mail" id="usermail">
                    </div>

                    <button type="submit" class="btn btn-default" name="button" style="margin:20px">Submit</button>
                </form>
         </div>



     </body>
 </html>
