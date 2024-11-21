<?php
$data_str = file_get_contents(filename: './players.json');
$players = json_decode($data_str, true);
// var_dump($players);
?>
<!DOCTYPE html>
<html lang="en" data-theme="forest">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-0">
    <div class="header w-full text-3xl bg-neutral p-5 font-bold text-neutral-content text-center ">
        Roaster of Team Webprog
        <a class="btn btn-primary font-bold ml-10 mt-1" href="addplayer.php">Add player</a>
    </div>
    <div
        class="w-[80vw] mx-auto mt-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 max-h-[80vh] overflow-y-scroll ">
        <!-- Beginning of the cards -->
        <?php foreach ($players as $player): ?>
            <div class="card card-side bg-base-300 shadow-xl <?= $player['goals2024'] > $player['goals2023'] ?  'bg-green-900' : 'bg-red-900' ?>">
                <figure class="h-full"><img src="./img/<?= $player['img'] ?>.jpg" class="h-full w-48 object-cover" />
                </figure>
                <div class="card-body mx-auto text-center w-full p-3 my-auto">
                    <h2 class="card-title text-center block"><?= $player['name'] ?></h2>
                    <div class="card-actions mx-auto text-center block">
                        <?php foreach ($player['positions'] as $position): ?>
                            <div class="badge badge-outline"><?= $position ?></div>
                        <?php endforeach; ?>
                        <div class="stat">
                            <div class="stat-title">Goals this season</div>
                            <div class="stat-value"><?= $player['goals2024'] ?></div>
                            <?php if($player['goals2024'] > $player['goals2023']): ?>
                                <div class="stat-desc">
                                    <?= $player['goals2024'] - $player['goals2023'] ?> more than last season
                                </div>
                            <?php elseif ($player['goals2024'] < $player['goals2023']): ?>
                                <div class="stat-desc">Less than last season</div>
                            <?php else: ?>
                                <div class="stat-desc">Same as last season</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>