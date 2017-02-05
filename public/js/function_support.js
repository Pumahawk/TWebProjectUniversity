$("#loginForm").submit(function(event){
	event.preventDefault();
	var email = $("#loginForm #email").val();
	var password = $("#loginForm #password").val();
	
	$.post("?request=loginForm",{
		email:email,
		password:password
	}, function(data){
		data = JSON.parse(data);
		if(data["message"] == "error"){
			$("#loginForm #errorMessage").html("Nome <strong>utente</strong> o <strong>password</strong> sbagliati.");
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
		error += "Il <strong>nome</strong> deve essere compreso tra i 5 e i 15 caratteri.<br>";
	if(cognome.length<5 | cognome.length > 15)
		error += "Il <strong>cognome</strong> deve essere compreso tra i 5 e i 15 caratteri.<br>";
	if(!validateEmail(email))
		error += "<strong>Email</strong> non valida.<br>";
	if(password.length<5 | password.length > 15)
		error += "La <strong>password</strong> deve essere compresa tra i 5 e i 15 caratteri.<br>";
	if(indirizzo.length<5 | indirizzo.length > 30)
		error += "L'<strong>indirizzo</strong> deve essere compreso tra i 5 e i 30 caratteri.<br>";
	
	if(error != ""){
		$("#registrazioneForm #errorMessage").html(error);
		$("#registrazioneForm #errorMessage").show();
	}
	else
		$.post("?request=registrationJSON",{
			nome:nome,
			cognome:cognome,
			email:email,
			password:password,
			indirizzo:indirizzo
		}, function(data){
			data = JSON.parse(data);
			if(data["message"] == "error"){
				$("#registrazioneForm #errorMessage").html("Errore nella registrazione");
				$("#registrazioneForm #errorMessage").show();
			}
			else window.location.replace(".");
		});
});
$("#modificaUtenteForm").submit(function(event){
	event.preventDefault();
	var nome = $("#modificaUtenteForm #nome").val();
	var cognome = $("#modificaUtenteForm #cognome").val();
	var email = $("#modificaUtenteForm #email").val();
	var indirizzo = $("#modificaUtenteForm #indirizzo").val();
	var error = "";

	if(nome.length<5 | nome.length > 15)
		error += "Il <strong>nome</strong> deve essere compreso tra i 5 e i 15 caratteri.<br>";
	if(cognome.length<5 | cognome.length > 15)
		error += "Il <strong>cognome</strong> deve essere compreso tra i 5 e i 15 caratteri.<br>";
	if(!validateEmail(email))
		error += "La <strong>password</strong> deve essere compresa tra i 5 e i 15 caratteri.<br>";
	if(indirizzo.length<5 | indirizzo.length > 30)
		error += "L'<strong>indirizzo</strong> deve essere compreso tra i 5 e i 30 caratteri.<br>";
	
	if(error != ""){
		$("#modificaUtenteForm #errorMessage").html(error);
		$("#modificaUtenteForm #errorMessage").show();
	}
	else
		$.post("?request=modificaUtenteJSON",{
			nome:nome,
			cognome:cognome,
			email:email,
			indirizzo:indirizzo
		}, function(data){
			data = JSON.parse(data);
			if(data["message"] == "error"){
				$("#modificaUtenteForm #errorMessage").html("Impossibile modificare i propri dati.");
				$("#modificaUtenteForm #errorMessage").removeClass("alert-success");
				$("#modificaUtenteForm #errorMessage").addClass("alert-danger");
				$("#modificaUtenteForm #errorMessage").show();
			}
			else{
				$("#modificaUtenteForm #errorMessage").html("Dati modificati con successo");
				$("#modificaUtenteForm #errorMessage").removeClass("alert-danger");
				$("#modificaUtenteForm #errorMessage").addClass("alert-success");
				$("#modificaUtenteForm #errorMessage").show();
			}
		});
});

$(".btn-visualizza-prodotto").click(function (event){
	var id = $(this).attr("data-id");
	$.get("?request=getInfoProd&id=" + id, function(data){
		data = JSON.parse(data);
		$("#productView #titleProduct").html(data["titolo"]);
		$("#productView #img").html("<img src = '?request=openImg&img="+data["immagine"]+"' >");
		$("#productView #description").html(data["descrizione"]);
		$("#productView #price").html(data["prezzo"])
		$("#productView #id").html(data["id"]);
		$("#addToCart").attr("data-id", data["id"]);
	});
});

$("#addToCart").click(function (event){
	var id = $(this).attr("data-id");
	$.get("?request=addProductToCart&id=" + id, function(data){
		data = JSON.parse(data);
		if(data["message"] == "error"){
			alert("error");
		}else{
			window.location.href = ".";
		}
	});
});

$(".removeFromCart").click(function(event){
	var id = $(this).attr("data-id");
	$.get("?request=removeProductfromCart&id=" + id, function(data){
		data = JSON.parse(data);
		if(data["message"] == "error"){
			alert("error");
		}else{
			window.location.href = ".";
		}
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