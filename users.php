<?php 
    include('session.php');
    include('list_users.php');
    include('create_user.php');
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

<!-- ////////////////////////////////////////////////////  -->
<table border="3" style="width:100%">
    <tr>
        <td>

        <!-- TABLE0 -->
        <table border="3" style="width:100%">
            <tr>
                <th>User ID</th>
	        <th>User Name</th>
	        <th>First Name</th>
	        <th>Last Name</th>
	        <th>Email</th>
	        <th>Role</th>
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
	            <button id='bton' class="edit" onclick='edit_user_js()'>Edit User</button>	
     	            <button id='bton' class="delete" >Delete User</button>
	            <!--<button id='bton' class="publish" onclick='publish_js()'>Create User</button>-->
	        </td>
            </tr>
	</table>
        <table border="3" style="width:100%">
	    
	    <tr>
	        <td>
		    <h1>Create User:</h1></br>
                    <form action="" method="post">
                    <div><label>UserName :</label>
                    <input id="name" name="username" placeholder="username" type="text"></div>
		    <div><label>First Name :</label>
                    <input id="name" name="username" placeholder="first name" type="text"></div>
		    <div><label>Last Name :</label>
                    <input id="name" name="username" placeholder="last name" type="text"></div>
                    <div><label>Email :</label>
                    <input id="name" name="username" placeholder="email@something.com" type="text"></div>
                    <div><label>User Role :</label></br>
                    <!--<input id="name" name="username" placeholder="" type="text"></div>-->
		    <select>
                        <option value="usr">User</option>
                        <option value="admin">Admin:</option>
                        <option value="super">Super Admin:</option>
                    </select></div>

                    <div><label>Password :</label>
                    <input id="password" name="password" placeholder="**********" type="password"></div>
		    <div><label>Confirm Password :</label>
                    <input id="password" name="password" placeholder="**********" type="password"></div>
		    <div><label>Password Hint :</label>
                    <input id="name" name="username"  type="text"></div></br>
		    <button id='bton' class="publish" onclick='publish_js()'>Create User</button>
                    <span><?php echo $error; ?></span>
		    </form>
		</td>
	    </tr>
        </table>
        </td>
    </tr>
</table>




</div>

</body>
</html>
