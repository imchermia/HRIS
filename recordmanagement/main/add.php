<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Registration</title>
</head>
<body>

<form action="reg.php" method="POST">
    <label for="rb">Received By</label><br>
    <input type="text" name="rb" id="rb"><br><br>

    <label for="doc_type">Document Type</label><br>
    <select name="doc_type" id="doc_type">
        <?php
        include('connect.php');     
        $result = $db->prepare("SELECT * FROM doc_type ORDER BY id DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }
        ?>
    </select><br><br>

    <label for="office">Office</label><br>
    <select name="office" id="office">
        <?php
        include('connect.php');     
        $result = $db->prepare("SELECT * FROM offices ORDER BY id DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }
        ?>
    </select><br><br>

    <label for="date">Date In</label><br>
    <input type="text" name="date" id="date"><br><br>

    <label for="desc">Description</label><br>
    <textarea name="desc" id="desc"></textarea><br><br>

    <label for="status">Status</label><br>
    <input type="text" name="status" id="status"><br><br>

    <label for="dateo">Date Out</label><br>
    <input type="text" name="dateo" id="dateo"><br><br>

    <label for="ft">Forwarded To</label><br>
    <input type="text" name="ft" id="ft"><br><br>

    <input type="submit" value="Save">
</form>

</body>
</html>
