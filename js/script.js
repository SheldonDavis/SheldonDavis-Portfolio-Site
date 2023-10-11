// JavaScript Document
document.addEventListener("DOMContentLoaded", function(event) { 
	//DOM has loaded
	window.CurrentPage = '#ABT';
	
	
	updateSpaceVariables()
	positionFloaters()
	window.floaterInterval = setInterval(positionFloaters,1)
	clearInterval(floaterInterval)


});

window.addEventListener("resize", (event) => {
	//console.log('resized')
	updateSpaceVariables()
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
	if(w>=768){
		return false
	}


	//USE 'classList.TOGGLE' FOR EVERYTHING 
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
	}else{//nav something other than closed
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

//toggle light-dark mode
function colorToggle(){
	//select body element
	let body = document.querySelector('body')
	//add or remove lightMode class
	body.classList.toggle('light')
}

//animate page content to view selected page item.
function newPage(pageName,e){
	let newPageName = pageName;
	let selNewPage = document.querySelector(newPageName)
	let selCurrPage = document.querySelector(CurrentPage)
	let clckd = e.srcElement
	let currentPageLink = document.querySelector('.CurPage')
	if(newPageName === CurrentPage){
		//open/close NAV
		NAV();
	}else{
		currentPageLink.classList.remove('CurPage')
		clckd.classList.add('CurPage')
		//change current page variable for next reference
		CurrentPage = newPageName;
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
					clearInterval(floaterInterval)
					if(newPageName==='#PRO'){
						updateSpaceVariables()
						positionFloaters()
						floaterInterval = setInterval(positionFloaters,5000)
						positionFloaters()
					}
				}, 75);
			}, 300);
		},250);
	}

	return false;
}

//random movement function?
function updateSpaceVariables(){
	let w = window.innerWidth
	//stop and return
	if(w<=768){
		return false
	}
	titleHeight = document.querySelector('.Page.active .PageContent h1').clientHeight
	spaceHeight = window.innerHeight-100-titleHeight
	spaceWidth = document.querySelector('.Page.active .PageContent').clientWidth
	
	document.querySelector('.space').style.width=spaceWidth+'px'
	document.querySelector('.space').style.height=spaceHeight+'px'
}

//assign floaters random Positions
function positionFloaters(){
	let w = window.innerWidth
	//stop and return
	if(w<=768){
		return false
	}
	let floaters = document.querySelectorAll('.active .PageContent .space .floater')
	for (const floater of floaters){
		console.log(floater.innerText)
		let x = randomX()
		let y = randomY()
		floater.style.left = (x)+'px'
		floater.style.top = (y)+'px'
	}
}


function randomX(){
	//get a random X coordinate
	return Math.floor(Math.random()*(spaceWidth-100))
}

function randomY(){
	//get a random Y coordinate
	return Math.floor(Math.random()*(spaceHeight-100))
}