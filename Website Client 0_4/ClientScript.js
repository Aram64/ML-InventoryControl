//Global vars
var notify = false;
var list = ["hi", "bye"];
var armed = true;
var InventoryStorage =[];
//Notifications----------------------------------------------------
//Notification icon update
console.log("Alarm status:"+ armed);

function notifIcon(){
  if(notify){
  document.getElementById('myBtn').src = "../Images/notificationicon1.png";
  notifmessages(list);
  }
  else{
   document.getElementById('myBtn').src = "../Images/notificationicon.png";

   for(i=0; i<list.length; i++){
    var elmnt = document.createElement("h5");
    var textnode = document.createTextNode("");
    var textnode1 = document.createTextNode("No new notifications");
    elmnt.appendChild(textnode);

    var parent = document.getElementById("notifmsgs");
    if(i==0){
      elmnt.appendChild(textnode1);
    }
    else{
      elmnt.appendChild(textnode);
    }
    parent.replaceChild(elmnt, parent.childNodes[i]);
  }

  }

}
function addRow(totalR) {
    /*
    var table = document.getElementById("tablecenter");
    let inputVal = document.getElementsByClassName("inputClass")[0].value;
    if (inputVal == "") { //check if input is null, does not make a change
        alert("Row Number must be given");
        return false;
    }*/
    var table = document.getElementById("tablecenter");
    var inputVal = totalR;

    if(inputVal != ""){ //if user input is not null adds rows to table
        /*
        $.fn.rowCount = function() { //jquery for row count
            return $('tr', $(this).find('tbody')).length;
        };
        
        $.fn.columnCount = function() { //jquery for column count
            return $('th', $(this).find('tbody')).length;
        };
        //var rowCount = $('#tablecenter').rowCount(); //stores number of rows
        var rowCount = 1;
        //var colCount = $('#tablecenter').columnCount(); //stores the number of columns
        var colCount = 4;
        var AddRows = inputVal - rowCount + 1; //ensures current added rows does not excede input value

      // Create one dimensional array
      
      var InventoryStorage = new Array(AddRows*colCount); 
                
      // Loop to create 2D array using 1D array 
      for(var i = 0; i < InventoryStorage.length; i++) { 
        InventoryStorage[i] = new Array(AddRows*colCount);
      }
      */
      var rowCount = 1;
      var colCount = 4;
      var AddRows = inputVal - rowCount + 1;
      
      var h = 0; 
      
      for(i = 0; i < AddRows; i++){//outer row loop (Generates rows)
          var row = table.insertRow(1); //inserts number of rows designated by user input
          var imageClass = "<img src = ../Images/imageplaceholder.png class = ImageClass>"; //gets the base image used in first cell
  
          console.log("RowIteration: " + i);
          for(j = 0; j < colCount; j++){ //inner cell loop (Generates inward cells)
            var cell = row.insertCell(j); //inserts cells into the rows/creates columns
            $(".ImageClass").width(70); //changes width of images
            $(".ImageClass").height(50); //changes the height of the imaged
            //InventoryStorage[i][j] = h++; //increments internal number stored in array for unquie id assignment
            h++;
            console.log("Row: " + i + " Column: " + j + " Contents inside array: " + InventoryStorage[i][j] + " "); 
            if(j == 0)
            {
              cell.id =  h;
              console.log("This is Cell Number: " + h);
              cell.innerHTML = "<img src = ../Images/"+InventoryStorage[i][0]+".png class = ImageClass>"; //inserts image into first column of table
              console.log("This is the cell id: " + cell.id);
            }
            else if(j == 1)
            {
              cell.id = h;
              console.log("This is Cell Number: " + h);
              cell.innerHTML = InventoryStorage[i][0]; //insets item and number into second column of the table
              console.log("This is the cell id: " + cell.id);
            }
            else if(j == 2)
            {
              cell.id = h;
              console.log("This is Cell Number: " + h);
              cell.innerHTML = InventoryStorage[i][2]; //inserts the quantity of the item into the third column of the table
              console.log("This is the cell id: " + cell.id);
            }
            else if(j == 3)
            {
              cell.id = h;
              console.log("This is Cell Number: " + h);
              cell.innerHTML = "<input name = \"a" + h + "\" id = \"a" + h + "\" type = \"number\" min =\"0\" value = \"0\" class = inputAmount >"; 
              
              //insets textbox into the fourth column of the table
              console.log("This is the cell id: " + cell.id);
            }
          }
        }
        var k = 0;
        for(i = 0; i < AddRows; i++)
        {
          for(j = 0; j < colCount; j++)
          {
            k++;
            console.log(InventoryStorage[i][j]);
            console.log("ID Number: " + k );
          }
        } 
      }
  }

  function checkInventory()
  {//Inventory update based on user input
  $.fn.rowCount = function() { //jquery for row count
    return $('tr', $(this).find('tbody')).length;
  };
  $.fn.columnCount = function() { //jquery for column count
    return $('th', $(this).find('tbody')).length;
  };
  var rowCount = $('#tablecenter').rowCount(); //stores number of rows
  var colCount = $('#tablecenter').columnCount(); //stores the number of columns
  var available = 0;
  var quantity = 0;
  var availableR = 0;
  var quantitySlot = "";
  var updateQuantity = 0;
  rowCount = rowCount - 1;
  for(i = 0; i < rowCount; i++)
  {
    for(j = 0; j < colCount; j++)
    {
      availableR++;
      if(availableR%4 == 3)
      {
      available = document.getElementById(availableR).innerText;
      quantityR = availableR; //sets quantity equal to available to help sift for all textbox input boxes
      quantityR++; // adds 1 to quantity to get next available cell in the table to get textbox slot
      console.log("Available: " + availableR); //prints id slot of available
      console.log("Quantity: " + quantityR); //prints id slot of quanity
      quantitySlot = "a" + quantityR;
      console.log(quantitySlot);
      console.log(document.getElementById(quantitySlot).value);
      quantity=document.getElementById(quantitySlot).value;
      
      updateQuantity = available - quantity;
      
      if((updateQuantity > 0)||(updateQuantity == 0))
      {
        console.log("inside");
        document.getElementById(availableR).innerText = updateQuantity;
      }
            
      document.getElementById(quantitySlot).value = "";
      }
    }
  }
   console.log("Exit Checkout Function"); 
  }
        
  function deleteRow(){ //delete table row
    var table = document.getElementById("tablecenter");
    var y = document.getElementById("tablecenter").rows.length;
    if(y > 1)
    {
      var deleteRow = table.deleteRow(y-1);   
    }
  }

function printtable(){
  var table= document.getElementById("tabledata").innerHTML;
  table = table.substr(0,table.length-1);
  console.log(table);
  count = table.split(" ").length;
  console.log(count);
  
  table = table.split(" ", count);
  
  console.log(table);
  
  var i = 0;
  var j = 0;
  var temp = 0;
  for (i = 0; i<count/3;i++ ){
    InventoryStorage[i] = [];
    for (j = 0; j<3;j++ ){
        //console.log("yo");
        //tablearr[i][j] = table.split(" ",1);
        temp = i*3;
        InventoryStorage[i][j] = table[j+temp];
    }
  }
  console.log(InventoryStorage);
  var totalrows = count/3;
  addRow(totalrows);
}