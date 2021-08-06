function validateform(){
    var erreur ;
    var nom = document.getElementById("name");
    var lastname = document.getElementById("lastname");
    var mail = document.getElementById("mail");
    let msg = document.forms["valid"]["message"];
    if (!msg.value) {
        erreur = "Enter your message please"
    }
    if (!mail.value) {
        erreur = "Enter your mail please!"
    }
    if (!lastname.value) {
        erreur = "Enter your lastname please!"
    }
    if (!nom.value) {
        erreur = "Enter your name please!"
    }
    if (erreur){
        
        document.getElementById("erreur").innerHTML = erreur;
        return false;
      } else {
         return true;
      }  
    
}
