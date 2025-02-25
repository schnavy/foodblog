<?php
require_once 'Parsedown.php';

$parsedown = new Parsedown();
$readmeContent = file_get_contents('README.md');

$imageDirectory = 'food';
$images = glob($imageDirectory . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$latestFile = null;
$latestTime = 0;

foreach ($images as $image) {
    if (filemtime($image) > $latestTime) {
        $latestFile = $image;
        $latestTime = filemtime($image);
    }
}

$lastModifiedDateTime = date('Y-m-d H:i:s', $latestTime);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Davids F🍅🍅dbl🍅g</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="zitrone.png" type="image/x-icon">
    </head>
    <body>
        <div class="text">
            <?php echo $parsedown->text($readmeContent); ?>
            <br/>
            <i><?php echo "Latest f🍋🍋d added: $lastModifiedDateTime"; ?></i>
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
        <div class="text">
            S🍋 far they are n🍋t in a particular 🍋rder, but numbered, in case you want me to c🍋🍋k it again.</br>
            C🍋llected by this <a href="https://davidwahrenburg.de">🥔</a>.
        </div>
    </body>
</html>
