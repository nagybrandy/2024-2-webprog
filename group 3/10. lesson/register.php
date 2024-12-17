<?php 
session_start();
$users = json_decode(file_get_contents("users.json"), true);



if(isset($_POST['username'])) {
    $users []= $_POST;
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
    header("Location: ./login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en" data-theme="forest">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Zoo Management</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-base-200 h-screen flex items-center justify-center">
    <div class="card bg-base-100 shadow-xl p-8 w-full max-w-md">
        <h1 class="text-3xl font-bold mb-4 text-center">Register</h1>
        <form action="register.php" method="POST">
            <div class="form-control mb-4">
                <label for="username" class="label">
                    <span class="label-text">Username</span>
                </label>
                <input type="text" name="username" id="username" class="input input-bordered w-full" placeholder="Enter your username" required>
            </div>
            <div class="form-control mb-4">
                <label for="email" class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" id="email" class="input input-bordered w-full" placeholder="Enter your email" required>
            </div>
            <div class="form-control mb-4">
                <label for="password" class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" id="password" class="input input-bordered w-full" placeholder="Create a password" required>
            </div>
            <div class="form-control mb-4">
                <label for="confirm_password" class="label">
                    <span class="label-text">Confirm Password</span>
                </label>
                <input type="password" name="confirm_password" id="confirm_password" class="input input-bordered w-full" placeholder="Confirm your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-full">Register</button>
        </form>
        <div class="mt-4 text-center">
            <p class="text-sm">Already have an account? <a href="login.php" class="text-primary">Login here</a>.</p>
        </div>
    </div>
</body>

</html>
