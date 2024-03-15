
<style>
body {
	background: #0ca3d2;
}
table { border-collapse: separate; background-color: #FFFFFF; border-spacing: 0; width: 80%; color: #666666; text-shadow: 0 1px 0 #FFFFFF; border: 1px solid #CCCCCC; box-shadow: 0; margin: 0 auto;font-family: arial; }
table thead tr th { background: none repeat scroll 0 0 #EEEEEE; color: #222222; padding: 10px 14px; text-align: left; border-top: 0 none; font-size: 12px; }
table tbody tr td{
    background-color: #FFFFFF;
	font-size: 12px;
    text-align: left;
	padding: 10px 14px;
	border-top: 1px solid #DDDDDD;
}
#sidebar {
            background-color: #333;
            color: #fff;
            width: 200px;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            padding-top: 20px;
        }
        #sidebar a {
            display: block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
        }
        #sidebar a:hover {
            background-color: #555;
        }
        #content {
            margin-left: 220px;
            padding: 20px;
        }
        table {
            border-collapse: separate;
            background-color: #FFFFFF;
            border-spacing: 0;
            width: 100%;
            color: #666666;
            text-shadow: 0 1px 0 #FFFFFF;
            border: 1px solid #CCCCCC;
            box-shadow: 0;
            font-family: Arial, sans-serif;
        }
        table thead tr th {
            background: #EEEEEE;
            color: #222222;
            padding: 10px 14px;
            text-align: left;
            border-top: 0 none;
            font-size: 12px;
        }
        table tbody tr td {
            background-color: #FFFFFF;
            font-size: 12px;
            text-align: left;
            padding: 10px 14px;
            border-top: 1px solid #DDDDDD;
        }
    </style>
</head>
<body>
	<div id="sidebar">
		<a href="dashboard.php">Dashboard</a>
        <a href="index.php">Transaction</a>
        <a href="doctype.php">Document Type</a>
        <a href="offices.php">Offices</a>
        <a href="../index.php">Logout</a>
    </div>
    <div id="content">
        <h2>Document Type</h2>
        <div id="formdesign">
            <input type="text" name="filter" value="" id="filter" placeholder="Search Document Type..." autocomplete="off" />
            <a rel="facebox" href="adddoc.php" id="add">Add Doc Type</a>
        </div>
        <table cellspacing="0" cellpadding="2" id="resultTable">
            <thead>
                <tr>
                    <th width="70%"> Name </th>
                    <th width="30%"> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('connect.php');     
                    $result = $db->prepare("SELECT * FROM doc_type ORDER BY id DESC");
                    $result->execute();
                    for($i=0; $row = $result->fetch(); $i++){
                ?>
                <tr class="record">
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <a href="editdoc.php?id=<?php echo $row['id']; ?>" class="editbutton" title="Click To Edit">Edit</a> | 
                        <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/application.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
                loadingImage : 'src/loading.gif',
                closeImage   : 'src/closelabel.png'
            });

            $(".delbutton").click(function(){
                var element = $(this);
                var del_id = element.attr("id");
                var info = 'id=' + del_id;
                if(confirm("Sure you want to delete this update? There is NO undo!")) {
                    $.ajax({
                        type: "GET",
                        url: "deletedoc.php",
                        data: info,
                        success: function(){
                        }
                    });
                    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
                }
                return false;
            });

            $(".editbutton").click(function(){
                var element = $(this);
                var edit_id = element.attr("id");
                // Redirect to edit page with the doc_type id
                window.location.href = "editdoc.php?id=" + edit_id;
                return false;
            });
        });
    </script>
