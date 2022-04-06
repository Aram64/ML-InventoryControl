<?php
  session_start();
  if (!isset($_SESSION['clientName'])) {
    header('location:../index.html');
    exit();
  }else{
    $clientName = $_SESSION['clientName'];
    $logData = $_SESSION['logData'];
    //echo "<script type='text/javascript'>alert('$clientName');</script>"
  }
?>
<html>
<head>
    <title>AdminGUI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="ItemLogsStyle.css">
    <link rel="icon" href="../../Images/logoicon.ico">
    <script src="ItemLogsScript.js"></script>
</head>
<body>

<div class = "header"> 

<h1>Inventory Logs</h1>

</div>

<!--TABLE-->
<!-- table-->
<table class = "tablecenter" id = "inventoryTable"> 
  <caption> Inventory Logs:</caption>
  <tr>
    <th>Item Modification Date/Time</th>
    <th>Item Name</th>
    <th>Number of items</th>
  </tr>
    
</table>
<br>
<form method = "get" action="../tabledata.php">
  <button type = "submit">Return</button>
</form>

<form method = "get" action="../updateLogs.php">
  <button type = "submit">Refresh logs</button>
</form>

</body>
</html>

<?php
    echo "<p id = \"tabledata\" class = \"hide-me\">$logData</p>";
?>
<script>printtable()</script>
