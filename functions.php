<?php

function addContact($name, $phone) {
    $contacts = getContacts();
    $contacts[] = array("name" => $name, "phone" => $phone);
    saveContacts($contacts);
}

function getContacts() {
    $json = file_get_contents('contacts.json');
    $contacts = json_decode($json, true);
    if (!$contacts) {
        $contacts = array();
    }
    return $contacts;
}

function saveContacts($contacts) {
    $json = json_encode($contacts, JSON_PRETTY_PRINT);
    file_put_contents('contacts.json', $json);
}

function deleteContact($index) {
    $contacts = getContacts();
    if (isset($contacts[$index])) {
        unset($contacts[$index]);
        saveContacts($contacts);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['phone'])) {
    addContact($_POST['name'], $_POST['phone']);
    header("Location: index.php");
    exit;
}

if (isset($_GET['delete'])) {
    deleteContact($_GET['delete']);
    header("Location: index.php");
    exit;
}