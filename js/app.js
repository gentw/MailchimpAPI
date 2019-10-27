$(document).ready(function(){

var index = 0;

var firstName = $('#first').val();
var lastName = $('#last').val();
var email = $('#email').val();
var password = $('#password').val();

var inputArray = document.querySelectorAll('input, textarea, select');;


function cond(){
  for (var i = 0; i < inputArray.length; i++) {
    if(inputArray[i].value === ""){
      index++;
    }
  } 
} 


cond();


$('form').submit( function(e){
  e.preventDefault();
  
  if(index === 1){
          
      if(firstName === ""){
         $('#first').after('first name missing');
         return false;
      }else if(lastName === ""){
         $('#last').after('last name missing');
         return false;
      }else if(email === ""){
        $('#email').after('email missing');
        return false;
      }else if(password === "" || password.length >= 8){
        $('#password').after('password is empty or less than 8 characters');
        return false;
      }  
     
  }else{
      if(firstName === "" || lastName === "" || email === "" || password === ""){
          $('form').after('<h1>error</h1>');
          return false;
      }
  }
      
});


    
});