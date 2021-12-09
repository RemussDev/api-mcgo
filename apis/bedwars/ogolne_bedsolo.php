<?php

// connecta to database local host 
$con = mysqli_connect('localhost', 'root', '', 'bw_stats');
$response = array();

if($con){
    $nick1 = $_GET["nick"];
    $nick2 = mysqli_real_escape_string($con, $nick1);
    $sql = "SELECT * FROM ogolne_bedsolo WHERE nick = '$nick2'";
    $result = mysqli_query($con, $sql);
    if($result){
        header('Content-Type: JSON');
        $i = 0;
        while($row = mysqli_fetch_array($result)){

            $response[$i]['id'] = $row['id'];
            $response[$i]['uuid'] = $row['uuid'];
            $response[$i]['nick'] = $row['nick'];
            $response[$i]['final_kill'] = $row['final_kill'];
            $response[$i]['final_death'] = $row['final_death'];
            $response[$i]['bed_destroyed'] = $row['bed_destroyed'];
            $response[$i]['bed_lost'] = $row['bed_lost'];
            $response[$i]['kills'] = $row['kills'];
            $response[$i]['death'] = $row['death'];
            $response[$i]['killstreak'] = $row['killstreak'];
            $response[$i]['killstreakmax'] = $row['killstreakmax'];
            $response[$i]['win'] = $row['win'];
            $response[$i]['winstreak'] = $row['winstreak'];
            $response[$i]['winstreakmax'] = $row['winstreakmax'];
            $response[$i]['played'] = $row['played'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}





?>
