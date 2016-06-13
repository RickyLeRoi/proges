<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = false;

$query = "SELECT doc_ddt.*, doc_ddt_num.*, clienti.nomeC, clienti.cognomeC, clienti.codC
                FROM doc_ddt
                  LEFT JOIN doc_ddt_num
                    ON doc_ddt.id=doc_ddt_num.id
                  LEFT JOIN clienti
                    ON doc_ddt_num.dest=clienti.id";

//echo $query;
if ($check != false) {
    $query .= " WHERE clienti.nomeC LIKE \"%" . $check . "%\" OR clienti.cognomeC LIKE \"%" . $check . "%\" OR  clienti.codC LIKE \"%" . $check . "%\"";
}

/* check connection */


if ($conndb->query($query)) {
    //if ($debug === true) printf("/* Select returned %d rows. */\n", $result->num_rows);
    $result = $conndb->query($query);
} else {
    echo $conndb->connect_errno;
}

if ($conndb->connect_errno) {
    printf("Connect failed: %s\n", $conndb->connect_error);

}

$newKey = array();


while ($ddt = $result->fetch_object()) {
//echo $ddt->id;
    array_push($newKey, [
        "value" => $ddt->id,
        "data" => [
            "num" => $ddt->num,
            "codC" => $ddt->codC,
            "nomeC" => $ddt->nomeC,
            "cognomeC" => $ddt->cognomeC,
            "note" => $ddt->note,
            "reg_date" => $ddt->reg_date
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

