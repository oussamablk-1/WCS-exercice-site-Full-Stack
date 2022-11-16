document.getElementById("new-member-form").addEventListener("submit",function(e) {
    e.preventDefault();

    var data = new FormData(this); //Récupère de facon automatique toutes les infos du formulaire
    
    var xhr = new XMLHttpRequest();

    //Affiche ce qu'il y'a dans le script.php lorsque l'on apuie sur le bouton envoyer*/
   /*xhr.onreadystatechange = function(){
        if(this.readyState==4 && this.status== 200) {
            console.log(this.response);

            var res = this.response;
            if(res.success == 1){
                console.log("utilisateur inscrit");
            }else {
                alert(res.msg );
            }

        }else if(this.readyState == 4){
            alert("ERREUR (app.js)");
        }
    };

    //test afin de savoir ce que la console retourne lorsque l'on appuie sur le bouton envoyer*/
    /*xhr.onreadystatechange = function(){
        console.log(this);
    };*/

    xhr.open("POST","script.php",true);
    //xhr.responseType = "json";
    xhr.send(data);

    return false;
});
