<?php


    function get_contacts(){
        $messagesJson = file_get_contents('resources/contacts.json');
        $messages = json_decode($messagesJson,true);
        return $messages;

    }


    function save_contacts($messagesToSave){
        $json = json_encode($messagesToSave, JSON_PRETTY_PRINT);
        file_put_contents('resources/contacts.json', $json);
    }
?>