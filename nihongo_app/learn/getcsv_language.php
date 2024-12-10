<?php
//error_reporting(0); //test.php?language=    &&level=
$level_block = ["N2", "N3"];
$language_block = ["インドネシア語", "ベトナム語", "バングラデシュ語", "ネパール語"];
if (isset($_GET['level']) || isset($_GET['language'])) {
    $level = ucfirst($_GET['level']);
    $language = ucfirst($_GET['language']);
} else {
    $level = "N3";
    $language = "インドネシア語";
}

    $csv_file = array();
    if ($folder = opendir('csv_file/')) {
        while (false !== ($file_name = readdir($folder))) {
            if ($file_name != "." && $file_name != "..") {
                array_push($csv_file, 'csv_file/' . $file_name);
            }
        }
        closedir($folder);
    }
    $all_data = array();
    $papper = 0;
    foreach ($csv_file as $i) {
        if (($CSVopen = fopen($i, "r")) !== false) {
            while (($data = fgetcsv($CSVopen, 1000, ',')) !== false) {
                if ($data[0] == "ID") {
                    continue;
                }
                if ($data[10] == $language) {
                    $data[0] = $papper;
                    $papper++;
                    array_push($all_data, $data);
                } else {
                    break;
                }
            }
        }
    }

fclose($CSVopen);
unset($papper);
