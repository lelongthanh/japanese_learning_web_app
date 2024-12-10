<?php
require "../getcsv_language.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
</head>
<?php if ($thiserror == "") { ?>

    <body>
        <?php

        if (isset($_POST["with"]) && isset($_POST["hight"])) {
            //echo  $_POST["with"] . 'x' . $_POST["hight"];
        ?>

            <button id="startbutton" onclick="startgame()">スタート</button>

            <main>
                <div class=" button">
                    <button onclick="window.history.back()">もう一度やって</button>
                    <button onclick='window.location ="../index.php"'>ホームページ</button>
                </div>
                <h2 id="congratulation">
                    <span>★★★★★★★★★★★★★</span></br>
                    <span>★</span>おめでとう全部できた！<span>★</span></br>
                    <span>★★★★★★★★★★★★★</span>
                </h2>
                <table id="game" with="<?php echo $_POST["with"]; ?>" hight="<?php echo $_POST["hight"]; ?>"></table>
            </main>
            <script>
                const all_word = [
                    <?php
                    $count = 1;
                    shuffle($all_data);
                    foreach ($all_data as $sdata) {
                        if ($count > ($_POST["with"] * $_POST["hight"] / 2)) break;
                        if (!empty($sdata)) { ?> {
                                id: <?php echo '"' . ucfirst($sdata[0]) . '"'; ?>,
                                word: <?php echo '"' . ucfirst($sdata[1]) . '"'; ?>,
                                anser: <?php echo '"' . ucfirst($sdata[7]) . '"'; ?>,
                                furi: <?php echo '"' . ucfirst($sdata[2]) . '"'; ?>,
                            },
                    <?php }
                        $count++;
                    }
                    ?>
                ]
            </script>
            <script src="matching_game.js"></script>
        <?php } else { ?>
            <div id="gethw">
                <?php
                $lv=1;
                for ($i = 4; $i <= 6; $i++) {
                    for ($j = 4; $j <= 6; $j++) {
                        if ($j < $i) continue;
                        if (($j * $j) % 2 == 1) continue;
                        echo '<form method="post" action=""><input type="hidden" name="with" value="' . $j . '" /><input type="hidden" name="hight" value="' . $i . '" /><input type="submit" value="レベル ' . $lv . '" /></form>';
                        $lv++;
                    }
                } ?>

            </div>
            <div class=" button">
                <button onclick="window.history.back()">もう一度やる</button>
                <button onclick='window.location ="../index.php"'>ホームページ</button>
            </div>
        <?php } ?>
    </body>
<?php
} else {
?>
    <h1>データがない</h1><br />
<?php
}
?>

</html>