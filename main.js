//Collapsable Button//
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}


// Search Bar//
const searchInput = document.getElementById("searchInput");
const namesFromDOM = document.getElementsByClassName("name");
searchInput.addEventListener("keyup", (event) => {
  const { value } = event.target;

  const searchQuery = value.toLowerCase();

  for (const nameElement of namesFromDOM) {
  
    let name = nameElement.textContent.toLowerCase();

    if (name.includes(searchQuery)) {
    
      nameElement.style.display = "block";
    } else {
    
      nameElement.style.display = "none";
    }
  }
});
function validateForm() {  
  var pw1 = document.getElementById("pswd1").value;  
  var pw2 = document.getElementById("pswd2").value;  
  var name1 = document.getElementById("fname").value;  
  var name2 = document.getElementById("lname").value;  
  var id = document.getElementById("idnum").value;  
  var spos = document.getElementById("pos").value;  
    
        
    //check empty first name field  
    if(name1 == "") {  
      document.getElementById("blankMsg").innerHTML = "Please enter your full name";  
      return false;  
    }  
      
    //character data validation  
    if(!isNaN(name1)){  
      document.getElementById("blankMsg").innerHTML = "Only characters are allowed";  
      return false;  
    }  
  
   //character data validation  
    if(!isNaN(name2)){  
      document.getElementById("charMsg").innerHTML = "Only characters are allowed";  
      return false;  
    }   

    if(!isNaN(name2)){  
      document.getElementById("blankMsg").innerHTML = "Please enter your username";  
      return false;  
    }   
    
    //check empty password field  
    if(pw1 == "") {  
      document.getElementById("message1").innerHTML = "Please enter your password";  
      return false;  
    }  
    
    //check empty confirm password field  
    if(pw2 == "") {  
      document.getElementById("message2").innerHTML = "Please enter your confirm password";  
      return false;  
    }   
     
    //minimum password length validation  
    if(pw1.length < 8) {  
      document.getElementById("message1").innerHTML = "Password length must be atleast 8 characters";  
      return false;  
    }  
  
    //maximum length of password validation  
    if(pw1.length > 15) {  
      document.getElementById("message1").innerHTML = "Password length must not exceed 15 characters";  
      return false;  
    }  

    //
    if(id == "")
    {
      document.getElementById("idmessage").innerHTML = "Bruh";
      return false;
    }
    if(id == "")
    {
      document.getElementById("posmessage").innerHTML = "Bruh";
      return false;
    }
    if(pw1 != pw2) {  
      document.getElementById("message2").innerHTML = "Passwords are not same";  
      return false;  
    } else {  
      alert ("");  
     
    }  
}
function getPDF(){

  var HTML_Width = $(".canvas_div_pdf").width();
  var HTML_Height = $(".canvas_div_pdf").height();
  var top_left_margin = 15;
  var PDF_Width = HTML_Width+(top_left_margin*2);
  var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
  var canvas_image_width = HTML_Width;
  var canvas_image_height = HTML_Height;
  
  var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
  

  html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
    canvas.getContext('2d');
    
    console.log(canvas.height+"  "+canvas.width);
    
    
    var imgData = canvas.toDataURL("image/jpeg", 1.0);
    var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
      pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
    
    
    for (var i = 1; i <= totalPDFPages; i++) { 
      pdf.addPage(PDF_Width, PDF_Height);
      pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
    }
    
      pdf.save("HTML-Document.pdf");
      });
};