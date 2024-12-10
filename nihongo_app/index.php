<?php
// Set status awal
$status = isset($_POST['status']) ? $_POST['status'] : 'default';
$prevStatus = isset($_POST['prev_status']) ? $_POST['prev_status'] : 'default';

// Proses ketika tombol N2 atau N3 ditekan
if (isset($_POST['n2_button'])) {
    $prevStatus = $status;
    $status = 'n2';
} elseif (isset($_POST['n3_button'])) {
    $prevStatus = $status;
    $status = 'n3';
}

// Proses ketika tombol negara atau action ditekan
if (isset($_POST['country_button'])) {
    $prevStatus = $status;
    $status = strtolower($_POST['country_button']);
}

//kembali ke n2 dan n3
if (isset($_POST['back_button1'])) {
    $status = 'default';
}

// Proses ketika tombol action ditekan
if (isset($_POST['action_button'])) {
    $action = $_POST['action_button'];
    //echo "Anda memilih aksi: $action";


    // Jika tombol "Tes" ditekan, kembali ke tampilan negara
    if ($action === 'テスト') {
        $prevStatus = $status;
        //$status = 'default';
        $language = isset($_POST['status']) ? $_POST['status'] : 'default';
        $level = isset($_POST['prev_status']) ? $_POST['prev_status'] : 'default';
        header("Location: ../日本語アプリ/test/test.php?level=$level&&language=$language ");
       // echo $level;
        //echo $language;
    }elseif ($action === '勉強') {
        $prevStatus = $status;
        
        $language = isset($_POST['status']) ? $_POST['status'] : 'default';
        $level = isset($_POST['prev_status']) ? $_POST['prev_status'] : 'default';
       header("Location: ../日本語アプリ/learn/learn.php?level=$level&&language=$language ");
       
    }elseif ($action === 'マッチング ゲーム') {
        $prevStatus = $status;
        
        $language = isset($_POST['status']) ? $_POST['status'] : 'default';
        $level = isset($_POST['prev_status']) ? $_POST['prev_status'] : 'default';
       header("Location: ../日本語アプリ/matching_game/matching_game.php?level=$level&&language=$language ");
       
    }
}

// Proses ketika tombol back ditekan
if (isset($_POST['back_button'])) {
    // Kembali ke tampilan sebelumnya
    $temp = $status;
    $status = $prevStatus;
    $prevStatus = $temp;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日本語アプリ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


    <?php
    // Tampilkan konten berdasarkan status
    if (in_array($status, ['n2', 'n3'])) {
        echo' <h1 >国の言語を選んでください</h1>';
        // Konten untuk N2 dan N3
        echo '
            <form method="post" action="">

                <input type="hidden" name="status" value="' . $status . '">
                <input type="hidden" name="prev_status" value="' . $prevStatus . '">
                <input type="submit" name="country_button" value="ベトナム語">
                <input type="submit" name="country_button" value="ネパール語">
                <input type="submit" name="country_button" value="バングラデシュ語">
                <input type="submit" name="country_button" value="インドネシア語">
                <input type="submit" name="back_button1" value="戻る">
            </form>
        ';
    } elseif (in_array($status, ['ベトナム語', 'ネパール語', 'バングラデシュ語', 'インドネシア語'])) {
        // Konten untuk Vietnam, Nepal, Bangladesh, dan Indonesia
        echo'<h1>下のボタンを選んでください</h1>';
        echo '
            <form method="post" action="">
                
                <input type="hidden" name="status" value="' . $status . '">
                <input type="hidden" name="prev_status" value="' . $prevStatus . '">
                <input type="submit" name="action_button" value="勉強">
                <input type="submit" name="action_button" value="テスト">
                <input type="submit" name="action_button" value="マッチング ゲーム">
                <input type="submit" name="back_button" value="戻る">
            </form>
        ';
    } else {
        // Konten default
        echo'<h1>日本語学習アプリ</h1>';
        echo '
            <form method="post" action="">
                
                <input type="submit" name="n2_button" class="game_button" value="N2">
                <input type="submit" name="n3_button" class="game_button" value="N3">
            </form>
        ';
    }
    ?>

</body>

</html>