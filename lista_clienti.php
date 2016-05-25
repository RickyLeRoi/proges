<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
    <meta charset="utf-8">
    <title>Lista Clienti - Gestionale Provenzano</title>
    <meta name="description" content="Gestionale per etichettificio Provenzano"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("template/parrot/style.php") // Carica gli stili del tema in uso ?>

    <?php include("function/session.php"); ?>

</head>
<body>
<!-- #### Navbars #### -->
<?php include_once("template/parrot/navbar.php") ?>

<div class="masthead">
    <div class="masthead-title">
        <div class="container">
            Lista Clienti sintetica
        </div>
    </div>
</div>

<div class="container">
    <div>
        <form action="lista_clienti_big.php">
            <input style="width: auto" class="form-control" type="submit" value="Lista completa">
        </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Codice</th>
            <th>Descrizione</th>
            <th>Note</th>
            <th>Telefono legale</th>
            <th>Cellulare</th>
            <th>P.IVA</th>
            <th>Cod Fisc</th>
            <th>+ info</th>
        </tr>
        </thead>
        <tbody id="records">
        </tbody>
    </table>
    <div class="row">
        <nav class="col-sm-12">
            <ul class="pager">
                <li class="previous"><a id="prec" href="#"><span aria-hidden="true">&larr;</span> Precedente</a></li>
                <li class="next"><a id="succ" href="#">Successivo <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="modal fade" id="clientModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Scheda Completa</h4>
            </div>

            <div class="modalClienti" style="color: #000" class="modal-body">
                <div class="container">
                    <table>
                        <tr><td><h4>Cliente</h4></b></td><td></td></tr>
                        <tr><td><b>Nome: </b></td><td><span id="nomeC"></span></td></tr>
                        <tr><td><b>Cognome: </b></td><td><span id="cognomeC"></span></td></tr>
                        <tr><td><b>Codice Cliente: </b></td><td><span id="cC"></span></td></tr>
                        <tr><td><b>Descrizione: </b></td><td><span id="descC"></span></td></tr>
                        <tr><td><b>Note Cliente: </b></td><td><span id="noteC"></span></td></tr>
                        <tr><td><h4>Sede legale</h4></b></td><td></td></tr>
                        <tr><td><b>Indirizzo legale: </b></td><td><span id="indirizzoL"></span></td></tr>
                        <tr><td><b>Città legale: </b></td><td><span id="cittaL"></span></td></tr>
                        <tr><td><b>Cap legale: </b></td><td><span id="capL"></span></td></tr>
                        <tr><td><b>Provincia legale: </b></td><td><span id="provinciaL"></span></td></tr>
                        <tr><td><b>Tel legale: </b></td><td><span id="telL"></span></td></tr>
                        <tr><td><b>Fax Legale: </b></td><td><span id="faxL"></span></td></tr>
                        <tr><td><b>Stato legale: </b></td><td><span id="provL"></span></td></tr>
                        <tr><td><b>Email Legale: </b></td><td><span id="emailL"></span></td></tr>
                        <tr><td><b>Sito web legale: </b></td><td><span id="sitoWebL"></span></td></tr>
                        <tr><td><h4>Sede Amministrativa</h4></b></td><td></td></tr>
                        <tr><td><b>Indirizzo:</b></td><td><span id="indrizzoAc"></span></td></tr>
                        <tr><td><b>Città: </b></td><td><span id="cittaAc"></span></td></tr>
                        <tr><td><b>Cap: </b></td><td><span id="capAc"></span></td></tr>
                        <tr><td><b>Provincia: </b></td><td><span id="provinciaAc"></span></td></tr>
                        <tr><td><b>Telefono: </b></td><td><span id="telefonoAc"></span></td></tr>
                        <tr><td><b>Cellulare: </b></td><td><span id="cellulareAc"></span></td></tr>
                        <tr><td><b>Stato: </b></td><td><span id="statoAc"></span></td></tr>
                        <tr><td><b>Email: </b></td><td><span id="emailAc"></span></td></tr>
                        <tr><td><b>Sito web: </b></td><td><span id="sitoAc"></span></td></tr>
                        <tr><td><b>P.Iva: </b></td><td><span id="pivaAc"></span></td></tr>
                        <tr><td><b>C. Fiscale: </b></td><td><span id="cfiscAc"></span></td></tr>
                        <tr><td><b>Iban: </b></td><td><span id="ibanAc"></span></td></tr>
                        <tr><td><b>Banca: </b></td><td><span id="bancaAc"></span></td></tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>
<?php include_once("template/parrot/foot.php") ?>
<script type="text/javascript">
    var records,
        page = 0,
        limit = 30;
    function loadPage(page, limit){
        $.ajax({
            url: "function/get_listaclienti.php",
            dataType: "JSON",
            type: "GET",
            error: function(){
                alert("Chiamata fallita!!!");
            },
            data: "page="+page+"&limit="+limit,
            success: function(result){
                records = result;
                loadQuery();
                page = limit + page;
                limit = limit * 2;
            }
        });
    };


</script>
<script type="text/javascript">
    var rowsReturned;
    function loadQuery() {
        rowsReturned = 0;
        var tab = document.getElementById('records'),
            newTr,
            info,
            att,
            td;
        prevNext();
        document.getElementById("records").innerHTML = "";
        for (var id in records ) {
            var texts = new Array( //inizializza i dati che ti servono
                records[id].id,
                records[id].nomeC,
                records[id].cognomeC,
                records[id].codC,
                records[id].descrC,
                records[id].noteC,
                records[id].telLC,
                records[id].cellAC,
                records[id].PIVAC,
                records[id].CFC
            );
            rowsReturned++;
            newTds = generateTd(texts);
            for ( var td in newTds) {
                newTr.appendChild(newTds[td]);
            }

            info = document.createElement("input");
            info.className = "form-control";
            info.type = "button";
            //info.id = records[id].id;

            att = document.createAttribute("data-row");        // Create a "href" attribute
            att.value = records[id][28];                            // Set the value of the href attribute

            info.setAttributeNode(att);

            info.value ="Dettagli";
            info.onclick = function(num) {
                var num = this.getAttribute("data-row");
                console.log(num);
                clientModal([
                        records[num].nomeC,
                        records[num].cognomeC,
                        records[num].codC,
                        records[num].descrC,
                        records[num].noteC,
                        records[num].indirizzoLC,
                        records[num].cittaLC,
                        records[num].capLC,
                        records[num].provLC,
                        records[num].telLC,
                        records[num].faxLC,
                        records[num].statoLC,
                        records[num].emailLC,
                        records[num].urlLC,
                        records[num].indirizzoAC,
                        records[num].cittaAC,
                        records[num].capAC,
                        records[num].provAC,
                        records[num].telAC,
                        records[num].cellAC,
                        records[num].statoAC,
                        records[num].emailAC,
                        records[num].urlAC,
                        records[num].PIVAC,
                        records[num].CFC,
                        records[num].IBANC,
                        records[num].bancaC
                    ]
                )};
            td = document.createElement("td");
            td.appendChild(info);
            newTr.appendChild(td);
            document.getElementById('records').appendChild(newTr);

        }
        function generateTd(arr) {
            var newTd,
                text;
            obj = new Array();
            newTr = document.createElement("tr");
            newTr.id = "row-" + records[id][28]; // per capire: 28 è l'ultimo record che indica su quale array siamo
            for (key in arr) {
                newTd = document.createElement("td");
                text = document.createTextNode(arr[key]);
                newTd.appendChild(text);
                obj.push(newTd);
            }
            return obj;
        }
    }

    $("#succ").click(function() {
        if (rowsReturned == 29) {
            page += +30;
            limit += +30;
            loadPage(page, limit);
        }
    });

    $("#prec").click(function() {
        if (page !=0 ) {
            page += -30;
            limit += -30;
            loadPage(page, limit)
        }
    });
    function prevNext() {
        var prev = document.getElementById("prec").parentNode;
        if (page < 0 || page == 0) {
            prev.className = "previous disabled";
        }
        else {
            prev.className = "previous";
        }
        var succ = document.getElementById("succ").parentNode;
        if (rowsReturned != 29) {
            succ.className = "next disabled";
        }
        else {
            succ.className = "next";
        }
    }
    loadPage(0, 30);

</script>
</body>
</html>
