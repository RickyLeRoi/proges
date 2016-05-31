<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = false;

$query = "SELECT ndc.*, numerazione_ndc.*, clienti.nomeC, clienti.cognomeC, clienti.codC, pagam.descr
                FROM ndc
                  LEFT JOIN numerazione_ndc
                    ON ndc.id=numerazione_ndc.id
                  LEFT JOIN clienti
                    ON numerazione_ndc.dest=clienti.id
                  LEFT JOIN pagam
                    ON ndc.id_pag=pagam.id";


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

while ($ndc = $result->fetch_object()) {
//echo $ndc->id;
    array_push($newKey, [
        "value" => $ndc->id,
        "data" => [
            "num" => $ndc->num,
            "codC" => $ndc->codC,
            "nomeC" => $ndc->nomeC,
            "cognomeC" => $ndc->cognomeC,
            "note" => $ndc->note,
            "reg_date" => $ndc->reg_date,
            "pagamDescr" => $ndc->descr
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

