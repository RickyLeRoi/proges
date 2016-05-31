<?php

include_once("../function/session.php");
include_once("../DB/config.php");


// Queries
if (isset($_GET["check"])) $check = mysqli_real_escape_string($conndb, $_GET["check"]);

else $check = false;

$query = "SELECT prev.*, numerazione_p.*, clienti.nomeC, clienti.cognomeC, clienti.codC, pagam.descr
                FROM prev
                  LEFT JOIN numerazione_p
                    ON prev.id=numerazione_p.id
                  LEFT JOIN clienti
                    ON numerazione_p.dest=clienti.id
                  LEFT JOIN pagam
                    ON prev.id_pag=pagam.id";


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

