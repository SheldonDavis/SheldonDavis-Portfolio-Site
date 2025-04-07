//* JS scripting for sheldondavis.onrender.com
//* author: Sheldon Davis
document.addEventListener("DOMContentLoaded", function(event) { 
	//*DOM has loaded
	window.CurrentPage = 'ABT';

	//* stop the anchor links from reloading page on click
	PreventDefaultNav()

	
	//*turn on light mode if user has perviously set site to light mode
	if(getCookie('lights')==='on'){document.querySelector('body').classList.add('light')}
	
	window.params = new URLSearchParams(window.location.search)
	if(params.get('l')){
		CurrentPage = params.get('l');
	}
	newPage(CurrentPage,true)
	
});

//* function to prevent the default event handling of the anchors within the navigation section
function PreventDefaultNav(){
	//* create array of all internally navigating links
	let anchorList = document.querySelectorAll('nav a.internalLink')
	//* loop through and add event listeners to each link
	anchorList.forEach(anchor=>{
		anchor.addEventListener("click", function(event) { 
			event.preventDefault();
			
		})
	})
}

//*function to close or open navigation
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

//*toggle light-dark mode
function colorToggle(){
	//select body element
	let body = document.querySelector('body')
	let mode = getCookie('lights')	
	//add or remove lightMode class and adjust cookie for next reload of page
	if(mode==='on'){//turn the lights off
		setCookie('lights','off')
		body.classList.remove('light')
	}else{//turn the lights on
		setCookie('lights','on')
		body.classList.add('light')
	}
}

//*animate page content to view selected page item.
function newPage(pageName,onload = false){
	if(params.get('l') !== pageName){
		params.set('l',pageName)	
		let newurl = window.location.origin + window.location.pathname + '?' + params.toString();
		window.history.pushState({path: newurl}, '', newurl);

	}else if(newPage===''){
		return false
	}
	let newPageName = pageName;
	let selNewPage = document.querySelector('#'+newPageName)
	let selCurrPage = document.querySelector('#'+CurrentPage)
	let clckd = document.querySelector('#'+newPageName+'_link')//e.srcElement
	let currentPageLink = document.querySelector('.CurPage')

	if(onload){
		clckd.classList.add('CurPage');
		selNewPage.classList.add('active');
		selNewPage.classList.add('show');
		return;
	}

	if(newPageName === CurrentPage){
		//*open/close NAV
		NAV();
	}else{
		currentPageLink.classList.remove('CurPage')
		clckd.classList.add('CurPage')
		//*change current page variable for next reference
		CurrentPage = newPageName;
		//*open/close nav
		NAV();
		//*begin animation timeouts
		setTimeout(function(){
			//*adjust which is hidden and shown
			selCurrPage.classList.remove('show');
			selCurrPage.classList.add('hide');
			setTimeout(function(){
				//*set active panel
				selCurrPage.classList.remove('active');
				selNewPage.classList.add('active');
				setTimeout(function(){
					//*setup css classes for later transitions
					selNewPage.classList.add('show');
					selCurrPage.classList.remove('hide');
					
				}, 75);
			}, 300);
		},250);
	}

	return false;
}

//*set a cookie, default to 30 day expiration
function setCookie(name, value, time=30){
	const d = new Date()
	d.setTime(d.getTime()+time*24*60*60*1000)
	let duration  = "expires="+d.toUTCString()

	document.cookie = name + '=' + value + ';' + duration + ';'
}

//*retrieve a cookie by its name
function getCookie(cookieName){
	let name = cookieName+'='
	let ca = document.cookie.split(';')
	for(let i = 0; i<ca.length;i++){
		let c = ca[i]
		while(c.charAt(0)===' '){
			c=c.substring(1)
		}
		if(c.indexOf(name)===0){
			return c.substring(name.length, c.length)
		}
	}
	return false
}
