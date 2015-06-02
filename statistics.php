<?php 
    include('session.php');
?>

<html lang="en">
<head>
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
    <title>FreqWear: Content Resource Manager</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
    <script type="text/javascript" src="/var/www/html/JS/easypie/jquery.easy-pie-chart.js"></script> 
    <link href="style.css" rel="stylesheet" type="text/css">
<!--    <link rel="stylesheet" type="text/css" href="/var/www/html/JS/easypie/jquery.easy-pie-chart.css"> -->
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
<script type="text/javascript" src="/JS/easypie/jquery.easy-pie-chart.js"></script>

<link rel="stylesheet"type="text/css" href="/JS/easypie/jquery.easy-pie-chart.css">

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
    <div class="chart" data-percent="73">73%</div>

    <div class="pie-contract-completed" data-percent="55">
         <span>55</span>%</div>
    <div class="pielabel">Completed Contracts</div>

</div>

<script type="text/javascript">
/*$('.chart').easyPieChart({
                animate: 2000,
                scaleColor: false,
                lineWidth: 12,
                lineCap: 'square',
                size: 100,
                trackColor: '#e5e5e5',
                barColor: '#3da0ea'
            });
*/
$(function(){
alert("IN FUNCTION");
            $('.pie-contract-completed').easyPieChart({
                animate: 2000,
                scaleColor: false,
                lineWidth: 12,
                lineCap: 'square',
                size: 100,
                trackColor: '#e5e5e5',
                barColor: '#3da0ea'
            });
	    });
/*
$(function() {
    $('.chart').easyPieChart({
alert("in function");
    
  animate: 1000,
  lineWidth: 4,
  onStep: function(value) {
    this.$el.find('span').text(Math.round(value));
  },
  onStop: function(value, to) {
    this.$el.find('span').text(Math.round(to));
  }
});
});
*/

/*$('.chart').easyPieChart({
  animate: 1000,
  lineWidth: 4,
  onStep: function(value) {
    this.$el.find('span').text(Math.round(value));
  },
  onStop: function(value, to) {
    this.$el.find('span').text(Math.round(to));
  }
});
*/
</script>
</body>
</html>
