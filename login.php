<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-50">
        <div class="card" col-lg-6 mx-auto>
            <div class="card-header bg-info">
                <h3 text-white text-center>
                   Login  
                </h3>
            </div>

            <div class="card-body">
                <form action="login.process.php" method="POST">
                <b>Username</b>
                    <input type="text" name="username" class="form-control mb-2"
                    placeholder="Username" required>
                    <b>Password</b>
                    <input type="password" name="password" class="form-control mb-2"
                    placeholder="Password" required>
                    

                    <button type="submit" class="btn btn-success btn-block"
                        name="login">
                            Log in
                        </button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

