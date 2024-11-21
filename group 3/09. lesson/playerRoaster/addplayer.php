<?php
$errors = []; //error messages
$data = []; //valid data will be saved here

function validate($input, &$errors, &$data)
{
    if (!isset($input['name']) || !strlen(trim($input['name'])) > 0) {
        $errors['name'] = "Enter a name!";
    } else if (strlen(trim($input['name'])) < 4) {
        $errors['name'] = "Enter a name that is at least 4 characters long!";
    } else {
        $data['name'] = $input['name'];
    }

    if (!isset($input['goals2024']) || !strlen(trim($input['goals2024'])) > 0) {
        $errors['goals2024'] = "Enter the number of goals!";
    } else if (!filter_var($input['goals2024'], FILTER_VALIDATE_INT)) {
        $errors['goals2024'] = "The number of goals must be integers!";
    } else {
        $data['goals2024'] = $input['goals2024'];
    }

    if (!isset($input['positions']) || !strlen(trim($input['positions'])) > 0) {
        $errors['positions'] = "Enter the positions!";
    } else if (!preg_match('/^([^,]+)(,\s*[^,]+)*$/', $input['positions'])) {
        $errors['positions'] = "Enter the positions separated with comas!";
    } else {
        $data['positions'] = $input['positions'];
        $data['positions_str'] = $input['positions'];
    }

    if (!isset($input['img'])) {
        $errors['img'] = "Select an image!";
    } else {
        $data['img'] = $input['img'];
    }
    return count($errors) === 0;
}

$is_valid = validate($_POST, $errors, $data);


if ($is_valid) {
    // read the values from the file
    $data_str = file_get_contents(filename: './players.json');
    $players = json_decode($data_str, true);

    // add the new values with the missing fields
    $data['positions'] = explode(',', $data['positions']);
    $data['goals2023'] = 0;

    $players []= $data;

    // we put the data back to the file with the new element
    $json_data = json_encode($players, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('players.json', $json_data);
}


?>
<!DOCTYPE html>
<html lang="en" data-theme="forest">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addplayer</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="header w-full text-3xl bg-neutral p-5 font-bold text-neutral-content text-center ">
        Roaster of Team Webprog
        <a class="btn btn-primary font-bold ml-10 mt-1" href="index.php">Main Page</a>
    </div>
    <div class="flex">
        <form action="addplayer.php" method="post" class="mx-auto mt-3 w-3/12 p-10" novalidate>
            <h1 class="text-3xl  p-5 font-bold">Add a new player</h1>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Name</span>
                </div>
                <input type="text" name="name" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                    value='<?= $data['name'] ?? '' ?>' />
                    <p class="text-red-400 mt-2 mb-5"><?= isset($errors['name']) ?  $errors['name'] : '' ?></p>
            </label>

            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Goals</span>
                </div>
                <input type="number" name="goals2024" placeholder="Type here"
                    class="input input-bordered w-full max-w-xs" value='<?= $data['goals2024'] ?? '' ?>' />
                <p class="text-red-400 mt-2 mb-5"><?= isset($errors['goals2024']) ?  $errors['goals2024'] : '' ?></p>
                </label>

            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Positions</span>
                </div>
                <input type="text" name="positions" placeholder="Type here" class="input input-bordered w-full max-w-xs"
                    value='<?= $data['positions_str'] ?? '' ?>' />
                <div class="label">
                    <span class="label-text-alt">Write down the positions separated with a coma! ','</span>
                </div>
            </label>

            <?php
            $images = ['batorini', 'benke', 'charlaise', 'cher', 'dace', 'kiss']
                ?>
            <select class="select w-full max-w-xs mb-3 select-bordered" name="img">
                <option disabled selected>Select the picture</option>
                <?php foreach ($images as $value): ?>
                    <option value='<?= $value ?>' <?= isset($data['img']) && $data['img'] == $value ? 'selected' : '' ?>><?= ucfirst($value) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Add new player" class="btn btn-primary font-bold">
        </form>

        <div class="results w-6/12  m-auto p-10">
            <?php if (isset($_POST['name'])): ?>
                <?php if (!$is_valid): ?>
                    <div class="errors">
                        <h2 class="text-3xl mb-5 font-bold">Failed addition</h2>
                        <?php foreach ($errors as $error): ?>
                            <div role="alert" class="alert alert-error mb-2">
                                <span><?= $error ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="success">
                        <h2 class="text-3xl mb-2 font-bold">Successful addition</h2>
                        <a class="btn btn-primary font-bold mt-1" href="index.php">Go back to Main Page</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>