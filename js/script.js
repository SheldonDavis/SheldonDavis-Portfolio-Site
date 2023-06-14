// JavaScript Document
document.addEventListener("DOMContentLoaded", function(event) { 
	//DOM has loaded
	window.CurrentPage = '#ABT';
});
 

//function to close or open navigation
function NAV(){
	//select nav element
	let nav = document.querySelector('nav')
	//select menu button
	let menu = document.querySelector('.menu')

	//get window size to stop function if using desktop nav
	let w = window.innerWidth
	//stop and return
	if(w>1280){return false}

	//USE 'classList.TOGGLE' FOR EVERTYTHING 
	//to make sure states stay in sync	
	if(nav.classList.contains('closed')){//nav is currently closed
		//hide/show nav element
		nav.classList.toggle('hidden');
		setTimeout(function(){
			//animate nav opacity
			nav.classList.toggle('opaque');
			setTimeout(function(){
				//change icon between "X" and list icon
				menu.classList.toggle('close');
				//close/open  slideout drawer animation on nav text
				nav.classList.toggle('closed');
			},50);
		}, 10);
	}else{//nav somethign other than closed
		setTimeout(function(){
			//hide/show nav element
			nav.classList.toggle('hidden');
		}, 500);
		//change icon between "X" and list icon
		menu.classList.toggle('close');
		//close/open  slideout drawer animation on nav text
		nav.classList.toggle('closed');
		//animate nav opacity
		nav.classList.toggle('opaque');
	}
}
function colorToggle(){
	//select body element
	let body = document.querySelector('body')
	//add or remove lightMode class
	body.classList.toggle('light')
}
function newPage(pageName){
	let newPageName = pageName;
	let selNewPage = document.querySelector(newPageName)
	let selCurrPage = document.querySelector(CurrentPage)

	if(newPageName === CurrentPage){
		//open/close NAV
		NAV();
	}else{
		//open/close nav
		NAV();
		//begin animation timeouts
		setTimeout(function(){
			//adjust which is hidden and shown
			selCurrPage.classList.remove('show');
			selCurrPage.classList.add('hide');
			setTimeout(function(){
				//set active panel
				selCurrPage.classList.remove('active');
				selNewPage.classList.add('active');
				setTimeout(function(){
					//setup css classes for later transitions
					selNewPage.classList.add('show');
					selCurrPage.classList.remove('hide');
					//change current page variable for next reference
					CurrentPage = newPageName;
				}, 75);
			}, 300);
		},250);
	}
	return false;
}