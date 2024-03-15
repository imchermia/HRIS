<?php
    include('connect.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        // Fetch the document type information from the database based on the ID
        $result = $db->prepare("SELECT * FROM doc_type WHERE id = :id");
        $result->bindParam(':id', $id);
        $result->execute();
        $doc_type = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        // If ID is not set, redirect back to index.php or handle the error accordingly
        header('Location: doctype.php');
        exit;
    }

    // Handle form submission if the form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assuming you have form fields like 'name' for updating the name of the document type
        $name = $_POST['name'];

        // Update the document type in the database
        $sql = "UPDATE doc_type SET name = :name WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Redirect back to index.php after editing
        header('Location: doctype.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <title>Edit Document Type</title>
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
            text-align: center;
            margin-top: 50px; /* Adjust the margin from the top */
        }
        .box {
            border: 2px solid #ccc; /* Adding border */
            padding: 20px; /* Adding padding */
            border-radius: 10px; /* Adding border radius */
            max-width: 400px; /* Limiting maximum width */
            width: 100%; /* Ensuring it takes full width */
            box-sizing: border-box; /* Include padding and border in the element's total width */
        }
        input[type="text"] {
            width: calc(100% - 20px); /* Subtracting padding for input width */
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
</head>
<body>
    <div class="container">
        <h2>Edit Document Type</h2>
        <div class="box">
            <form action="" method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $doc_type['name']; ?>"><br><br>
                <input type="submit" value="Save">
            </form>
        </div>
    </div>
</body>
</html>

