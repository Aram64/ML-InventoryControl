<?php
  session_start();
  if (!isset($_SESSION['clientName'])) {
    header('location:../index.html');
    exit();
  }else{
    $clientName = $_SESSION['clientName'];
    $tableValue = $_SESSION['tableData'];
    //$tableValue2 = $_SESSION['tableData2'];
    if (isset($_SESSION['Notification'])){
        $Notify = $_SESSION['Notification'];
        $NotifyNot = $_SESSION['NotificationNotProcessed'];
    }else{
        $Notify = "";
        $NotifyNot = "";
    }
    
    #echo "<script type='text/javascript'>alert('$clientName');</script>"
  }
?>
<!Doctype HTML>
<html>
<head>
    <title>ClientGUI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="ClientGUIstyle.css">
    <!--<link rel="stylesheet" href= "ClientScript.js">-->
    <link rel="icon" href="../Images/logoicon.ico">
    <script src="ClientScript.js"></script>
    <script src="https://code.jquery.com/jquery-git.js"></script>
    
    
</head>
<body>
<div class = "header"> 
<?php
  echo "<h1 class = \"white-text\">Welcome ".$clientName."!</h1>";
?>
<h2 class = "white-text">Search Through Our Available Items!</h3>
</div>


<!-- table -->

<form action="checkout.php" method = "get" >
<table  class = "tablecenter" id = "tablecenter"> 
    <caption> Available Items:</caption>
    <tr>
      <th>Preview</th>
      <th>Name of items</th>
      <th>Available</th>
      <th>Quantity</th>
    </tr>
    
  </table>

 <!--Submit Button for table    onclick = checkInventory()-->
  <br>
 
    <button type="submit" class = "checkoutBtn" >Check Out</button>
</form>
  
 <!--AddRow Button for table
 <input type="text" placeholder="Type " id="inputId" class="inputClass">
 <button type="button" onclick="addRow()"> Add Row</button>
 -->
 <div>
 <!--DeleteRow Button for table-->
 <form method = "get" action="tabledata.php">
    <br>
    <button>Refresh Table</button>
  </form>
</div>



<!-- notification window -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close"></span>
    <div class = "notifbox" id = "notifmsg">
      <h3 class = "titleNotif">Notifications</h3>
      <div id= "notifmsgs">
        <h5><?php echo "Hello ".$clientName;?></h5>
        <h5><?php echo $Notify."\n";?></h5>
        <h5><?php echo $NotifyNot;?></h5>
        <h5></h5>

      </div>

    </div>
  </div>

</div>


<section class = "notification"> 
  <img id="myBtn" src = "../Images/notificationicon.png" height = "30" width = "30"></img></a>


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
    //echo "<p id = \"tabledata2\" class = \"hide-me\">$tableValue2</p>";
  ?>
  
</div>
  
</body>
</html>

<script type = "text/javascript"> 
printtable();
</script>