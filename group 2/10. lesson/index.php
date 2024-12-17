<?php
session_start();

// Load JSON data
$jsonFile = 'animals.json';
$animals = json_decode(file_get_contents($jsonFile), true);

// Default if the file is empty
if (!$animals) {
    $animals = [];
}

$loggedIn = isset($_SESSION['username']);

?>
<!DOCTYPE html>
<html lang="en" data-theme="forest" class="bg-base-200">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELTE Zoo</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-base-200 p-5 h-svh w-2/3 mx-auto">
    <div class="flex items-center justify-center mb-5">
        <h1 class="text-4xl font-bold text-base-content flex items-center space-x-4">
            <span>Welcome to the Zoo!</span>
            <?php if ($loggedIn): ?>
                <a href="./addAnimal.php" class="btn btn-primary">Add a new animal</a>
                <a href="./logout.php" class="btn btn-outline btn-error btn-primary">Logout</a>

            <?php else: ?>
                <a href="./login.php" class="btn btn-primary w-32">Login</a>
                <a href="./register.php" class="btn btn-secondary w-32">Register</a>
            <?php endif; ?>
        </h1>
    </div>

    <!-- Filters -->
    <form id="filter-form" class="bg-base-100 p-4 rounded-lg shadow-lg mb-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="form-control">
                <input type="text" id="speciesFilter" name="speciesFilter" class="input input-bordered"
                    placeholder="Enter species code">
            </div>
            <div class="form-control">
                <input type="number" id="ageFilter" name="ageFilter" class="input input-bordered"
                    placeholder="Enter age">
            </div>
            <div class="form-control">
                <select id="habitatFilter" name="habitatFilter" class="select select-bordered">
                    <option value="">All Habitats</option>
                    <option value="savannah">Savannah</option>
                    <option value="ocean">Ocean</option>
                    <option value="forest">Forest</option>
                    <option value="antarctica">Antarctica</option>
                </select>
            </div>
            <div class="form-control">
                <button type="button" id="applyFilters" class="btn btn-primary w-full h-full">Apply Filters</button>
            </div>
        </div>
    </form>

    <!-- Animals Grid -->
    <div id="animal-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($animals as $animal): ?>
            <div class="card bg-base-100 shadow-xl relative overflow-hidden">
                <!-- Habitat Background -->
                <img src="<?= $animal['background'] ?>" alt=""
                    class="absolute w-full h-full -z-1 opacity-10 object-cover hover:opacity-20 transition">

                <!-- Animal Details -->
                <div class="flex flex-wrap flex-horizontal w-full items-center p-5 space-x-3">
                    <h2 class="card-title text-base-content"><?= htmlspecialchars($animal['name']) ?></h2>
                    <div class="badge badge-outline badge-primary"><?= htmlspecialchars($animal['species_code']) ?></div>
                    <div class="badge badge-outline <?= $animal['age'] > 5 ? 'badge-error' : 'badge-secondary' ?>">
                        <?= $animal['age'] ?> years old
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        document.querySelector('#applyFilters').addEventListener('click', () => {
            const habitat = document.querySelector('#habitatFilter').value
            fetch("./filterAnimals.php?habitat=" + habitat)
                .then(response => response.json())
                .then(data => {
                    const grid = document.querySelector('#animal-grid')
                    grid.innerHTML = ""
                    data.forEach(e => {
                        const carddiv = `<div class="card bg-base-100 shadow-xl relative overflow-hidden">
                        <!-- Habitat Background -->
                        <img src="${e.background}" alt=""
                            class="absolute w-full h-full -z-1 opacity-10 object-cover hover:opacity-20 transition">

                        <!-- Animal Details -->
                        <div class="flex flex-wrap flex-horizontal w-full items-center p-5 space-x-3">
                            <h2 class="card-title text-base-content">${e.name}</h2>
                            <div class="badge badge-outline badge-primary">${e.species_code}</div>
                            <div class="badge badge-outline">
                                ${e.age} years old
                            </div>
                        </div>
                    </div>`
                    grid.innerHTML +=carddiv
                    });
                    
                })
        })

    </script>
</body>

</html>