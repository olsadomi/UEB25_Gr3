<?php
    include("db.php");
    include("email_sender.php");

    $PdataHyrjes = isset($_POST['AJAXdata-hyrje']) ? $_POST['AJAXdata-hyrje'] : null;
    $PdataDaljes = isset($_POST['AJAXdata-dalje']) ? $_POST['AJAXdata-dalje'] : null;
    $PkohaHyrjes = isset($_POST['AJAXkoha-hyrje']) ? $_POST['AJAXkoha-hyrje'] : null;
    $PkohaDaljes = isset($_POST['AJAXkoha-dalje']) ? $_POST['AJAXkoha-dalje'] : null;
    $Pcmimi = isset($_POST['AJAXqmimi']) ? $_POST['AJAXqmimi'] : null;
    
    if(!$Pcmimi==null){
        $result = sendEmail($PdataHyrjes, $PdataDaljes, $PkohaHyrjes, $PkohaDaljes, $Pcmimi);
        echo json_encode(['success' => $result]);
        exit;
    }else{
        echo json_encode(['success' => false, 'error' => 'null values']);
        exit;
    }
                           
?>