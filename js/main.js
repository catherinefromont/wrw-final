//validation of all inputs and selections

function validate() {

  var name = validateName();
  var email = validateEmail();
  var phoneno = phonenumber();
  var content = validateContent();
  


  if (name && email && phoneno && content){

    return true;
  }
  return false;
}

//name 

function validateName() {
  fullName = document.getElementById('name');
  pos1 = fullName.indexOf(" ")
  pos2 = fullName.indexOf("@")
  pos3 = fullName.indexOf(".")
  if (pos1 >= 0 && pos2 < 0 && pos3 < 0 && fullName.length > 2 && fullName.length <40 && !parseInt(fullName)){
    
    document.getElementById('nameError').innerHTML = "This is a <span class='green'>valid name</span>";

    return true;
  }
  else
  {
    document.getElementById('nameError').innerHTML = "Please enter a <span class='red'>valid first</span> and <span class='red'>last</span> name";

    return false;
  }
}




//email

function validateEmail() {
  mailAddress = document.getElementById('email').value;
  pos1 = mailAddress.indexOf("@")
  pos2 = mailAddress.indexOf(".")
  if (pos1 >= 0 && pos2 >= 0 && mailAddress.length <100){
    
    document.getElementById('emailError').innerHTML = "This is a <span class='green'>valid email address</span>";
    return true;
  }
  else
  {
    document.getElementById('emailError').innerHTML = "Please enter a <span class='red'>valid email address</span>";
    return false;
  }
}


function phonenumber()
{
  inputtxt = document.getElementById('phoneno').value;
  var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
  if(inputtxt.match(phoneno)){
        
      document.getElementById('phoneError').innerHTML = "This is a <span class='green'>valid phone number</span>";
      return true;
        }
      else
        {
        document.getElementById('phoneError').innerHTML = "Please enter a <span class='red'>valid phone number</span>";
        return false;
        }
}



function validateContent() {
  content = document.getElementById('content').value;
  pos1 = content.indexOf(" ")
  
  if (pos1 >= 1 && content.length > 2 && content.length <=200) {
    
    document.getElementById('contentError').innerHTML = "This is <span class='green'>valid content</span>";
    
    return true;
  }
  else
  {
    document.getElementById('contentError').innerHTML = "Please enter <span class='red'>valid content</span>";

    return false;
  }
}

