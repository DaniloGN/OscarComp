<?php
  class Data{
function dataBR($umadata) {

    $brdata = substr($umadata,8,2)."/".substr($umadata,5,2)."/".substr($umadata,0,4);

    return $brdata;

}



function dataMY($umadata) {

    $mydata = substr($umadata,6,4)."/".substr($umadata,3,2)."/".substr($umadata,0,2);

    return $mydata;

}
}
?>