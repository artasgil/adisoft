<?php

  if (isset($_POST['confirmation'])) {

  $subject = htmlspecialchars($_POST['name']);
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $cattle = htmlspecialchars($_POST['cattle']);
  $weight = htmlspecialchars($_POST['weight']);
  $age = htmlspecialchars($_POST['age']);
  $color = htmlspecialchars($_POST['color']);
  $other = htmlspecialchars($_POST['other']);


  if(!empty($email) && !empty($name) && !empty($phone) && !empty($cattle) && !empty($weight) && !empty($age) && !empty($color) && !empty($other)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $to = "artas.gilys@gmail.com";


        $body = "";
        
        $body.= "Vardas: ".$name. "\r\n";
        $body.= "Email: ".$email. "\r\n";
        $body.= "Telefonas: ".$phone. "\r\n";
        $body.= "Veislė: ".$cattle. "\r\n";
        $body.= "Svoris: ".$weight. "\r\n";
        $body.= "Amžius: ".$age. "\r\n";
        $body.= "Spalva: ".$color. "\r\n";
        $body.= "Ypatingi požymiai: ".$other. "\r\n";

      if(mail($to, $subject, $body)){
         echo "Jūsų anketa išsiųsta!";
      }else{
         echo "Kažkas nutiko, anketos išsiųsti nepavyko! Bandykite dar kartą.";
      }
    }else{
      echo "Įrašykite teisingą el. paštą!";
    }
    }else{
    echo "Visi laukeliai yra privalomi!";
  }
}else{
    echo "Pažymėkite, jog sutinkate su privatumo politika!";
}
?>