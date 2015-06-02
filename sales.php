<?php 
    include('session.php');
    include('list_sales.php');
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <title>FreqWear: Content Resource Manager</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="profile">

    <b id="welcome">Welcome : <?php echo $_SESSION['login_user']; ?></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>

    <div id='nav'>
        <ul>
            <li><a href="profile.php">Files</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="sales.php">Sales</a></li>
            <li><a href="statistics.php">Statistics</a></li>
        </ul>
    </div>

<table border="3" style="width:100%">
    <tr>
        <td>

        <!-- TABLE0 -->
        <table border="3" style="width:100%">
            <tr>
                <th>Sales ID</th>
		<th>User ID</th>
	        <th>User Name</th>
		<th>File ID</th>
	        <th>File Name</th>
	        <th>Date</th>
	        <th>Sales Price</th>
	        <th>Device ID</th>
            </tr> 
        </table>

        <!-- TABLE1 -->
        <div class="scroll">
        <table id="table" border="3" style="width:100%">
            <?php echo $_SESSION['tables']; ?>
        </table>
        </div>

        <table border="3" style="width:100%">
            <tr>
                <td>
	            <button id='bton' class="edit_sale" onclick='edit_user_js()'>Edit Sale</button>	
     	            <button id='bton' class="delete_sale" >Delete Sale</button>
	            <button id='bton' class="create_sale" onclick='publish_js()'>Create Sale</button>
	        </td>
            </tr>
	</table>
        </td>
    </tr>
</table>



</div>

</body>
</html>
