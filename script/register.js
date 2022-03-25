
document.getElementById('validate_username').style.display="none"  
document.getElementById('validate_psw').style.display="none"
document.getElementById('validate_psw_cnf').style.display="none"
function verified() {
  document.getElementById('validate_username').style.display="none"  
document.getElementById('validate_psw').style.display="none"
document.getElementById('validate_psw_cnf').style.display="none"

  var nameptr = /^[a-zA-Z ]*$/;
  var valpassword =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/;
  if (!document.getElementById("username").value.match(nameptr)) {
    document.getElementById('validate_username').style.display="block"  
    return false;
      
  }
  else if (!document.getElementById("psw").value.match(valpassword)) {
    document.getElementById('validate_psw').style.display="block"
      return false;
  }
else if (!document.getElementById("psw_cnf").value.match(valpassword)) {
  document.getElementById('validate_psw_cnf').style.display="block"
      return false;
  }
else if (
    document.getElementById("psw").value !=
    document.getElementById("psw_cnf").value
  ) {
      alert("Password Does not match")
      return false;
  }
  else
  {
    return true;
  }
}

function deleteChat() {
  fetch('include/delchat.php')
  .then(response => response.text())
  .then(data => {  
    console.log('Success:', data);
  })
}