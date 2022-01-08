<?php
$data = file_get_contents("dummy.json");
$data = json_decode($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($data->data as $obj) { ?>
        <div class="movie">
            <h2><?php echo $obj->title; ?></h2>
            <?php foreach ($obj->genre as $gnr) { ?>
                <span><?php echo $gnr; ?></span>
            <?php } ?>
            <p><?php echo $obj->rating; ?></p>
            <p><?php echo $obj->duration; ?></p>
            <p><?php echo $obj->quality; ?></p>
            <p><?php echo $obj->trailer; ?></p>
            <p><?php echo $obj->watch; ?></p>
            <hr>
        </div>
        <button id="add">Add</button>
        <button id="delete">Delete</button>  
    <?php } ?>

<script>
    

    // delete movie from dummy.json
    let del = document.querySelector("#delete");
    del.addEventListener("click", function() {
        let title = prompt("Enter title");
        let xhr = new XMLHttpRequest();
        xhr.open("DELETE", "dummy.json", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(JSON.stringify(title));
    });

    // add movie to dummy.json
    let add = document.querySelector("#add");
    add.addEventListener("click", function() {
        let title = prompt("Enter title");
        let genre = prompt("Enter genre");
        let rating = prompt("Enter rating");
        let duration = prompt("Enter duration");
        let quality = prompt("Enter quality");
        let trailer = prompt("Enter trailer");
        let watch = prompt("Enter watch");

        let obj = {
            title: title,
            genre: [genre],
            rating: rating,
            duration: duration,
            quality: quality,
            trailer: trailer,
            watch: watch
        }

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "dummy.json", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(JSON.stringify(obj));

        // if success
        xhr.onload = function() {
            if (this.status == 200) {
                console.log("Success");
            } else {
                console.log("Error");
            }
        }
       
    });
</script>    
</body>
</html>
