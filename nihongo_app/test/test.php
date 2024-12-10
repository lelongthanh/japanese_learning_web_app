<?php
require "../getcsv_language.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Test</title>
</head>
<?php if ($thiserror == "") { ?>

    <body onload="Quizstart()">
        <div class="timer">
            <div id="timer">60</div>
            <button id="start">初めましょう</button>
        </div>
        <main id="main">
            <div class="quiznumber" id="quiznumber"></div>

            <div class="quiz">
                <div class="quiz-question">
                    <p id="quiz-number"></p>
                    <h1 id="display-question"></h1>
                </div>

                <div class="quiz-options">

                    <span>
                        <input type="radio" id="option-A" name="option" class="radio" value=1 />
                        <label for="option-A" class="option" id="option-A-label"></label>
                    </span>
                    </br>

                    <span>
                        <input type="radio" id="option-B" name="option" class="radio" value=2 />
                        <label for="option-B" class="option" id="option-B-label"></label>
                    </span>
                    </br>

                    <span>
                        <input type="radio" id="option-C" name="option" class="radio" value=3 />
                        <label for="option-C" class="option" id="option-C-label"></label>
                        
                    </span>
                </div><div id="check-mark" style="color: red;"></div>
                <div id="next-button" class="next-button"></div>

            </div>
        </main>
        <form id="anser" action="result.php?level=<?php echo $level; ?>&&language=<?php echo $language; ?>" method="post">
            <input name="language" value="<?php echo $language; ?>">
            <input name="lever" value="<?php echo $level; ?>">
        </form>
        <script>
            const questions = [
                <?php
                foreach ($all_data as $sdata) {
                    if (!empty($sdata)) { ?> {
                            id: <?php echo '"' . ucfirst($sdata[0]) . '"'; ?>,
                            question: <?php echo '"' . ucfirst($sdata[1]) . '"'; ?>,
                            furi: <?php echo '"' . ucfirst($sdata[2]) . '"'; ?>,
                            optionA: <?php echo '"' . ucfirst($sdata[4]) . '"'; ?>,
                            optionB: <?php echo '"' . ucfirst($sdata[5]) . '"'; ?>,
                            optionC: <?php echo '"' . ucfirst($sdata[6]) . '"'; ?>
                        },
                <?php }
                }
                ?>
            ]
        </script>
        <script src="test.js"></script>
    </body>
<?php
} else {
?>
    <h1>データがない</h1><br />
    <div class="next-button"><button onclick='window.location ="../index.php"'>ホームページ</button></div>
<?php
}
?>

</html>