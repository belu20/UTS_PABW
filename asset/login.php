<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISGUN</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </head>
    <body>
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo 'Login gagal! username atau password salah!';
            }else if($_GET['pesan'] == "belum_login"){
            echo "<script>alert('LOGIN FAILED You must login to access this page error')</script>";
            }
        }
        ?>
        <div class="container">
		<div class="container-login100" style="background-image: url('bg-01.jpg');">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <form action="auth.php" method="post" onSubmit="return valdasi()" class="box" >
                            <h1>Login</h1>
                            <p class="text-muted"> Please enter your login and password!</p> 
                            <input type="text" name="username" id="username" placeholder="Username"> 
                            <input type="password" name="password" id="password" placeholder="Password">
                            <input type="checkbox" onclick="myFunction()">Tampilkan Password

                            <script>
                                function myFunction() {
                                    var x = document.getElementById("password");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>
                             <input type="submit" name="login" value="Login" href="#">
                             <p><a href="user.php">Kembali</a></p>
                             
                            <!-- <button type="submit" name="login">login</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
