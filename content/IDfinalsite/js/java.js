// JavaScript Document
onload=init;
function init(){
	updateCart();	
}


function updateCart(){
	var cprice=0;
	var fprice=0;
	var iprice=0;
	var mprice=0;
	
	if(sessionStorage.catName){
		document.getElementById("cat_name").innerHTML=sessionStorage.catName;
		cprice = Number(sessionStorage.catPrice).toFixed(2);
		document.getElementById("cat_price").innerHTML = cprice;
	}
	if(sessionStorage.flaveName){
		document.getElementById("flavor_name").innerHTML=sessionStorage.flaveName;
		fprice = Number(sessionStorage.flavePrice).toFixed(2);
		document.getElementById("flavor_price").innerHTML = fprice;
	}
	if(sessionStorage.icingName){
		document.getElementById("icing_name").innerHTML=sessionStorage.icingName;
		iprice = Number(sessionStorage.icingPrice).toFixed(2);
		document.getElementById("icing_price").innerHTML = iprice;
	}
	
	if(sessionStorage.messName){
		document.getElementById("message").innerHTML=sessionStorage.messName;
		mprice = Number(sessionStorage.messPrice).toFixed(2);
		document.getElementById("message_price").innerHTML = mprice;
	}

	
	document.getElementById("cart_total").innerHTML=(Number(cprice) + Number(fprice) + Number(iprice) + Number(mprice)).toFixed(2);
}
function del(thislink){
	if(!confirm('Do you wish to clear this item?')){
		return;
	}
		 
	switch(thislink.id){
		case 'cat_clear':
			sessionStorage.catName ='-';
			sessionStorage.catPrice = 0 ;
		break;
		
		case 'flavor_clear':
			sessionStorage.flaveName ='-';
			sessionStorage.flavePrice = 0;
		break;
		
		case 'icing_clear':
			sessionStorage.icingName ='-';
			sessionStorage.icingPrice = 0;
		break;
		
		case 'message_clear':
			sessionStorage.messName ='-';
			sessionStorage.messPrice = 0;
		break;
		
	}
	updateCart();
}



function chosecake(){
	sessionStorage.catName="Cake";
	sessionStorage.catPrice=5;
	updateCart();
}
function chosecup(){
	sessionStorage.catName="Cupcakes";
	sessionStorage.catPrice=8;
	updateCart();
}
function choseice(){
	sessionStorage.catName="Icecream Cake";
	sessionStorage.catPrice=10;
	updateCart();
}


function chosechoco(){
	sessionStorage.flaveName="Chocolate";
	sessionStorage.flavePrice=2;
	updateCart();
}
function chosevan(){
	sessionStorage.flaveName="Vanilla";
	sessionStorage.flavePrice=1.50;
	updateCart();
}


function chosechcicing(){
	sessionStorage.icingName="Chocolate";
	sessionStorage.icingPrice=1.50;
	updateCart();
}
function chosepbicing(){
	sessionStorage.icingName="Peanutbutter";
	sessionStorage.icingPrice=2;
	updateCart();
}
function chosevnicing(){
	sessionStorage.icingName="Vanilla";
	sessionStorage.icingPrice=1.50;
	updateCart();
}


function choseCustom(){
	
	sessionStorage.messName="Custom";
	sessionStorage.messPrice=5;
	updateCart();
}
function choseGrad(){
	sessionStorage.messName="Graduation";
	sessionStorage.messPrice=2;
	updateCart();
}
function choseBirth(){
	sessionStorage.messName="Birthday";
	sessionStorage.messPrice=2;
	updateCart();
}
function choseWedd(){
	sessionStorage.messName="Wedding";
	sessionStorage.messPrice=2;
	updateCart();
}






