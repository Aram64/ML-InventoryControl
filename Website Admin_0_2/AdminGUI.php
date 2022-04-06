<?php
  session_start();
  if (!isset($_SESSION['clientName'])) {
    header('location:../index.html');
    exit();
  }else{
    $clientName = $_SESSION['clientName'];
    $tableValue = $_SESSION['tableData'];
    $userTable = $_SESSION['userData'];
    $notification = $_SESSION['notif'];
    $notificationimg = $_SESSION['notifimg'];
    //echo "<script type='text/javascript'>alert('$clientName');</script>"
  }
?>
<html>
<head>
    <title>AdminGUI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="AdminGUIstyle.css">
    <!--<link rel="stylesheet" href= "AdminGUI.js">-->
    <link rel="icon" href="../Images/logoicon.ico">
    <script src="AdminGUI.js"></script>
    <script src="https://code.jquery.com/jquery-git.js"></script>
</head>
<body>

<div class = "header"> 
<?php
  echo "<h1>Welcome ".$clientName."!</h1>";
?>
</div>

<!--TABLE-->
<form method = "post" action = "removeuser.php">
<table id = "UserTable" class = "UserTableClass">
<caption>List of Users</caption>
<tr>
  <th class = "selection"> Select </th>
  <th>User Name</th>
  <th>Account Email</th>
</tr>
</table>
<!--Remove Button for table-->
<br><button type = "submit">Remove User</button>
</form>

<br>
<br>
<br>
<br>

<div>
<!--TABLE-->
<!-- table-->
<table class = "tablecenter" id = "inventoryTable"> 
  <caption> Inventory List:</caption>
  <tr>
    <th>Preview</th>
    <th>List of items</th>
    <th>Number of items</th>
    <th class="red-text">Missing</th>
  </tr>
    
</table>
<br>
<div>
<!--<button type="button" onclick="printtable()"> Show Table</button>..... onclick="Iventory()"-->

<form method = "get" action="tabledata.php">
    <button class = "submitBtn">Update Table</button>
</form>


</div>
<form action="updateInventory.php">
<button type="submit"> Update Inventory</button>
</form>
<br>
<br>

<form method = "get" action="updateLogs.php">
    <button class = "submitBtn">Check Log</button>
</form>
<!--<input type="text" placeholder="Type " id="adminInputId" class="adminInputClass">
<button type="button" onclick="TestRun()"> Add Row</button>-->
</div>
  

<!-- notification window -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close"></span>
    <div class = "notifbox" id = "notifmsg">
      <h3 class = "titleNotif">Notifications</h3>
      <div id= "notifmsgs">
        <h5><?php echo $notification?></h5>
        <h5></h5>
        <h5></h5>
        <h5></h5>

      </div>

    </div>
  </div>

</div>


<section class = "notification"> 
  <img id="myBtn" src = <?php echo "../Images/notificationicon".$notificationimg.".png"?> height = "30" width = "30"></img></a>

<selection class="dropdownMenu">
    <form method = "get" action="../logout.php">
    <input type="image" src="../Images/logout.png" height = "30" width = "30" border="0" alt="Submit" />
    </form>

  
</selection>
</selection>




<script>
  ///////////////////////////////////////////////////////
  /*This is the notification pop up window */
  
  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks on the button, open the modal
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

<div>
  <?php
    echo "<p id = \"tabledata\" class = \"hide-me\">$tableValue</p>";
  ?>
  <?php
    echo "<p id = \"userData\" class = \"hide-me\">$userTable</p>";
  ?>
</div>

</body>
</html>
<script type = "text/javascript"> 
printusertable();
printtable();
</script>
