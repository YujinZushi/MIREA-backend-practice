<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

header('Content-type: json/application');

require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

$connect = mysqli_connect("db", "user", "password", "appDB");

switch ($method) {
    case 'GET':
        if($type === 'track'){
            if(isset($id)){
                getTrack($connect, $id);
               
            } else {
                getTracks($connect);
            }
        }
        break;
    case 'POST':
        if(isset($_GET['track_id'])){
            updateTrack($connect, $_GET);
        } else {
            addTrack($connect, $_GET);
        }
        break;
    case 'DELETE':
        if($type === 'track'){
            if(isset($id))
            {
                deleteTrack($connect,$id);      
            }  
        }  
        break;    
}