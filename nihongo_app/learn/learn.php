<?php
require "getcsv_language.php";

shuffle($all_data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勉強</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="slider">
        <?php
        // Limit the loop to 10 pages
        $pageLimit = 10;
        $currentPage = 0;

        foreach ($all_data as $sdata) {
            if (!empty($sdata)) {
                $currentPage++;
                if ($currentPage > $pageLimit) {
                    break; // Exit the loop if we've reached the page limit
                } ?>
                <div class="item">
                    <div class="vocab">
                        <h1><?php echo ucfirst($sdata[1]); ?></h1>
                    </div>
                    <div class="list">
                       <strong>フリガナ</strong>:<?php echo ucfirst($sdata[2]); ?><br>
                       <strong>言葉意味</strong>：<?php echo ucfirst($sdata[3]); ?><br>
                       <strong>例文</strong>：<?php echo ucfirst($sdata[8]); ?><br>
                       <strong>例文意味</strong>：<?php echo ucfirst($sdata[9]); ?><br>
                    </div>
                </div>
        <?php }
        }
        ?>
        <button id="next">Next</button>
        <button id="prev">Prev</button>
        <audio id="audioPlayer">
            <source src="sound/mouse-click.mp3" type="audio/mp3">
        </audio>

    </div>
    <div>
        <!-- Button for homeButton -->
        <button id="homeButton"><a href="../index.php">ホーム</button>

    </div>


    <script>
        const questions = [
            <?php
            // Reset the counter for JavaScript array
            $currentPage = 0;
            foreach ($all_data as $sdata) {
                if (!empty($sdata)) {
                    $currentPage++;
                    if ($currentPage > $pageLimit) {
                        break; // Exit the loop if we've reached the page limit
                    }
            ?> {
                        id: <?php echo '"' . ucfirst($sdata[0]) . '"'; ?>,
                        意味: <?php echo '"' . ucfirst($sdata[1]) . '"'; ?>,
                        フリガナ: <?php echo '"' . ucfirst($sdata[2]) . '"'; ?>,
                        言葉意味: <?php echo '"' . ucfirst($sdata[2]) . '"'; ?>,
                        例文: <?php echo '"' . ucfirst($sdata[4]) . '"'; ?>,
                        例文意味: <?php echo '"' . ucfirst($sdata[5]) . '"'; ?>,
                    },
            <?php }
            }
            ?>
        ]
        const audioPlayer = document.getElementById('audioPlayer');

        document.getElementById('next').addEventListener('click', function() {
            playSound();
        });

        document.getElementById('prev').addEventListener('click', function() {
            playSound();
        });

        function playSound() {
            audioPlayer.play();
        }
    </script>


    <script src="app.js"></script>
</body>

</html>