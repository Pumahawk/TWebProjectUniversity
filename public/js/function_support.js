$("#loginForm").submit(function(event){
	event.preventDefault();
	var email = $("#loginForm #email").val();
	var password = $("#loginForm #password").val();
	
	$.post("?request=loginForm",{
		nome:nome,
		cognome:cognome,
		email:email,
		password:password,
		indirizzo:indirizzo
	}, function(data){
		data = JSON.decode(data);
		if(data["message"] == "error"){
			$("#loginForm #errorMessage").html("Nome utente o password sbagliati.");
			$("#loginForm #errorMessage").show();
		}
		else window.location.replace(".");
	});

});
$("#registrazioneForm").submit(function(event){
	event.preventDefault();
	var nome = $("#registrazioneForm #nome").val();
	var cognome = $("#registrazioneForm #cognome").val();
	var email = $("#registrazioneForm #email").val();
	var password = $("#registrazioneForm #password").val();
	var indirizzo = $("#registrazioneForm #indirizzo").val();
	var error = "";

	if(nome.length<5 | nome.length > 15)
		error += "Il nome deve essere compreso tra i 5 e i 15 caratteri.<br>";
	if(cognome.length<5 | cognome.length > 15)
		error += "Il cognome deve essere compreso tra i 5 e i 15 caratteri.<br>";
	if(!validateEmail(email))
		error += "Email non valida.<br>";
	if(password.length<5 | password.length > 15)
		error += "La password deve essere compresa tra i 5 e i 15 caratteri.<br>";
	if(indirizzo.length<5 | indirizzo.length > 30)
		error += "L'indirizzo deve essere compreso tra i 5 e i 30 caratteri.<br>";

	$("#registrazioneForm #errorMessage").html(error);
	$("#registrazioneForm #errorMessage").show();
	
	$.post("?request=registration",{
		nome:nome,
		cognome:cognome,
		email:email,
		password:password,
		indirizzo:indirizzo
	}, function(data){
		data = JSON.decode(data);
		if(data["message"] == "error"){
			$("#registrazioneLogin #errorMessage").html("Errore nella registrazione");
			$("#registrazioneLogin #errorMessage").show();
		}
		else window.location.replace(".");
	});
});

function setClickOnProduct(){
	$("pulsanteProdottoVista").click(function(event){
		$(this).attr("data-id"); // TODO da continuare
	});
}
setClickOnProduct();

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}