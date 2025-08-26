<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $action = $_REQUEST['action'];

    if($action == "add"){
        $label = $_REQUEST['label'];

        $insertQuery = "INSERT INTO todos (label) VALUES (:label)";
        $insertStatement = $db->prepare($insertQuery);
        $insertStatement->execute(
            array(
                "label"=>$label
            )
        );
        // To load back the same page
        header('Location: ' . $_SERVER['PHP_SELF']);
    }
}
?>