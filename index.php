<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initiative Counter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost","root","","initiative_counter");
    ?>
    <main>
        <section class="order-scroll">
            <?php
                //here add the cards in initiative order
            ?>
        </section>
        <section class="creature-picker">
            <select name="creature-select" id="creature-select">
                <?php
                    $options = mysqli_query($conn, "
                    SELECT * FROM creatures ORDER BY name
                    "); 
                    if($options->num_rows>0){
                        while($row = $options->fetch_assoc()){
                            echo "
                            <option value='{$row['path']}'>{$row['name']}</option>
                            ";
                        }
                    }

                ?>
            </select>
            <input type="number" name="init-bonus" id="init-bonus" placeholder="initiative bonus">
            <input type="button" value="ADD TO ORDER">
        </section>
        <section class="creature-add">
            <section class="name-container"></section>
            <section class=""></section>
            <section class=""></section>
        </section>
    </main>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>

<!--
IDEA BOARD
- Make files uploadable to folder and their data (Creature name, path to image in folder) sendable to db
- init bonus is given in app not written in code due to situational bonuses
- ofc make the data editable
- make a select to choose creatures reading data from db
-->