//<!---signup modal-->

  function signupfun(){
    ///////////////////////////////////////////////////////
    /*This is the notification pop up window */
    // Get the modal
    var modal = document.getElementById("signupModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("signupBtn");
  
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];  
    
    modal.style.display = "block";
  
    
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
  }

//Signup input
function SC(){
  var username_SU = document.getElementById("username_SU").value;
  var email_SU = document.getElementById("email_SU").value;
  var email_CSU = document.getElementById("email_CSU").value;
  var password_SU = document.getElementById("password_SU").value;
  var password_CSU = document.getElementById("password_CSU").value;
  console.log(username_SU + ", " + email_SU + ", " + email_CSU + ", " + password_SU + ", " + password_CSU);
  alert(username_SU + ", " + email_SU + ", " + email_CSU + ", " + password_SU + ", " + password_CSU)
}
  

//<!---login modal-->


function loginfun(){
  ///////////////////////////////////////////////////////
  /*This is the notification pop up window */
  // Get the modal
  var modal = document.getElementById("loginModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("loginBtn");
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks on the button, open the modal

  modal.style.display = "block";

  
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
}
//login input
function LC(){
  var email_LI = document.getElementById("email_LI").value;
  var password_LI = document.getElementById("password_LI").value;
  //console.log(email_LI + ", " + password_LI );
  //alert(email_LI + ", " + password_LI );
}


