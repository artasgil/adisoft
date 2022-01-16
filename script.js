// email message script
const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e)=>{
  e.preventDefault();
  statusTxt.style.color = "#000000";
  statusTxt.style.display = "block";
  statusTxt.style.margin= "20px";
  statusTxt.innerText = "Jūsų anketa siunčiama...";
  form.classList.add("disabled");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState == 4 && xhr.status == 200){
      let response = xhr.response;
      if(response.indexOf("Visi laukeliai yra privalomi!") != -1 || response.indexOf("Įrašykite teisingą el. paštą!") != -1 || response.indexOf("Kažkas nutiko, anketos išsiųsti nepavyko! Bandykite dar kartą.") != -1){
        statusTxt.style.color = "red";
      }else{
        form.reset();
        setTimeout(()=>{
          statusTxt.style.display = "none";
        }, 5000);
      }
      statusTxt.innerText = response;
      form.classList.remove("disabled");
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}