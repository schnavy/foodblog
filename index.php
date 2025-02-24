<?php
require_once 'Parsedown.php';

$parsedown = new Parsedown();
$readmeContent = file_get_contents('about.md');

$imageDirectory = 'food';
$images = glob($imageDirectory . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Foodblog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="text">
        <?php echo $parsedown->text($readmeContent); ?>
        <br/>
    </div>
    <div>
        <?php foreach ($images as $img): ?>
            <img src="<?php echo $img; ?>" alt="Food Image">
        <?php endforeach; ?>
    </div>
</body>
</html>
