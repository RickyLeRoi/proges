<?php
$t=time();
echo (time() . "<br/>");
$data=date("Y-m-d H:i:s",$t);
echo ($data . "<br/><br/>");

function data_italiana($var) {
        $keywords = preg_split("/[\s,-]+/", $var);
        echo $keywords[2]."-".$keywords[1]."-".$keywords[0]." ".$keywords[3]."<br/><br/>";
    }
data_italiana($data);

$time = strtotime($data);
echo date("<br/> d-m-Y H:i", $time);
?>
