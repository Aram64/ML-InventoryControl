//Global vars
var notify = false;
var list = ["hi", "bye"];
var armed = true;
var InventoryStorage =[];
var userStorage =[];
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

//Notification message
function notifmessages (){
  
  for(i=0; i<list.length; i++){
    var elmnt = document.createElement("h5");
    var textnode = document.createTextNode(list[i]);
    elmnt.appendChild(textnode);

    var parent = document.getElementById("notifmsgs");
    parent.replaceChild(elmnt, parent.childNodes[i]);
  }
}

function InventoryChange (){

}
//---------------------------------------------------------------------------


//---------Inventory Table update button button------------------------
function updateTimer (){
  armed = true;
  console.log("Alarm status:"+ armed);
  alert('Table has been updated!');
    
}
function alertTimer(){
  armed = false;
  console.log("Alarm status:"+ armed);
  setTimeout(updateTimer, 4000);
}
//-----------------------------------------------------------------------

function TestRun(totalR){
  var table = document.getElementById("UserTable");
  console.log(table);
  var inputVal = totalR;

if(inputVal != ""){ //if user input is not null adds rows to table
        var rowCount = 1;
        var colCount = 3;
        var AddRows = inputVal - rowCount + 1;
        var h = 0; 
        //var userCount = 0;
        for(i = 0; i < AddRows; i++){//outer row loop (Generates rows)
            var row = table.insertRow(1); //inserts number of rows designated by user input
            console.log("RowIteration: " + i);
            //userCount++;
            for(j = 0; j < colCount; j++){ //inner cell loop (Generates inward cells)
            var cell = row.insertCell(j); //inserts cells into the rows/creates columns
            h++; //increments internal number stored in array for unquie id assignment
            console.log("Row: " + i + " Column: " + j + " Contents inside array: " + userStorage[i][j] + " "); 
            if(j == 0)
            {
                cell.id =  h;
                console.log("This is Cell Number: " + h);
                cell.innerHTML = "<input id = \"a" + h + "\" type=checkbox name=\"name"+ h + "\" >" ; //inserts image into first column of table
                console.log("This is the cell id: " + cell.id);
            }
            else if(j == 1)
            {
                cell.id = h;
                console.log("This is Cell Number: " + h);
                cell.innerHTML = userStorage[i][0]; //insets item and number into second column of the table
                console.log("This is the cell id: " + cell.id);
            }
            else if(j == 2)
            {
                cell.id = h;
                console.log("This is Cell Number: " + h);
                cell.innerHTML = userStorage[i][1]; //inserts the quantity of the item into the third column of the table
                console.log("This is the cell id: " + cell.id);
            }
            }
        }
    }
}


function Inventory(totalR){
    var table = document.getElementById("inventoryTable");
    var inputVal = totalR;

    if(inputVal != ""){ //if user input is not null adds rows to table
        var rowCount = 1;
        var colCount = 4;
        var AddRows = inputVal - rowCount + 1;
        var h = 0; 
        for(i = 0; i < AddRows; i++){//outer row loop (Generates rows)
            var row = table.insertRow(1); //inserts number of rows designated by user input
            var imageClass = "<img src = ../Images/imageplaceholder.png id = \"a" + h + "\" class = ImageClass>";
            console.log("RowIteration: " + i);
            for(j = 0; j < colCount; j++){ //inner cell loop (Generates inward cells)
            var cell = row.insertCell(j); //inserts cells into the rows/creates columns
            $(".ImageClass").width(70); //changes width of images
            $(".ImageClass").height(50); //changes the height of the imaged
            h++; //increments internal number stored in array for unquie id assignment
            console.log("Row: " + i + " Column: " + j + " Contents inside array: " + InventoryStorage[i][j] + " "); 
            if(j == 0)
            {
                cell.id =  h;
                console.log("This is Cell Number: " + h);
                cell.innerHTML = "<img src = ../Images/"+InventoryStorage[i][0]+".png class = ImageClass>"; //gets the base image used in first cell
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
                cell.innerHTML =  InventoryStorage[i][1]; //inserts the quantity of the item into the third column of the table
                console.log("This is the cell id: " + cell.id);
            }
            else if(j == 3)
            {
                cell.id = h;
                console.log("This is Cell Number: " + h);
                cell.innerHTML =  InventoryStorage[i][2]-InventoryStorage[i][1]; //insets item and number into second column of the table
                console.log("This is the cell id: " + cell.id);
            }
            }
        }
    }
}
//gets values from html to build table
function printtable(){
  var table= document.getElementById("tabledata").innerHTML;
  table = table.substr(0,table.length-1);
  console.log(table);
  var count = table.split(" ").length;
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
  Inventory(totalrows);
}


//gets values from html to build USER table
function printusertable(){
    var table= document.getElementById("userData").innerHTML;
    table = table.substr(0,table.length-1);
    console.log(table);
    var count = table.split(" ").length;
    console.log(count);
    
    table = table.split(" ", count);
    
    console.log(table);
    
    var i = 0;
    var j = 0;
    var temp = 0;
    for (i = 0; i<count/2;i++ ){
      userStorage[i] = [];
      for (j = 0; j<2;j++ ){
          //tablearr[i][j] = table.split(" ",1);
          temp = i*2;
          userStorage[i][j] = table[j+temp];
      }
    }
    console.log(userStorage);
    var totalrows = count/2;
    TestRun(totalrows);
    
}
