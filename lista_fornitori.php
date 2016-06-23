<!DOCTYPE html>

<html lang="it">
<head>
    <!-- blu #071E3F arancione #EA640C -->
	<meta charset="utf-8">
	<title>Lista Fornitori - Gestionale Provenzano</title>
	<meta name="description" content="Gestionale per etichettificio Provenzano"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php include_once("template/parrot/style.php");
            include_once("function/session.php");
            include_once("DB/config.php");?>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->

</head>
<body>
        <!-- #### Navbars #### -->
        <?php include_once("template/parrot/navbar.php") ?>

        <div class="masthead">
            <div class="masthead-title">
                <div class="container">
                    Lista Fornitori sintetica
                </div>
            </div>
        </div>

  <div class="container">
    <div>
        <form action="lista_fornitori_big.php">
            <input class="form-control widthAuto" type="submit" value="Lista completa">
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
                <th>Telefono</th>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Scheda Completa</h4>
                    </div>

                    <div class="modalClienti" style="color: #000" class="modal-body">
                        <div class="container">
                            <table>
                                <tr>
                                    <td><h4>Fornitori</h4></b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>Nome: </b></td>
                                    <td><span id="nomeF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Cognome: </b></td>
                                    <td><span id="cognomeF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Codice Cliente: </b></td>
                                    <td><span id="codF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Descrizione: </b></td>
                                    <td><span id="descrF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Note Cliente: </b></td>
                                    <td><span id="noteF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Indirizzo legale: </b></td>
                                    <td><span id="indirizzoLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Città legale: </b></td>
                                    <td><span id="cittaLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Cap legale: </b></td>
                                    <td><span id="capLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Provincia legale: </b></td>
                                    <td><span id="provinciaLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Tel legale: </b></td>
                                    <td><span id="telLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Fax Legale: </b></td>
                                    <td><span id="faxLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Stato legale: </b></td>
                                    <td><span id="statoLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Email Legale: </b></td>
                                    <td><span id="emailLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Sito web legale: </b></td>
                                    <td><span id="sitoWebLF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>C. Fiscale: </b></td>
                                    <td><span id="CFF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Iban: </b></td>
                                    <td><span id="IBANF"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Banca: </b></td>
                                    <td><span id="bancaF"></span></td>
                                </tr>
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
            function loadPage(page, limit) {
                $.ajax({
                    url: "http://<?php echo $base_url ?>/json/get_fornitori.php",
                    dataType: "JSON",
                    type: "GET",
                    error: function () {
                        alert("Chiamata fallita!!!");
                    },
                    data: "page=" + page + "&limit=" + limit,
                    success: function (result) {
                        records = result;
                        loadQuery();
                        page = limit + page;
                        limit = limit * 2;
                    }
                });
            }


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
                for (var id in records) {
                    var texts = [records[id].id,
                        records[id].nomeF,
                        records[id].cognomeF,
                        records[id].codF,
                        records[id].descrF,
                        records[id].noteF,
                        records[id].telLF,
                        records[id].PIVAF,
                        records[id].CFF];
                    rowsReturned++;
                    newTds = generateTd(texts);
                    for (var td in newTds) {
                        newTr.appendChild(newTds[td]);
                    }

                    info = document.createElement("input");
                    info.className = "form-control";
                    info.type = "button";
                    //info.id = records[id].id;

                    att = document.createAttribute("data-row");             // Create a "href" attribute
                    att.value = records[id]["count"];                       // Set the value of the href attribute

                    info.setAttributeNode(att);

                    info.value = "Dettagli";
                    info.onclick = function (num) {
                        var num = this.getAttribute("data-row");
                        console.log(num);
                        associativeModal(
                            {
                                "#nomeF": records[num].nomeF,
                                "#cognomeF": records[num].cognomeF,
                                "#codF": records[num].codF,
                                "#descrF": records[num].descrF,
                                "#noteF": records[num].noteF,
                                "#indirizzoLF": records[num].indirizzoLF,
                                "#cittaLF": records[num].cittaLF,
                                "#capLF": records[num].capLF,
                                "#provinciaLF": records[num].provLF,
                                "#telLF": records[num].telLF,
                                "#faxLF": records[num].faxLF,
                                "#statoLF": records[num].statoLF,
                                "#emailLF": records[num].emailLF,
                                "#sitoWebLF": records[num].urlLF,
                                "#PIVAF": records[num].PIVAF,
                                "#CFF": records[num].CFF,
                                "#IBANF": records[num].IBANF,
                                "#bancaF": records[num].bancaF
                            }
                        )
                    };
                    td = document.createElement("td");
                    td.appendChild(info);
                    newTr.appendChild(td);
                    document.getElementById('records').appendChild(newTr);

                }
                function generateTd(arr) {
                    var newTd,
                        text;
                    obj = [];
                    newTr = document.createElement("tr");
                    newTr.id = "row-" + records[id]["count"]; // per capire: count è l'ultimo record che indica su quale array siamo
                    for (key in arr) {
                        arr[key] == null ? arr[key] = "N/D" : arr[key];
                        newTd = document.createElement("td");
                        text = document.createTextNode(arr[key]);
                        newTd.appendChild(text);
                        obj.push(newTd);
                    }
                    return obj;
                }
            }

            $("#succ").click(function () {
                if (rowsReturned == 29) {
                    page += +30;
                    limit += +30;
                    loadPage(page, limit);
                }
            });

            $("#prec").click(function () {
                if (page != 0) {
                    page += -30;
                    limit += -30;
                    loadPage(page, limit)
                }
            });
            function prevNext() {
                var prev = document.getElementById("prec").parentNode;
                if (page < 0 || page == 0) {
                    prev.className = "hide";
                }
                else {
                    prev.className = "previous";
                }
                var succ = document.getElementById("succ").parentNode;
                if (rowsReturned != 29) {
                    succ.className = "hide";
                }
                else {
                    succ.className = "next";
                }
            }
            loadPage(0, 30);

        </script>
	</body>
</html>
