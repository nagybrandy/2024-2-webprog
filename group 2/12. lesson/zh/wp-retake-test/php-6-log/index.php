<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6</title>
    <link rel="stylesheet" href="src/index.css">
    <link rel="stylesheet" href="src/task.css">
</head>

<body>
    <header>
        <h1>6. Napló / Log</h1>
    </header>

    <div id="content">
        <h2>Új bejegyzés / New entry</h2>
        <form action="" method="post" novalidate>
            <div class="input">
                <label for="date">Dátum / Date</label>
                <input type="date" name="date" id="date" placeholder="Teljesítmény neve / Achievement name">
            </div>
            <div class="input">
                <label for="change">Egyenlegváltozás / Balance change</label>
                <input type="number" name="change" id="change" placeholder="Egyenlegváltozás / Balance change">
            </div>
            <div class="input">
                <button type="submit">➕ Save / Mentés</button>
            </div>
        </form>

        <h2>Bejegyzések / Entries</h2>
        <ul>
            <li>Date: 0 Ft <a href="#">Törlés / Delete</a></li>
        </ul>
    </div>
</body>

</html>