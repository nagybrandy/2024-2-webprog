<?php
$errors = []; //error messages
$data = []; //valid data will be saved here
//svar_dump(isset($_POST['name']));
function validate($input, &$errors, &$data)
{
    if (!isset($input['name']) || !strlen(trim($input['name'])) > 0) {
        $errors[] = "Enter a name!";
    } else if (strlen(trim($input['name'])) < 4) {
        $errors[] = "Enter a name that is at least 4 characters long!";
    } else {
        $data['name'] = $input['name'];
    }

    if (!isset($input['goals2024']) || !strlen(trim($input['goals2024'])) > 0) {
        $errors[] = "Enter the number of goals!";
    } else if (!filter_var($input['goals2024'], FILTER_VALIDATE_INT)) {
        $errors[] = "- The number of goals must be integers!";
    } else {
        $data['goals2024'] = $input['goals2024'];
    }

    if (!isset($input['positions']) || !strlen(trim($input['positions'])) > 0) {
        $errors[] = "Enter the positions!";
    } else if (!preg_match('/^([^,]+)(,\s*[^,]+)*$/', $input['positions'])) {
        $errors[] = "Enter the positions separated with comas!";
    } else {
        $data['positions'] = $input['positions'];
    }

    return count($errors) === 0;
}

$is_valid = validate($_POST, $errors, $data);

if ($is_valid) {
    $json_str = file_get_contents("players.json");
    $json = json_decode($json_str, true);
    $data['positions'] = explode( ",", $data['positions']);
    $data["goals2023"] = 0;
    $data['img'] = $_POST['img'];
    // add the new data
    $json []= $data;
    //var_dump($json);
    
    $encode_json = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents("players.json", $encode_json);
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
                <input type="text" name="name" placeholder="Type here" class="input input-bordered w-full max-w-xs" value=<?= $data['name'] ?? '' ?> />
            </label>

            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Goals</span>
                </div>
                <input type="number" name="goals2024" placeholder="Type here"
                    class="input input-bordered w-full max-w-xs" />
            </label>

            <label class="form-control w-full max-w-xs">
                <div class="label">
                    <span class="label-text">Positions</span>
                </div>
                <input type="text" name="positions" placeholder="Type here"
                    class="input input-bordered w-full max-w-xs" />
                <div class="label">
                    <span class="label-text-alt">Write down the positions separated with a coma! ','</span>
                </div>
            </label>

            <select class="select w-full max-w-xs mb-3 select-bordered" name="img">
                <option disabled selected>Select the picture</option>
                <option value="batorini">Batorini</option>
                <option value="benke">Benke</option>
                <option value="carlaise">Carlaise</option>
                <option value="cher">Cher</option>
                <option value="dace">Dace</option>
                <option value="kiss">Kiss</option>
            </select>
            
            <input type="submit" value="Add new player" class="btn btn-primary font-bold">
        </form>

        <div class="results w-6/12  m-auto p-10">
        
        <?php if(isset($_POST['name'])): ?>
            <?php if(!$is_valid): ?>
                <div class="errors">
                    <h2 class="text-3xl mb-5 font-bold">Failed addition</h2>
                    <?php foreach ($errors as $key => $error): ?>
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