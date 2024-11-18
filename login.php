<!-- <?php 
require 'client.php';
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integity Bank Login</title>
    <?php require 'favicon.php';
     ?>
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/primeflex/3.3.1/primeflex.css" integrity="sha512-NWXz12Cy/aQqoOkg0tI4GPhCuPeZh9jIXa3kmrEpA/BsNYKtqZtxVnSavBPnJo6iSbqtK9xYVfrBXydZBxuA0A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>
<body class="">
    <div >
    <form action="./loginverify.php" method="post" class="shadow-4 border-round-xl p-3 w-11 m-auto md:w-8 lg:w-5  text-center md:mt-7 surface-overlay" >
        <div class="">
            <a href="index.php" class="f-bold m-2 fs-1 text-decoration-none">Integrity Trust Bank</a>
            <h3 class="h1 w-100 text-center f-bold fs-1 lh-1">LOGIN</h3>
        </div>
        <div class="mb-3 field">
            <label for="email" class="form-label mb-1 flex align-items-center w-100 ">Email</label>
            <input type="email" name="email" id="email" class="form-control w-100" required>
        </div>
        <div class="mb-3 position-relative field">
            <label for="password" class="form-label w-100 text-center mb-2 flex justify-content-between">Password  <a href="forgotpassword.php">Forgot password</a> </label>
            <div class="flex gap-1 flex-row">
                <input type="password" name="password" id="password" class="form-control w-90 password"><i class="fa-regular fa-eye show p-2 rounded bg-primary cursor-pointer" required></i>
            </div>
        </div>
        <div class="mb-3 w-100 text-center">
            <button type="submit" name="login" class="btn btn-success w-25">Login</button>
        </div>
        <div class="mb-3 text-center">
            <p>Don't have an account <a href="./signup.php">Signup Now</a></p>
        </div>
        <div class="mb-1 text-red-500 text-xl" >
            <p class="text-red-500">
                <?php
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset ($_SESSION['error']);
                }
                ?>
            </p>
        </div>
    </form>
    </div>
    <script src="js/password.js"></script>
</body>
</html>