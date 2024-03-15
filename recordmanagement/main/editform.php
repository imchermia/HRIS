<?php
    include('connect.php');
    $id=$_GET['id'];
    $result = $db->prepare("SELECT * FROM transaction WHERE id= :userid");
    $result->bindParam(':userid', $id);
    $result->execute();
    for($i=0; $rows = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
<div class="container">
        <h2>Edit Transaction</h2>
        <div class="box">
            
    <input type="hidden" name="memids" value="<?php echo $id; ?>" />
    Received By<br>
    <input type="text" name="rb" value="<?php echo $rows['receive_by']; ?>" /><br><br>

    Document Type<br>
    <select name="doc_type" class="ed">
        <?php
        echo '<option value="'.$rows['doc_type'].'">'.$rows['doc_type'].'</option>';
        include('connect.php');     
        $result_doc_type = $db->prepare("SELECT * FROM doc_type ORDER BY id DESC");
        $result_doc_type->execute();
        for($j=0; $row_doc_type = $result_doc_type->fetch(); $j++){
            echo '<option value="'.$row_doc_type['name'].'">'.$row_doc_type['name'].'</option>';
        }
        ?>
    </select><br /><br>

    Office<br>
    <select name="office" class="ed">
        <?php
        echo '<option value="'.$rows['office'].'">'.$rows['office'].'</option>';
        include('connect.php');     
        $result_office = $db->prepare("SELECT * FROM offices ORDER BY id DESC");
        $result_office->execute();
        for($k=0; $row_office = $result_office->fetch(); $k++){
            echo '<option value="'.$row_office['name'].'">'.$row_office['name'].'</option>';
        }
        ?>
    </select><br /><br>

    Date In<br>
    <input type="text" name="date" value="<?php echo $rows['date']; ?>" /><br><br>

    Description<br>
    <textarea name="desc"><?php echo $rows['description']; ?></textarea><br><br>

    Status<br>
    <input type="text" name="status" value="<?php echo $rows['status']; ?>" /><br><br>

    Date Out<br>
    <input type="text" name="dateo" value="<?php echo $rows['dateout']; ?>" /><br><br>

    Forwarded To<br>
    <input type="text" name="ft" value="<?php echo $rows['ft']; ?>" /><br><br>

    <input type="submit" value="Save" />
</form>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <title>Edit Transaction</title>
    <style>
        /* Centering the form */
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items to the top */
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: justify;
            margin-top: 50px; /* Adjust the margin from the top */
        }
        .box {
            border: 2px solid #ccc; /* Adding border */
            padding: 20px; /* Adding padding */
            border-radius: 10px; /* Adding border radius */
            max-width: 400px; /* Limiting maximum width */
            width: 150%; /* Ensuring it takes full width */
            box-sizing: border-box; /* Include padding and border in the element's total width */
        }
        input[type="text"] {
            width: calc(150% - 20px); /* Subtracting padding for input width */
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box; /* Include padding in the element's total width */
        }
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50; /* Green background */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        h2 {
            text-align: center;
            margin: 0; /* Remove default margin */
        }
    </style>
?>
<?php
    }
