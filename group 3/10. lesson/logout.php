<?php
    session_start();
    session_destroy();
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
    <div class="card bg-base-100 shadow-xl p-8 w-full max-w-md">
        <h1 class="text-3xl font-bold mb-4 text-center">You are logged out.</h1>
        <a href="./index.php" class="btn btn-primary">Back to the main page</a>
    </div>
</body>

</html>