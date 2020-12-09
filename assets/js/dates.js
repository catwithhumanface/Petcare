function dates(){
    Today = new Date;
		Jour = Today.getDate();
		Mois = (Today.getMonth())+1;
		Annee = Today.getFullYear();
		Message = "<strong> " + Jour + "/" + Mois + "/" + Annee +"</strong>";
        document.write(Message);
}