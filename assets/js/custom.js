$(document).ready(function() {
  $("#submitbtn").click(function(){
      $("#hiddenArea").val($("#editor").html());
      
      }); 
  });



// Terms and conditions checkbox
$("#signup_btn").attr("disabled", true);

$("#agreeCheck").change(function(event){
    if (this.checked){
        $("#signup_btn").attr("disabled", false);
    } else {
        $("#signup_btn").attr("disabled", true);
    }
});

$("#courseFormtrigger1").click(function()
{
  if(validateForm()==True){
    showTab(0);
    currentTab = 0;
  }
});
$("#courseFormtrigger2").click(function()
{
  if(validateForm()==True){
    showTab(1);
    currentTab = 1;
  }
});
$("#courseFormtrigger3").click(function()
{
  if(validateForm()==True){
    showTab(2);
    currentTab = 2;
  }
});
$("#courseFormtrigger4").click(function()
{ 
  if(validateForm()==True){
    showTab(3);
    currentTab = 3;
  }
});

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("bs-stepper-pane fade");
    
    for (i = 0; i < x.length; i++) {
      if(i == n){
        x[i].style.display = "block";
        document.getElementsByClassName("bs-stepper-pane fade")[n].className += " active";
      }
      else{
          x[i].style.display = "none";
      }
    }

    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } 
    else {
      document.getElementById("prevBtn").style.display = "block";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("bs-stepper-pane fade");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = y.length-1; i >= 0; i--) {
    // If a field is empty...
    if (y[i].value == ""){
      y[i].focus();
      // and set the current valid status to false
      valid = false;
    }
  }
  
  return valid; // return the valid status
}

function nextPrev(n) {  
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if(currentTab >= 4){
    document.getElementById("nextBtn").type = "submit";
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step-trigger");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


$(document).ready(function() {
  $("#nextBtn").click(function(){
      $("#hiddenArea").val($("#editor").html());
      
      }); 
  });
  


function del_exp()
{
    alert('Are you sure you want to delete it?');
}