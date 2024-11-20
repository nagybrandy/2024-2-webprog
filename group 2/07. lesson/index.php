<?php 
    $r = random_int(0, 255);
    $g = random_int(0, 255);
    $b = random_int(0, 255);
    $rh = dechex($r);
    $gh = dechex($g);
    $bh = dechex($b);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:<?= "#". $rh . $gh . $bh ?>">
    <?php
    $name = "Bendi";

    function fact($num)
    {
        if ($num == 0)
            return 1;
        return $num * fact($num - 1);
    }
    echo fact(5)
        ?>

    <h1><?= "Hello " . $name . "!" // <?= -> <?php echo ?></h1>
    <?= date("D M j G:i:s T Y") ?>

    <!--  NOT A GOOD SOLUTION!!! Because HTML AND PHP ARE MIXED    
  <?php
  $size = 5;
  for ($i = 0; $i < 5; $i++) {
      $newsize = $size * ($i + 3);
      echo "<h3 style='font-size:{$newsize}px'>Hello World!</h3>";
  }
  ?> 
-->

    <?php for ($i = 1; $i <= 5; $i++): ?>
        <h3 style="font-size:<?= $i * 5 ?>px">Hello World!</h3>
    <?php endfor; ?>

    <?php
        $hobbies = ['guitar', 'soccer', 'swimming', 'horse riding'];
        $h2 = array('guitar', 'soccer', 'swimming', 'horse riding');
        $movies = [
            5 => "Comedy",
            6 => "Horror",
            8 => "Drama"   
        ]
    ?>

    <ul>
        <?php foreach ($hobbies as $hobby): ?>
            <li><?= $hobby ?></li>
        <?php endforeach; ?>
    </ul>

    <ul>
        <?php foreach ($movies as $key => $value): ?>
            <li><?= $key . " - " . $value ?></li>
        <?php endforeach; ?>
    </ul>

    <select>
        <?php foreach ($movies as $key => $value): ?>
            <option value=<?=$key ?>><?= $value ?></option>
        <?php endforeach; ?>
    </select>
</body>

</html>