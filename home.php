<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sign_out'])) 
    {
        setcookie("username", "", time()+(86400 * 2), "/");
        session_unset();
        session_destroy();

        header("Location: index.php");
        exit();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <style>
        .gradient-text {
            background: linear-gradient(to right, #CF414B 0%, #852170 100%);
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body style="background: linear-gradient(to right, #CF414B 0%, #852170 100%);">
    <div class="container-fluid p-0 h-100 d-flex justify-content-center align-items-center">
        <div class="col-auto p-4 bg-white" style="width: 25rem; height: 30rem;">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="d-flex p-0 flex-column">
                <div class="col p-0 d-flex justify-content-center align-items-center">
                    <h1><span class="gradient-text" style="font-family: Matura;">Welcome</span></h1>
                </div>

                <div class="col p-0 d-flex justify-content-center align-items-center">
                    <span> Hello <b> <?php echo $_COOKIE['username'] ?> </b> </span>
                </div>

                <div class="col-auto p-0 d-flex justify-content-center align-items-center" style="height: 15rem;"></div>

                <div class="col-auto p-0 d-flex justify-content-center align-items-center" style="height: 3rem;">

                    <!-- input: "submit" -->
                    <input value="Logout" name="sign_out" type="submit" style="border: none; outline-style: none; border-radius: 0.3rem; background-color: rgb(175, 51, 90); width: 100%; height: 100%; padding-left: 0.6rem; color: white; font-size: 1.3rem;">
                
                </div>
            </form>
        </div>
    </div>
</body>
</html>
