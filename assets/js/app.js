document.getElementById("valid").addEventListener("submit" , function(e){
    e.preventDefault();
    var erreur ;
    var nom = document.getElementById("name");
    var lastname = document.getElementById("lastname");
    var mail = document.getElementById("mail");
    var country = document.getElementById("country");
    if (!country.value) {
        erreur = "Enter your country please!"
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
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
      } else {
         alert('Formulaire envoyé !');
      }  
    });
