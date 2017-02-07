//-------------------START PRODUCT AREA------------------------

class Product{
	static addToCart(id, success, error){
		$.get("?request=addProductToCart&id=" + id, function(data){
			data = JSON.parse(data);
			if(data["message"] != "success"){
				error(data);
			}else{
				success(data);
			}
		});
	}
	
	static addToView(id){
		$.get("?request=getInfoProd&id=" + id, function(data){
			data = JSON.parse(data);
			$("#productView #titleProduct").html(data["titolo"]);
			$("#productView #img").html("<img src = '?request=openImg&img="+data["immagine"]+"' >");
			$("#productView #description").html(data["descrizione"]);
			$("#productView #price").html(data["prezzo"])
			$("#productView #id").html(data["id"]);
			$("#addToCart").attr("data-id", data["id"]);
		});
	}
	
	static removeFromCart(id, success, error){
		$.get("?request=removeProductfromCart&id=" + id, function(data){
			data = JSON.parse(data);
			if(data["message"] != "success"){
				error(data);
			}else{
				success(data);
			}
		});
	}
	
	static buyCart(success, error){
		$.get("?request=buy", function(data){
			data = JSON.parse(data);
			if(data["message"] == "success")
				success(data);
			else
				error(data);
		})
	}
}

//---------------------END PRODUCT AREA------------------------

//----------------------START USER AREA------------------------

class User{
	static login(email, password, success, error){
		$.post("?request=loginForm",{
			email:email,
			password:password
		}, function(data){
			data = JSON.parse(data);
			if(data["message"] != "success"){
				error(data);
			}
			else success(data);
		});
	}
	
	static registration(nome, cognome, email, password, indirizzo, success, error){
		$.post("?request=registrationJSON",{
			nome:nome,
			cognome:cognome,
			email:email,
			password:password,
			indirizzo:indirizzo
		}, function(data){
			data = JSON.parse(data);
			if(data["message"] != "success"){
				error(data);
			}
			else success(data);
		});
	}
	
	static edit(nome,cognome,email,indirizzo, success, error){
		$.post("?request=modificaUtenteJSON",{
			nome:nome,
			cognome:cognome,
			email:email,
			indirizzo:indirizzo
		}, function(data){
			data = JSON.parse(data);
			if(data["message"] != "success")
				error(data);
			else
				success(data);
		});
	}
}

//-----------------------END USER AREA----------------------

//----------------------START ORDER AREA------------------------

class Order{
	static viewOrder(id){
		$.get("?request=getProdOrder&id=" + id, function(data){
			$("#listProductOrder").html(data);
		});
	}
	
	static setToCons(id){
		$.get("?request=setCons&id=" + id, function(data){
			window.location.href = "?request=manageOrders";
		});
	}
}

//-----------------------END ORDER AREA----------------------


//---------------START JQUERY FUNCTIONS----------------------

$("#loginForm").submit(function(event){
	event.preventDefault();
	var email = $("#loginForm #email").val();
	var password = $("#loginForm #password").val();
	
	User.login(email, password, function(){
		window.location.replace(".");
	},
	function(){
		$("#loginForm #errorMessage").html("Nome <strong>utente</strong> o <strong>password</strong> sbagliati.");
		$("#loginForm #errorMessage").show();
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
	if(password.length<5 | password.length > 15)
		error += "La <strong>password</strong> deve essere compresa tra i 5 e i 15 caratteri.<br>";
	if(indirizzo.length<5 | indirizzo.length > 30)
		error += "L'<strong>indirizzo</strong> deve essere compreso tra i 5 e i 30 caratteri.<br>";
	
	if(error != ""){
		$("#registrazioneForm #errorMessage").html(error);
		$("#registrazioneForm #errorMessage").show();
	}
	else
		User.registration(nome, cognome, email, password, indirizzo, function(){
			window.location.replace(".");
		}, function(message){
			$("#registrazioneForm #errorMessage").html("Errore nella registrazione: "+ message["text"]);
			$("#registrazioneForm #errorMessage").show();
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
	if(indirizzo.length<5 | indirizzo.length > 30)
		error += "L'<strong>indirizzo</strong> deve essere compreso tra i 5 e i 30 caratteri.<br>";
	
	if(error != ""){
		$("#modificaUtenteForm #errorMessage").html(error);
		$("#modificaUtenteForm #errorMessage").removeClass("alert-success");
		$("#modificaUtenteForm #errorMessage").addClass("alert-danger");
		$("#modificaUtenteForm #errorMessage").show();
	}
	else
		User.edit(nome,cognome,email,indirizzo, function(){
			$("#modificaUtenteForm #errorMessage").html("Dati modificati con successo");
			$("#modificaUtenteForm #errorMessage").removeClass("alert-danger");
			$("#modificaUtenteForm #errorMessage").addClass("alert-success");
			$("#modificaUtenteForm #errorMessage").show();
		}, function(){
			$("#modificaUtenteForm #errorMessage").html("Impossibile modificare i propri dati.");
			$("#modificaUtenteForm #errorMessage").removeClass("alert-success");
			$("#modificaUtenteForm #errorMessage").addClass("alert-danger");
			$("#modificaUtenteForm #errorMessage").show();
		});
});

$(".btn-visualizza-prodotto").click(function (event){
	var id = $(this).attr("data-id");
	Product.addToView(id);
});

$("#addToCart").click(function (event){
	var id = $(this).attr("data-id");
	Product.addToCart(id,function(){
		window.location.href = ".";
	},
	function(){
		alert("error");
	})
});

$(".removeFromCart").click(function(event){
	var th = this;
	var id = $(this).attr("data-id");
	Product.removeFromCart(id, function(){
		var price = Number($(th).parent().parent().prev().find(".priceProduct").html());
		$(th).parent().parent().prev().remove();
		$(th).parent().parent().remove();
		$("#counterCart").html(Number($("#counterCart").html()) - 1);
		$("#totalPrice").html(Number($("#totalPrice").html()) - price);
		
	},function(){
		alert("Impossibile rimuovere il prodotto dal carrello");
	});
});

$("#byCartButton").click(function(event){
		Product.buyCart(function(){
			window.location.href = ".";
		}, function(){
			$("#byCartButton").popover("show");
		});
});


$(".btn-visualizza-ordine").click(function (event){
	var id = $(this).attr("data-id");
	Order.viewOrder(id);
});

$(".set-to-cons").click(function (event){
	var id = $(this).attr("data-id");
	Order.setToCons(id);
});