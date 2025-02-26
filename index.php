<?php
require_once 'Parsedown.php';

$parsedown = new Parsedown();
$readmeContent = file_get_contents('README.md');

$imageDirectory = 'food';
$images = glob($imageDirectory . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

usort($images, function($a, $b) {
    return filemtime($b) - filemtime($a);
});

$latestFile = $images[0]; // The first image after sorting is the latest
$latestTime = filemtime($latestFile);

$lastModifiedDateTime = date('Y-m-d H:i:s', $latestTime);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>F🍋🍋d</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="zitrone.png" type="image/x-icon">
    </head>
    <body>
        <div class="text">
            <?php echo $parsedown->text($readmeContent); ?>
            <br/>
            <i><?php echo "Latest f🍋🍋d added: $lastModifiedDateTime"; ?></i>
            <br/>
            C🍋llected by this <a href="https://davidwahrenburg.de">🥔</a>.
            <br/>
        </div>
        <div class="images">
            <?php foreach ($images as $index => $img): ?>
                <div class="image-item">
                    <p class="index"><?php echo $index + 1; ?></p>
                    <img src="<?php echo $img; ?>" alt="Food Image <?php echo $index + 1; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>