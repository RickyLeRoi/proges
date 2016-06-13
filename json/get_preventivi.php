<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = false;

$query = "SELECT doc_prev.*, doc_prev_num.*, clienti.nomeC, clienti.cognomeC, clienti.codC, ck_pagam.descr
                FROM doc_prev
                  LEFT JOIN doc_prev_num
                    ON doc_prev.id=doc_prev_num.num
                  LEFT JOIN clienti
                    ON doc_prev_num.dest=clienti.id
                  LEFT JOIN ck_pagam
                    ON doc_prev.id_pag=ck_pagam.id";


//echo $query;
if ($check != false) {
    $query .= " WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"";

}

/* check connection */


if ($result = $conndb->query($query)) {
    //if ($debug === true) printf("/* Select returned %d rows. */\n", $result->num_rows);
    //echo $query;

    $result = $conndb->query($query);
}
if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);

}

$newKey = array();

while ($prev = $result->fetch_object()) {
//echo $prev->id;
    array_push($newKey, [
        "value" => $prev->id,
        "data" => [
            "num" => $prev->num,
            "codC" => $prev->codC,
            "nomeC" => $prev->nomeC,
            "cognomeC" => $prev->cognomeC,
            "note" => $prev->note,
            "reg_date" => $prev->reg_date,
            "pagamDescr" => $prev->descr
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

