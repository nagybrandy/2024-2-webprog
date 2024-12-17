<?php
session_start();

if(!$_SESSION['username']) {
    header("Location: ./login.php");
    exit();
}
// Load existing animals from JSON file
$jsonFile = 'animals.json';
$animals = json_decode(file_get_contents($jsonFile), true);

if (!$animals) {
    $animals = [];
}

// Initialize error and form data arrays
$errors = [];
$data = [];

function validate($input, &$errors, &$data)
{
    // Validate name
    if (!isset($input['name']) || !strlen(trim($input['name'])) > 0) {
        $errors[] = "Enter a name!";
    } elseif (strlen(trim($input['name'])) < 3) {
        $errors[] = "The name field must be at least 3 characters long!";
    } else {
        $data['name'] = trim($input['name']);
    }

    // Validate age
    if (!isset($input['age']) || !strlen(trim($input['age'])) > 0) {
        $errors[] = "Enter the age!";
    } elseif (!filter_var($input['age'], FILTER_VALIDATE_INT)) {
        $errors[] = "The age must be a valid number!";
    } else {
        $data['age'] = (int) $input['age'];
    }

    // Validate species code
    if (!isset($input['speciesCode']) || !strlen(trim($input['speciesCode'])) > 0) {
        $errors[] = "Enter the species code!";
    } elseif (!preg_match('/^[A-Z]{3}\d{3}$/', trim($input['speciesCode']))) {
        $errors[] = "The species code must be in the format of 3 letters followed by 3 numbers (e.g., DOG123).";
    } else {
        $data['speciesCode'] = trim($input['speciesCode']);
    }

    // Validate background selection
    if (!isset($input['background']) || empty($input['background'])) {
        $errors[] = "Select a paddock type!";
    } else {
        $data['background'] = $input['background'];
    }

    return count($errors) === 0; // Return true if no errors, false otherwise
}
$isValid = false;

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    $isValid = validate($_GET, $errors, $data);

    if ($isValid) {
        // Map background to image path
        $backgroundMap = [
            'savannah' => './img/savannah.webp',
            'ocean' => './img/ocean.webp',
            'forest' => './img/forest.webp',
            'antarctica' => './img/antarctica.webp',
        ];

        // Create new animal
        $newAnimal = [
            'name' => $data['name'],
            'species_code' => $data['speciesCode'],
            'age' => (int) $data['age'],
            'background' => $backgroundMap[$data['background']] ?? './img/default.webp',
        ];

        // Add to the animals array
        $animals[] = $newAnimal;

        // Save updated animals to JSON file
        file_put_contents($jsonFile, json_encode($animals, JSON_PRETTY_PRINT));

    }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="forest">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-base-200 p-5 h-full">
    <div class="container mx-auto">
        <div class="flex items-center justify-center mb-5">
            <h1 class="text-4xl font-bold text-base-content flex items-center space-x-4">
                <span>Add a New Animal</span>
                <a href="./index.php" class="btn btn-primary">Back to the main page</a>
            </h1>
        </div>

        <!-- Animal Form -->
        <form action="addAnimal.php" method="GET" class="bg-base-100 shadow-xl p-6 rounded-lg max-w-lg mx-auto"
            novalidate>
            <div class="form-control mb-4">
                <label for="name" class="label">
                    <span class="label-text text-base-content">Animal Name</span>
                </label>
                <input type="text" name="name" id="name" placeholder="Enter animal name"
                    value="<?= $data['name'] ?? '' ?>" class="input input-bordered w-full">
            </div>
            <div class="form-control mb-4">
                <label for="age" class="label">
                    <span class="label-text text-base-content">Age (in years)</span>
                </label>
                <input type="number" name="age" id="age" placeholder="Enter animal age"
                    value="<?= $data['age'] ?? '' ?>" class="input input-bordered w-full">
            </div>
            <div class="form-control mb-4">
                <label for="speciesCode" class="label">
                    <span class="label-text text-base-content">Species Code</span>
                </label>
                <input type="text" name="speciesCode" id="speciesCode" placeholder="Enter species code (e.g., DOG123)"
                    value="<?= $data['speciesCode'] ?? '' ?>" class="input input-bordered w-full">
            </div>
            <div class="form-control mb-4">
                <label for="background" class="label">
                    <span class="label-text text-base-content">Paddock Type</span>
                </label>
                <select name="background" id="background" class="select select-bordered w-full">
                    <option disabled selected>Choose the paddocks type</option>
                    <option value="savannah" <?= isset($data['background']) && $data['background'] === 'savannah' ? 'selected' : '' ?>>Savannah
                    </option>
                    <option value="ocean" <?= isset($data['background']) && $data['background'] === 'ocean' ? 'selected' : '' ?>>Ocean</option>
                    <option value="forest" <?= isset($data['background']) && $data['background'] === 'forest' ? 'selected' : '' ?>>Forest</option>
                    <option value="antarctica" <?= isset($data['background']) && $data['background'] === 'antarctica' ? 'selected' : '' ?>>Antarctica
                    </option>
                </select>
            </div>
            <div class="form-control">
                <button type="submit" class="btn btn-primary w-full">Add Animal</button>
            </div>
            <?php if (isset($_GET['name'])): ?>
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-error shadow-lg max-w-lg mx-auto mb-6">
                        <ul class="list-disc ml-4">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <div id="successMessage">
                        <div class="alert alert-success mt-5 shadow-lg max-w-lg mx-auto mb-6">
                            <div>
                                <span>Animal added successfully!</span>
                            </div>
                            <a href="index.php" class="btn btn-secondary btn-sm">Back to Main Page</a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </form>
        <!-- Error Messages -->

    </div>
</body>

</html>