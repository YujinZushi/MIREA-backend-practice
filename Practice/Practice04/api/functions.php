<?php

function getTracks($connect)
{
	$query = mysqli_query($connect, "SELECT * FROM tracks");
	$tracks = [];
	while($track = mysqli_fetch_assoc($query)){
		$tracks[] = $track;
	}
	echo json_encode($tracks);
}

function getTrack($connect, $id)
{
	$query = mysqli_query($connect, "SELECT * FROM tracks WHERE track_id = '$id'");
	if(mysqli_num_rows($query) === 0){
		http_response_code(404);
		$res = [
			"status" => false,
			"message" => "track not found"
		];
		echo json_encode($res);
	} else {
		$query = mysqli_fetch_assoc($query);
		echo json_encode($query);
	}
}
function addTrack($connect, $data){
	$name = $data['name'];
	$duration =  $data['duration'];
	mysqli_query($connect, "INSERT INTO tracks (name, duration) VALUES ('$name','$duration')");
	
	http_response_code(201);

	$res = [
		"status" => true,
		"track_id" => mysqli_insert_id($connect),
		"name" => $name,
		"duration" => $duration
	];
	echo json_encode($res);
}

function updateTrack($connect, $data){
	$id = $data['track_id'];
	$name = $data['name'];
	$duration =  $data['duration'];
	mysqli_query($connect, "UPDATE tracks SET name = '$name', duration = '$duration' WHERE tracks.track_id = '$id'");
	
	http_response_code(200);
	$res = [
		"status" => true,
		"message" => "track updated",
		"name" => $name,
		"duration" => $duration
	];
	echo json_encode($res);
}

function deleteTrack($connect, $id){
	mysqli_query($connect, "DELETE FROM tracks WHERE tracks.track_id = '$id'");

	http_response_code(200);
	$res = [
		"status" => true,
		"track_id" => $id,
		"message" => "track deleted",
	];
	echo json_encode($res);
}

?>