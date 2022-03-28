
document.getElementById('validate_username').style.display="none"  
document.getElementById('validate_psw').style.display="none"
document.getElementById('validate_psw_cnf').style.display="none"
var cnt=0

function logout() {
  window.location.href = "include/logout.php";
}

function update() {
  
if(document.getElementById('update').style.display=="block"){
  document.getElementById('update').style.display="none"; 
}
else
{
  document.getElementById('update').style.display="block";
}
}

function user_online() {
  
  if(document.getElementById('show_online_users').style.display=="block"){
    document.getElementById('show_online_users').style.display="none"; 
  }
  else
  {
    document.getElementById('show_online_users').style.display="block";
  }
  }


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
    cnt+=1;
    update_data();

    return true;
  }
}

function update_data() {
  
  let username=document.getElementById('username').value;
  let Password=document.getElementById('psw').value;



  var url = 'include/update.php';
var formData = new FormData();
formData.append('username', username);
formData.append('Password', Password);


fetch(url, { method: 'POST', body: formData })
.then(response => response.text())
.then(data => {
  console.log('Success:', data);
const myArray = data.split(" ");
console.log("username"+myArray[0]);
console.log("photo"+myArray[1]);
document.getElementById('username_display').innerHTML=myArray[0];
document.getElementById('update').style.display="none"; 



})

  
}


function del() {
  
  fetch('include/del.php')
  .then(response => response.text())
  .then(
window.location.reload()
  );
 
}

var input = document.getElementById("message");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("click1").click();
  }
});

function send(){

  let message=document.getElementById('message').value;
  let id=document.getElementById('id').value;
  document.getElementById('message').value="";





  var url = 'include/send.php';
var formData = new FormData();
formData.append('message', message);
formData.append('id', id);




fetch(url, { method: 'POST', body: formData })
.then(response => response.text())
.then(data => {
  console.log('Success:', data);
const myArray = data.split(" ");
// console.log("username"+myArray[0]);





})
}

function getdata() {

var display

  fetch('include/getdata.php')
  .then(response => response.text())
  .then(data => {
   display=data;
    const myArray = data.split("~~");
    document.getElementById('show').innerHTML='';
    for (let i = 0; i < myArray.length-1; i+=3) {
          document.getElementById('show').innerHTML+='<div><span><b>'+myArray[i]+'</b></span>&nbsp&nbsp<span style="font-size:x-small;">'+myArray[i+2]+'</span></div>';
          document.getElementById('show').innerHTML+='<div><span>'+myArray[i+1]+'</span></div>';          
    
        }
  })


 
setInterval(() => {

  fetch('include/getdata.php')
  .then(response => response.text())
  .then(data => {

    const myArray = data.split("~~");
    if(display!=data)
    {
     let len =myArray.length;
     
    noti(myArray[0],myArray[1]) 
    }
    
  display=data
    document.getElementById('show').innerHTML='';
    for (let i = 0; i < myArray.length-1; i+=3) {
          document.getElementById('show').innerHTML+='<div><span><b>'+myArray[i]+'</b></span>&nbsp&nbsp<span style="font-size:x-small;">'+myArray[i+2]+'</span></div>';
          document.getElementById('show').innerHTML+='<div><span>'+myArray[i+1]+'</span></div>';          
    }
  })
}, 500 );

}

function noti(str1,str2) {
  
  if (!window.Notification) {
      console.log('Browser does not support notifications.');
  } else {
      // check if permission is already granted
      if (Notification.permission === 'granted') {
          // show notification here
          var notify = new Notification(str1, {
              body: str2,
             
          });
      } else {
          // request permission from user
          Notification.requestPermission().then(function (p) {
              if (p === 'granted') {
                  // show notification here
                  var notify = new Notification(str1, {
                      body: str2,
                    
                  });
              } else {
                  console.log('User blocked notifications.');
              }
          }).catch(function (err) {
              console.error(err);
          });
      }
  }
}

function online() {
  var str="";
    fetch('include/online.php')
    .then(response => response.text())
    .then(data => {
        const myArray = data.split("~~");
        var today = new Date();
        var date = today.getFullYear()+'-'+String(today.getMonth()+1).padStart(2,"0")+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes();
        var dateTime = date+' '+time;
        console.log(dateTime);
        


        for (let i = 0; i < myArray.length-1; i+=2) { 
          if (dateTime==myArray[i+1].slice(0,16)) 
          {
            document.getElementById('status').innerHTML+='<tr><td style="color: green;">'+myArray[i]+''
          }
          else
          {
            document.getElementById('status').innerHTML+='<tr><td style="color: yellow;">'+myArray[i]+''
          }
        }  

    })

    setInterval(() => {
      var today = new Date();
      var date = today.getFullYear()+'-'+String(today.getMonth()+1).padStart(2,"0")+'-'+today.getDate();
      var time = today.getHours() + ":" + today.getMinutes();
      var dateTime = date+' '+time;
      console.log(dateTime);
      fetch('include/online.php')
      .then(response => response.text())
      .then(data => {
          const myArray = data.split("~~");
          document.getElementById('status').innerHTML="";
          for (let i = 0; i < myArray.length-1; i+=2) {
            if (dateTime==myArray[i+1].slice(0,16)) 
            {
              document.getElementById('status').innerHTML+='<tr><td style="color: green;">'+myArray[i]+''
            }
            else
            {
              document.getElementById('status').innerHTML+='<tr><td style="color: yellow;">'+myArray[i]+''
            }

          }  

      })
    }, 1000);
}