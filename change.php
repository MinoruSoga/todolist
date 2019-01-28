<?php
include 'config.php';
$id = $_GET['id'];
$val = $_GET['action'];
if($val == 1){
    $sql = "UPDATE todo SET status='completed' WHERE task_id=$id";
    
    if($conn->query($sql)){
        header("Location: index.php");
    }
    else{
        echo "Error: ".$conn->error;
    }
}

elseif($val == 3){
    $sql = "DELETE FROM todo WHERE task_id=$id";
    $result = $conn->query($sql);

    if($result){
        header("Location: index.php");
    }
    else{
        echo "Error: ".$conn->error;
    }
}

if(isset($_POST['submit'])){
    $task = $_POST['task'];

    $sql = "INSERT INTO todo(task, status) VALUES('$task', 'not completed')";

    $result = $conn->query($sql);

    if($result){
        header("Location: index.php");
    }
    else{
        echo "Error: " . $conn->error;
    }

}


?>