<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="change.php" class="mt-5 text-center">
                    <div class="form-group mb-2">
                        <input type="text" name="task" class="form-control" placeholder="Write task here...">
                    </div>
                    <button type="submit" name='submit' class="btn btn-primary btn-block mb-2">Submit</button>
                </form>
                <table class="table">
                    <thead>
                        <th>Task ID</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM todo";
                            $result = $conn->query($sql);
                            
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $task_id = $row['task_id'];
                                    echo "<tr>";
                                    echo "<td>" . $row['task_id'] . "</td>";
                                    echo "<td>" . $row['task'] . "</td>";
                                    if($row['status'] == 'completed'){
                                        echo "<td><span class='badge badge-success'>" . $row['status'] . "</span></td>";
                                    }
                                    else{
                                        echo "<td><span class='badge badge-warning'>" . $row['status'] . "</span></td>";
                                    }
                                    echo "<td>";
                                    if($row['status'] == 'not completed'){
                                        echo "<a href='change.php?id=$task_id&action=1' class='btn btn-sm btn-success'><i class='fas fa-check'></i></a> ";
                                    }
                                        echo "<a href='change.php?id=$task_id&action=3' class='btn btn-sm btn-danger text-white'>Delete</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>

</html>