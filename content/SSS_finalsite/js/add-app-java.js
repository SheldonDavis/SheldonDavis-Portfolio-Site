// JavaScript Document
onload=init;
function init(){
	//when user tries to leave the name field... validate it
	document.forms[0].a_name.onblur = function(){
		checkEmptyString(this,"feedname");
	}
	document.forms[0].a_price.onblur = function(){
		checkNumber(this,"feedprice");
	}
	document.forms[0].a_describe.onblur = function(){
		checkDescribe(this,"feeddesc");
	}
	document.forms[0].a_thumb.onblur = function(){
		checkThumb(this,"feedthumb");
	}
	document.forms[0].a_large.onblur = function(){
		checkThumb(this,"feedlarge");
	}
	
	//when user submits the form
	document.forms[0].onsubmit = function(){
		return checkSubmit(this);
	}
}
function checkSubmit(myform){
	//if this var is true when returned, form submits
	var ok_to_submit = true;
	//if user filled anything out incorrectly 
	if(!checkEmptyString(myform.a_name,"feedname")){ ok_to_submit = false;} 
	if(!checkNumber(myform.a_price,"feedprice")){ ok_to_submit = false;}
	if(!checkDescribe(myform.a_describe,"feeddesc")){ ok_to_submit = false;}
		
	return ok_to_submit;
}
function checkNumber(fld,feedid){
	//if the string the user typed in that field has no characters 

		fld.style.background="white";//set field to normal appearence
		document.getElementById(feedid).innerHTML="";//set the feedback to blnank
		//set field to a warning appearence
		
		//make feed back text appear on page
		//if a number function on what the user types returns Not a number...
		if(isNaN(Number(fld.value))){
			fld.style.background="yellow";
			document.getElementById(feedid).innerHTML="Must be a number.";//feedback
			//fld.focus();//put focus rihgt back into the field
			return false;//this sends to where function was called, and stops the code 
		}else if(fld.value.length==0){
			fld.style.background="yellow";
			document.getElementById(feedid).innerHTML="Required Field";//feedback
			//fld.focus();//put focus rihgt back into the field
			return false;//this sends to where function was called, and stops the code 
		}//ends if user did something false
		return true;//ends if user did something false
		
	
}
function checkEmptyString(fld,feedid){
	//if the string the user typed in that field has no characters 

		fld.style.background="white";//set field to normal appearence
		document.getElementById(feedid).innerHTML="";//set the feedback to blnank
		//set field to a warning appearence
		
		//make feed back text appear on page
		if(fld.value.length==0){
			fld.style.background="yellow";
			document.getElementById(feedid).innerHTML="Required Field";//feedback
			//fld.focus();//put focus rihgt back into the field
			return false;//this sends to where function was called, and stops the code 
		}//ends if user did something false
		return true;
	
}
function checkDescribe(fld,feedid){
	//if the string the user typed in that field has no characters 

		fld.style.background="white";//set field to normal appearence
		document.getElementById(feedid).innerHTML="";//set the feedback to blnank
		//set field to a warning appearence
		
		//make feed back text appear on page
		if(fld.value.length==0){
			fld.style.background="yellow";
			document.getElementById(feedid).innerHTML="Required Field";//feedback
			//fld.focus();//put focus rihgt back into the field
			return false;//this sends to where function was called, and stops the code 
		}//ends if user did something false
		return true;
	
}

function checkEmail(fld,feedid){
	//if the string the user typed in that field has no characters 

		fld.style.background="white";//set field to normal appearence
		document.getElementById(feedid).innerHTML="";//set the feedback to blnank
		
		//set field to a warning appearence
		
		//make feed back text appear on page
		if(fld.value.length==0){
			fld.style.background="yellow";
			document.getElementById(feedid).innerHTML="Required Field";//feedback
			//fld.focus();//put focus rihgt back into the field
			return false;//this sends to where function was called, and stops the code
			//otherwise if string doesnt have an @ or a period
		} else if ((fld.value.indexOf('@')== -1)||(fld.value.indexOf('.')== -1)){
			fld.style.background="yellow";
			document.getElementById(feedid).innerHTML="Enter a valid price";//feedback
			//fld.focus();//put focus rihgt back into the field
			return false;//this sends to where function was called, and stops the code 
		}//ends if user did something false
		return true;
	
}


function checkThumb(fld,feedid){
	
}











