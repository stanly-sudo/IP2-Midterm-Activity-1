<?php
    session_start();
    class signin
    {
        private $username;
        private $password;

        public function __construct($username="", $password="")
        {
            $this->username=$username;
            $this->password=$password;
        }
        public function checkInputData($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        public function redirectUser($setcookie)
        {
            if($setcookie === "remember_for_30_days") 
            {
                setcookie("username", $this->username, time() + (86400 * 30), "/");
                header("Location: home.php");
                exit();
            } 
            else 
            {
                setcookie("username", $this->username, time() + (86400 * 2), "/");
                header("Location: home.php");
                exit();
            } 
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sign_in'])) 
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) 
        {
            $signin = new signin($_POST['username'], $_POST['password']);
    
            $signin->checkInputData($_POST['username']);
            $signin->checkInputData($_POST['password']);
    
            $rememberMe = isset($_POST['remember_for_30_days']) ? true : false;
            $signin->redirectUser($rememberMe);
        } 
        else 
        {
            echo "<script> alert('Field must not be empty.') </script>";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <title>index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <style>
        @media (min-width: 300px){ .BACKGROUND{display: none;} }
        @media (min-width: 900px){ .BACKGROUND{display: flex; width: 30rem; } }
        @media (min-width: 1200px){ .BACKGROUND{display: flex; width: 40rem; } }
    </style>
</head>
<body style="background: linear-gradient(to right, #CF414B 0%, #852170 100%);">
    <div class="container-fluid p-0 h-100 d-flex flex-row">
        <div class="BACKGROUND col-auto"></div>
        <div class="col bg-white p-3">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="h-100">
                <div class="col p-1 d-flex justify-content-center align-items-center"> <span style="font-size: 2rem;"> SIGN IN </span> </div>

                <div class="col p-1 d-flex justify-content-start flex-column">
                    <span style="font-size: 1rem;"> Username </span>
                    <div class="col-auto p-0 d-flex justify-content-start align-items-center" style="border: 1px solid rgb(206, 212, 218); border-radius: 0.3rem; height: 3rem;">
                        
                        <!-- input: "username" -->
                        <input placeholder="Enter your username" type="text" name="username" style="border: none; outline-style: none; border-radius: 0.3rem; width: 100%; padding-left: 0.6rem;">

                    </div>
                </div>

                <div class="col p-1 d-flex justify-content-start flex-column">
                    <span style="font-size: 1rem;"> Password </span>
                    <div class="col-auto p-0 d-flex justify-content-start align-items-center" style="border: 1px solid rgb(206, 212, 218); border-radius: 0.3rem; height: 3rem;">
                        
                        <!-- input: "password" -->
                        <input placeholder="Enter your password" type="password" name="password" style="border: none; outline-style: none; border-radius: 0.3rem; width: 100%; padding-left: 0.6rem;">
                        
                        <div class="col-auto d-flex justify-content-center align-items-center" style="width: 3rem;"> <button type="button" onclick="togglePasswordState()" class="d-flex justify-content-center align-items-center" style="border: none; outline-style: none; background-color: transparent;"> <img id="passIconSrc" src="assets/majesticons--lock (4).png" alt="..." width="20rem" height="20rem"> </button> </div>
                    </div>
                </div>

                <div class="col p-0 d-flex justify-content-start flex-row">
                    <div class="col-auto p-1 d-flex justify-content-start align-items-center" style="gap: 0.6rem;">

                        <!-- input checkbox: remember me... -->
                        <input type="checkbox" name="remember_for_30_days" style="width: 1rem;">
                        <span style="font-size: 1rem;"> Remember me for 30 days. </span>

                    </div>

                    <div class="col"></div>

                    <div class="col-auto p-1 d-flex justify-content-start align-items-center">

                        <!-- directory: forget password -->
                        <span style="font-size: 1rem;"> <a href="forgotpassword.php" style="color: rgb(30, 30, 30);"> forgot password? </a> </span>

                    </div>
                </div>

                <div class="col-auto" style="height: 2rem;"></div>

                <div class="col p-1 d-flex justify-content-start flex-column">

                    <div class="col-auto p-0 d-flex justify-content-start" style="height: 3rem;">
                        
                        <!-- input: "submit" -->
                        <input value="Login" name="sign_in" type="submit" style="border: none; outline-style: none; border-radius: 0.3rem; background-color: rgb(175, 51, 90); width: 100%; height: 100%; padding-left: 0.6rem; color: white; font-size: 1.3rem;">
                        
                    </div>
                </div>

                <div class="col-auto" style="height: 0.4rem;"></div>

                <div class="col p-0 d-flex justify-content-center align-items-center">

                        <!-- directory: forget password -->
                        <span style="font-size: 0.8rem;"> Don't have an account? <a href="signup.php" style="color: rgb(30, 30, 30);"> Sign up here. </a> </span>

                </div>

                <div class="col-auto" style="height: 0.4rem;"></div>

                <div class="col p-0 d-flex justify-content-center align-items-center" style="height: 2rem;"> <span style="font-size: 0.8rem;"> OR </span> </div>

                <div class="col p-0 d-flex justify-content-center align-items-center" style="height: 2rem;"> <span style="font-size: 0.8rem; color: rgb(150, 150, 150);"> Sign in with </span> </div>

                <div class="col-auto p-0 d-flex flex-row justify-content-center align-items-center" style="height: 3rem; gap: 1rem;">
                    <div class="col-auto border d-flex justify-content-center align-items-center" style="border-radius: 5rem; width: 3rem; height: 3rem;">
                       
                        <!-- input: sign in with facebook -->
                        <input name="sign_in_with_facebook" value="facebook" type="image" src="assets//f_logo_RGB-Blue_1024.png" alt="Facebook" width="25rem" height="25rem" style="border-style:none;">
                    
                    </div>
                
                    <div class="col-auto border d-flex justify-content-center align-items-center" style="border-radius: 5rem; width: 3rem; height: 3rem;">
                        
                        <!-- input: sign in with google. -->
                        <input name="sign_in_with_google" value="google" type="image" src="assets/google-icon-1.png" alt="Google" width="25rem" height="25rem" style="border-style:none;">
                    
                    </div>
                
                    <div class="col-auto border d-flex justify-content-center align-items-center" style="border-radius: 5rem; width: 3rem; height: 3rem;">
                        
                        <!-- input: sign in with outlook -->
                        <input name="sign_in_with_outlook" value="outlook" type="image" src="assets/outlook-logo-red-2.png" alt="Outlook" width="25rem" height="25rem" style="border-style:none;">
                    
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>

        let Click = 0;
        function togglePasswordState()
        {
            let password = document.querySelector("input[name='password']");
            let lock = document.getElementById("passIconSrc");
            let Default = "assets/majesticons--lock (4).png";
            let Toggled = "assets/icon-park-solid--unlock (4).png";

            Click += 1;

            if(Click==1)
            {
                lock.src=Toggled;
                password.type="text";
            }
            else if(Click==2)
            {
                lock.src=Default;
                password.type="password";
                Click = 0;
            }
        }

    </script>

</body>
</html>