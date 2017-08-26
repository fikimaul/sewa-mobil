<?php
    session_start();
     if(isset($_SESSION["nama"])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
    <script type="text/javascript" src="asset/js/jquery.js"></script>
    <script src="asset/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/sweetalert/sweetalert.css">
</head>
<body style="background-color: white" ">
<div class="col-md-4 col-md-offset-4" style="background-color:rgba(128, 229, 255,0.9);padding:10px;border-radius:8px; margin-top:15%;">
    <h3 align="center" style="color:white;">LOGIN ADMIN</h3>
    <hr style="border:2px solid #e6f2ff;">
    <form name="login" action="#" method="post">
        <table class="table">
            <tr>
                <td style="border:1px">
             		<input type="text" class="form-control" name="username" placeholder="USERNAME" required>
                </td>
            </tr>
            <tr>
                <td style="border:1px">
                    <input type="password" class="form-control" name="password" placeholder="PASSWORD" required>
                </td>
            </tr>
        </table>
        <div align="center">
       		<input type="submit" value="LOGIN" class="btn btn-primary" name="login">
        </div>
    </form>
</div>
<?php
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

if (isset($_POST["login"])){

	if ($username == 'admin' && $password=='admin')
	{
		session_start();
		$_SESSION["nama"] = $username;
		header("location: index.php");
	}
	else
	{
		echo '<script>swal("Login Gagal!", "Username atau Password Yang Anda Masukan Salah", "error")</script>';
	}
}
?>
</body>
