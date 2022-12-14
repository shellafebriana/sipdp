<?php 

include 'assets/php/koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: admin/dashboard.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: admin/dashboard.php");
	} else {
		echo "<script>alert('Username atau Password Anda salah. Silahkan coba lagi!')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            height: 410px;
            margin: auto;
            width: 329px;
            min-height: 100vh;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            width: 400px;
            min-height: 400px;
            background: #FFF;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,.3);
            padding: 40px 30px;
        }

        .container .login-text {
            color: #111;
            font-weight: 500;
            font-size: 1.1rem;
            text-align: center;
            margin-bottom: 20px;
            display: block;
            text-transform: capitalize;
        }
        
        .container .login-username .input-group {
            width: 100%;
            height: 50px;
            margin-bottom: 25px;
        }
        
        .container .login-username .input-group input {
            width: 100%;
            height: 100%;
            border: 2px solid #e7e7e7;
            padding: 15px 20px;
            font-size: 1rem;
            border-radius: 30px;
            background: transparent;
            outline: none;
            transition: .3s;
        }
        
        .container .login-username .input-group input:focus, .container .login-username .input-group input:valid {
            border-color: #47B5FF;
        }
        
        .container .login-username .input-group .btn {
            display: block;
            width: 35%;
            padding: 10px 15px;
            text-align: center;
            border: none;
            background: #4e73df;
            outline: none;
            margin: 0 auto;
            border-radius: 30px;
            font-size: 1.2rem;
            color: #FFF;
            cursor: pointer;
            transition: .3s;
        }
        
        .container .login-username .input-group .btn:hover {
            transform: translateY(-5px);
            background: #47B5FF;
        }
    </style>
</head>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
    <div class="container">
        <form action="" method="POST" class="login-username">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>" autocomplete="off" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="password" value="<?php echo $_POST['password']; ?>" autocomplete="off" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">LogIn</button>
            </div>
        </form>
    </div>
</body>
</html>