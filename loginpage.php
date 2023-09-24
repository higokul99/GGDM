<?php include 'db_connect.php';




?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #8a30cf;
            padding-top: 200px;
        }
        .login-form {
            width: 400px;
/*            height: 60%;*/
            margin: 0 auto;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
            font-size: 20px;
            font-weight: bold;
            background-color: #8a30cf;

        }

        .btn-primary:hover {
      background-color: #5a2d7d; /* Set the desired hover color */
      border-color: #ed1c42; /* Set the desired hover color for the border */
    }
    </style>
</head>
<body>
    <div class="login-form">
        <form method="post" action="logincheck.php">
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
