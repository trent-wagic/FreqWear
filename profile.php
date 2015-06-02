

<?php
session_start();
include('session.php');
include('list_files.php');
include('delete.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
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
        <!--<ol>
            <li><a href="http://54.149.136.136/debug.php?action=get_all_users">
                        SELECT * FROM users; Lists all the users in the database</a></li>
            <li><a href="http://54.149.136.136/debug.php?action=get_all_files">
                        SELECT * FROM files; Lists all the files in the database</a></li>
        </ol>-->

        <form enctype="multipart/form-data" method="post" action="transfer.php">
            Upload File: <input name="userfile" type="file" />	<?php 	    
	    if(isset($_SESSION['file_upload']))
	    {
	        echo $_SESSION['file_upload'];
                $_SESSION['file_upload'] = '';
	    }
	?><br />
            <input id='bt_hvr' type="submit" value="Send File" />
        </form>


<!--<div id="status"></div>-->
<!--<span class="caption"><embed src="http://odeo.com/flash/audio_player_tiny_gray.swf"quality="high" name="audio_player_tiny_gray" align="middle" allowScriptAccess="always" wmode="transparent" type="application/x-shockwave-flash" flashvars="valid_sample_rate=true external_url=http://54.149.136.136/Relax-1.mp3" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed></span>-->

<table border="3" style="width:100%">
    <tr>
        <td>

        <!-- TABLE0 -->
        <table border="3" bordercolor="165B8C" style="width:100%">
            <tr>
                <th><b>ID:</b></th>
                <th><b>Filename:</b></th>
                <th><b>Number of Downloads:</b></th>
                <th><b>Published</b></th>
            </tr> 
        </table>

        <!-- TABLE1 -->
        <div class="scroll">
        <table id="table" border="3" style="width:100%">
            <?php echo $_SESSION['tables']; ?>
        </table>
        </div>

        <table border="3" colspan="4" style="width:100%">
            <tr>
                <td colspan="4">
	            <button id='bton' class="edit" onclick='edit_js()'>Edit File</button>	
	            <button id='bton' class="delete" >Delete File</button>
	            <button id='bton' class="publish" onclick='publish_js()'>Publish File</button>
	        </td>
            </tr>
        </table>
        </td>
    </tr>
</table>

<!--<div><img src="test.jpg"  height="400" width="400" /></div>-->
</div> <!-- END #profile -->
<script>

$("#table tr").click(function(){
   $(this).addClass('selected').siblings().removeClass('selected');    
   var value=$(this).find('td:first').html();
   var value2=$(this).find('td:nth-child(2)').html();
   //alert(value2);    
});

$('.delete').on('click', function(){
    var filename = $("#table tr.selected td:nth-child(2)").html();
    if(typeof filename !== 'undefined')
    {
        var result = confirm("ARE YOU SURE YOU WANT TO DELETE " + filename +"?");
        if(result)
        {
            delete_js( $("#table tr.selected td:first").html() );
        }
    }
});

//setInterval(function() {window.location.reload();}, 30000); 

/*$('.ok').on('click', function(e){
    alert($("#table tr.selected td:first").html());
});*/

    function edit_js(id)
    {
        console.log("edit " + id);
    }
    function delete_js(f_id)
    {
	$.ajax({ url: 'delete.php',
	         data: {action: 'test', id: f_id },
		 type: 'post',
		 success: function(){
		     
		     location.reload();
		 }
		 
		 });
    }
    function publish_js(id)
    {
        //<?php $_SESSION['f_id'] = 'WAGIC'?>
        //window.location = 'process.php';
        console.log("publish " + id);
    }
</script>
</body>
</html>


