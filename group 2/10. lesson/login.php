<?php
session_start();
$users = json_decode(file_get_contents("users.json"), true);
$loggedIn = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($users as $user) {
        if ($user['username'] === $_POST['username'] && $user['password'] === $_POST['password']) {
            $loggedIn = true;
            $_SESSION['username'] = $_POST['username'];
        }
    }
}

if (isset($_SESSION['username'])) {
    $loggedIn = true;
}


?>
<!DOCTYPE html>
<html lang="en" data-theme="forest">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Zoo Management</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-base-200 h-screen flex items-center justify-center">
    <?php if (!$loggedIn): ?>
        <div class="card bg-base-100 shadow-xl p-8 w-full max-w-md">
            <h1 class="text-3xl font-bold mb-4 text-center">Login</h1>
            <form action="login.php" method="POST" novalidate>
                <div class="form-control mb-4">
                    <label for="username" class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" name="username" id="username" class="input input-bordered w-full"
                        placeholder="Enter your username" required>
                </div>
                <div class="form-control mb-4">
                    <label for="password" class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" id="password" class="input input-bordered w-full"
                        placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-full">Login</button>
            </form>
            <div class="mt-4 text-center">
                <p class="text-sm">Don't have an account? <a href="register.php" class="text-primary">Register here</a>.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="card bg-base-100 shadow-xl p-8 w-full max-w-md">
            <h1 class="text-3xl font-bold mb-4 text-center">Hello <?= $_SESSION['username'] ?>!</h1>
            <a href="./index.php" class="btn btn-primary">Back to the main page</a>
            <a href="./logout.php" class="btn btn-outline btn-error mt-5 btn-primary">Logout</a>
        </div>
    <?php endif; ?>

</body>

</html>