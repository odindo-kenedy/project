<?php

 session_start();   
 function Message(){
    if(isset($_SESSION["ErrorMessage"])){
        $Output="<div style='color:red;font-size:30px;'>";
        $Output.=htmlentities($_SESSION["ErrorMessage"]);
        $Output.="</div>";
        $_SESSION["ErrorMessage"]=null;
        return $Output;
    }

 }
 function SuccessMessage(){
    if(isset($_SESSION["SuccessMessage"])){
        $Output="<div style='color:green; font-size:30px;'>";
        $Output.=htmlentities($_SESSION["SuccessMessage"]);
        $Output.="</div>";
        $_SESSION["SuccessMessage"]=null;
        return $Output;
    }
 }



?>
