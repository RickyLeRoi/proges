<html>
<head>
<title>Fattura</title>
<meta charset="utf-8">
<meta name="author" content="Daniele Irsuti">
<meta name="image" content="../images/logos.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" >
<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<style>
@media print {
p {
font-size: 7pt;
}
.logo {
max-width: 100%;
width: 100px;
height: auto;
}
#sottotabella {
border: none !important;
border-collapse: collapse;
}

page {
size: a4;
}

.qnt {
height: 6cm;
}

.var {
height: 3cm;
}
#stampa {
display: none;
}
}
.typo {
font-family: monospace, monospace;
padding-left: 5px;
font-size: 12px;
}

</style>
</head>
<body>

<div id="stampa" style="padding-top: 10px; padding-bottom: 10px;" class="container-fluid">
<span class="h1">
<a href="../ddt.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span>
</div>

<page>
<div style="background: #FFF" class="container-fluid">
<div class="table-responsive">
<table class="table-bordered table table-striped">
<thead>
<tr colspan="4">
<td style="width:350;">
<p class="col-md-12">
<h5 class="text-center">
<strong>FATT N.
<input style="width:15%; text-align:right;" type="number" size="4" placeholder="0000" readonly>/
<SCRIPT LANGUAGE="JavaScript">
Stamp = new Date();
document.write((Stamp.getYear() + 1900) + '</strong><br/>del <strong>' + Stamp.getDate() + "/" + (Stamp.getMonth() + 1) + "/" + (Stamp.getYear() + 1900) + '</strong>');
</SCRIPT>
</strong>
</h5>
</p>
<span class="typo">Pagamento
<select style="width:80%; float:right;">
<option>LO PRENDI</option>
<option>DAL DB</option>
</select></span><br/>
<span class="typo"><p>CREDITO SICILIANO - AG. BAGHERIA</p>
<p>IBAN: <strong>IT 69 F 03019 43070 000008380468</strong></p></span>
</td>
<td>
<div class="col-md-12">
Spett.le <input type="text" style="width:100%;" placeholder="Cliente"><br/>
<input type="text" style="width:100%;" placeholder="P.IVA"><br/>
<input type="text" style="width:100%;" placeholder="Indirizzo legale"><br/>
<input type="text" style="width:60%;" placeholder="Città"> -
<input type="text" style="width:10%;" placeholder="(PR)"> -
<input type="text" style="width:23%;" placeholder="CAP">
</div>
</td>
</tr>
</thead>

<tbody>

<tr>
<td colspan="2"><p class="col-md-12">Descrizione della merce</p></td>
<td><p class="col-md-12">Quantità</p></td>
<td><p class="col-md-12">Imp.unit.</p></td>
<td><p class="col-md-12">Importo</p></td>
</tr>

<tr class="qnt" height="400">
<td colspan="2">
    <input style="width:15%;" type="text" class="typo" placeholder="Cod. Articolo"><span style="width:15%;"> - </span><input style="width:75%;" type="text" class="typo" placeholder="Descrizione articolo">
</td>
<td>
    <input style="width:100%;" class="typo" type="number">
</td>
<td>
    <input style="width:100%;" class="typo" type="number">
</td>
<td>
    <input style="width:100%;" class="typo" type="number">
</td>
</tr>

</tbody>



                        </tr>

</table>
</div>
</div>
</page>

<div id="stampa" style="padding-top: 10px; padding-bottom: 10px;" class="container-fluid">
<span class="h1">
<a href="../ddt.php"> <span class="glyphicon glyphicon-chevron-left"></span>Indietro</a>
<a href="#" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Stampa</a>
</span>
</div>

</body>
</html>
