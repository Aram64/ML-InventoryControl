//Global vars
var notify = false;
var list = ["hi", "bye"];
var armed = true;
var InventoryStorage =[];


function Inventory(totalR){
    var table = document.getElementById("inventoryTable");
    var inputVal = totalR;

    if(inputVal != ""){ //if user input is not null adds rows to table
        var rowCount = 1;
        var colCount = 3;
        var AddRows = inputVal - rowCount + 1;
        var h = 0; 
        for(i = 0; i < AddRows; i++){//outer row loop (Generates rows)
            var row = table.insertRow(1); //inserts number of rows designated by user input
            console.log("RowIteration: " + i);
            for(j = 0; j < colCount; j++){ //inner cell loop (Generates inward cells)
            var cell = row.insertCell(j); //inserts cells into the rows/creates columns
            //InventoryStorage[i][j] = h++; //increments internal number stored in array for unquie id assignment
            console.log("Row: " + i + " Column: " + j + " Contents inside array: " + InventoryStorage[i][j] + " "); 
            if(j == 0)
            {
                cell.id = h;
                console.log("This is Cell Number: " + h);
                cell.innerHTML =  InventoryStorage[i][2]; //insets item and number into second column of the table
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
            
            }
        }
    }
}
//gets values from html to build INVENTORY table
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
        temp = i*3;
        InventoryStorage[i][j] = table[j+temp];
    }
  }
  console.log(InventoryStorage);
  var totalrows = count/3;
  Inventory(totalrows);
}
