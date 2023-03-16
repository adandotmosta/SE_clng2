<?php

switch($vars['action']){
    case "list":{
        session_start();
        $i = $_SESSION['id'];
        $items = $db->query("SELECT * FROM items WHERE id_u='$i';")->fetchAll();
        include("view/header.php");
        include("view/list.php");
        include("view/footer.php");
        exit;
    }break;

    case "do_add":{
        session_start();
        $i=$_SESSION['id'];
        $db->query("INSERT INTO items (title,id_u) VALUES (?,?)",$vars['title'],$i);
        header("Location: h.php");
        exit;        
        
    }break;
    
    case "delete":{
        $id = $_GET['item_id'];
       $db->query("DELETE FROM items WHERE item_id='$id';");
       header("Location: h.php");
        exit;        
    }break;
    
    case "Log_Out":{
        session_destroy();
        header("Location: index.php");
        exit;

        
        
    }break;
    
    case "help":{
        //some code here to show help 
        exit;
    }break;
    
    
}

?>