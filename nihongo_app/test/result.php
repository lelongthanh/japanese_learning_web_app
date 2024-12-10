<?php
require "../getcsv_language.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>結果</title>
</head>
<?php if ($thiserror == "") { ?>

    <body onload="getscore()">

        <h1>結果</h1>
        <div id="kotae">
            <span class="score" id="score"></span>
            <span class="score" id="remark"></span>
            <?php
            if ($_POST["question"] != null) {
                $question = $_POST["question"];
                foreach ($question as $i) {
            ?>
                    <div class="kotae_box">
                        <div <?php // echo 'onclick=window.open("../learn/index.php?level=' . $level . '&language=' . $language . '&id=' . $i["id"] . '")'
                                //ここで勉強のページ 
                                ?>>
                            <span>問題：
                                <?php echo '<ruby>' . ucfirst($all_data[$i['id']][1]) . '<rt>' . ucfirst($all_data[$i['id']][2]) . '</rt></ruby>'; ?>
                            </span></br>
                            <span class="<?php if (ucfirst($all_data[$i['id']][7]) == ucfirst($all_data[$i['id']][$i['anser'] + 4])) {
                                                echo 'correct';
                                            } else {
                                                echo 'wrong';
                                            } ?>">
                                <?php
                                echo ucfirst($all_data[$i['id']][$i['anser'] + 4]);
                                ?>
                            </span></br>
                            <span>正答：
                                <?php echo ucfirst($all_data[$i['id']][7]); ?>
                            </span></br>
                        </div>
                    </div>
                <?php
                } ?>

        </div>
    <?php
            } else { ?>
        <h1>あなたは何にも答えない。=(</h1>
    <?php
            }
    ?>

    <div class=" result_button">
        <button onclick="window.history.back()">もう一度やる</button>
        <button onclick='window.location ="../index.php"'>ホームページ</button>
    </div>
    <script src=" result.js"></script>

    </body>
<?php
} else {
?>
    <h1>データがない</h1><br />
    <div class="result_button"><button onclick='window.location ="../index.php"'>ホームページ</button></div>
<?php
}
?>

</html>