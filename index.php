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
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
    <div class="container">
        <form action="login.php" method="POST" class="login-username">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="username" name="username" autocomplete="off" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="password" name="password" autocomplete="off" required>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">LogIn</button>
            </div>
        </form>
    </div>
</body>



</html>