<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <?php require 'favicon.php';
    ?>
    <style>
        button{
            background-color: blue !important;
        }
    </style>
</head>

<body>
    <div class="m-auto w-12 mt-6 md:w-8 lg:w-6 surface-overlay shadow-4 p-3">
        <h2 class="text-center">
            Reset Password
        </h2>
        <form action="reset.php" method="post">
            <div class="field">
                <label for="email" class="w-full line-height-4 font-bold text-xl">
                    Email address
                </label>
                <input type="email" name="email" class="w-full  h-3rem border-round-xl border-blue-500 px-4 outline-none appearance-none border-1 focus:text-blue-500" id="email">
            </div>
            <div class="field">
                <label for="password" class="w-full line-height-4 font-bold text-xl">
                    New Password
                </label>
                <input type="password" name="password" class="w-full  h-3rem border-round-xl border-blue-500 px-4 outline-none appearance-none border-1 focus:text-blue-500" id="password">
            </div>
            <div class="field">
                <button type="submit" class="w-full btn-primary h-3rem bg-blue-500 border-round-2xl p-button-primary appearance-none border-1" >Reset</button>
            </div>
        </form>
    </div>
</body>
</html>