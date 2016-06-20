<?php

backup_tables('localhost', 'root', 'mysql', 'gestionale_db');

function backup_tables($host, $userDB, $pswdDB, $database, $tables = '*')
{

    $link = mysqli_connect($host, $userDB, $pswdDB, $database);

    if ($tables == '*') {
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    //cycle through
    foreach ($tables as $table) {
        $result = mysqli_query($link, 'SELECT * FROM ' . $table);
        $num_fields = mysqli_num_fields($result);

        $return .= 'DROP TABLE ' . $table . ';';
        $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE ' . $table));
        $return .= "\n/**/\n" . $row2[1] . ";\n/**/\n";

        for ($i = 0; $i < $num_fields; $i++) {
            while ($row = mysqli_fetch_row($result)) {
                $return .= 'INSERT INTO ' . $table . ' VALUES(';
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return .= '"' . $row[$j] . '"';
                    } else {
                        $return .= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return .= ',';
                    }
                }
                $return .= ");\n/**/\n";
            }
        }
    }

    //salva file
    date_default_timezone_set('Europe/Rome');
    $dump = fopen('backup/gestionale_db-' . date('d-m-Y_H.i.s') . '.sql', 'w+');
    fwrite($dump, $return);
    fclose($dump);
    echo "<h2>File di backup scritto correttamente.</h2><h4><a href=\"javascript:history.back()\">Torna indietro</a></h4>";
    echo "<div><textarea cols='100' rows='50'>" . $return . "</textarea></div>";
}
?>