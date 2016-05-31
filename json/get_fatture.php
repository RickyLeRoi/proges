<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = false;

$query = "SELECT fatt.*, numerazione_ftt.*, clienti.nomeC, clienti.cognomeC, clienti.codC, pagam.descr
                FROM fatt
                  LEFT JOIN numerazione_ftt
                    ON fatt.id=numerazione_ftt.id
                  LEFT JOIN clienti
                    ON numerazione_ftt.dest=clienti.id
                  LEFT JOIN pagam
                    ON fatt.id_pag=pagam.id";


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

while ($fattura = $result->fetch_object()) {
//echo $fattura->id;
    array_push($newKey, [
        "value" => $fattura->id,
        "data" => [
            "num" => $fattura->num,
            "codC" => $fattura->codC,
            "nomeC" => $fattura->nomeC,
            "cognomeC" => $fattura->cognomeC,
            "note" => $fattura->note,
            "reg_date" => $fattura->reg_date,
            "pagamDescr" => $fattura->descr
        ]
    ]);
}

$json = json_encode($newKey, JSON_PRETTY_PRINT);

?>
{
"query" : "<?php echo $check ?>",
"suggestions" : <?php echo $json ?>
}

