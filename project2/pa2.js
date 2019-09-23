/*
Daniel Louis
Internet Systems Programming Fall 2019
Project 2
*/
function time()
{
	var d = new Date();
	document.getElementById("time").innerHTML += d;
}
function animation(event)
{
	var anim = document.getElementById("anim");
	var desX = event.clientX;
	var desY = event.clientY;
	var posLeft = 0;
	var posTop = 0;
	var intTer = setInterval(frame,100);

	function frame()
	{
		if(posLeft >= desX && posTop >= desY)
		{
			clearInterval(inTer);
		}
		if(posLeft < desX)
		{
			posLeft += desX/100;
			anim.style.left = posLeft;
		}
		if(posTop < desY)
		{
			posTop += desY/100;
			anim.style.top = posTop;
		}
	}
}

function emailCheckWhileTyping()
{
	var em = document.getElementById("email").value;
    var pos = em.search("@");
	var str1 = em.substr(0,pos);
	var str2 = em.slice(pos+1);
	var pos2 = str2.indexOf(".");
	var str3 = str2.slice(pos2+1);
	var str2 = str2.substr(0, pos2);
		
	if(str1.match(/^[0-9a-zA-Z]+$/) == null || str1.length < 0)
	{
		document.getElementById("inputEmail").innerHTML = "<p>Invalid <br/>Please have no extra special characters.<br/>And needs to contain 1 '@' symbol and 1 '.' <br/><br/></p>";	
	}
	else if(str2.match(/^[0-9a-zA-Z]+$/) == null || str2.length < 0)
	{
		document.getElementById("inputEmail").innerHTML = "<p>Invalid <br/>Please have no extra special characters after the '@'.<br/>And needs to contain 1 '@' symbol and 1 '.'  <br/><br/></p>";
	}
	else if((str3.length > 3) || str3.length < 0 || (str3.match(/^[0-9a-zA-Z]+$/) == null))
	{
		document.getElementById("inputEmail").innerHTML = "<p>Invalid<br/>The ending should be no more than 3 charaters long.<br/>Please have no extra special characters.<br/>And needs to contain 1 '@' symbol and 1 '.' <br/><br/></p>";
	}
	else
	{
		document.getElementById("inputEmail").innerHTML = "<p>The entered email is valid<br/><br/></p>";
	}
}

function emailCheck()
{
	var em = document.getElementById("emailval").value;
    	var pos = em.search("@");
	var str1 = em.substr(0,pos);
	var str2 = em.slice(pos+1);
	var pos2 = str2.indexOf(".");
	var str3 = str2.slice(pos2+1);
	var str2 = str2.substr(0, pos2);
		
	if(str1.match(/^[0-9a-zA-Z]+$/) == null || str1.length < 0)
	{
		document.getElementById("inputEmail2").innerHTML = "<p>Invalid <br/>Please have no extra special characters.<br/>And needs to contain 1 '@' symbol and 1 '.' </p>";	
	}
	else if(str2.match(/^[0-9a-zA-Z]+$/) == null || str2.length < 0)
	{
		document.getElementById("inputEmail2").innerHTML = "<p>Invalid <br/>Please have no extra special characters after the '@'.<br/>And needs to contain 1 '@' symbol and 1 '.'  </p>";
	}
	else if((str3.length > 3) || str3.length < 0 || (str3.match(/^[0-9a-zA-Z]+$/) == null))
	{
		document.getElementById("inputEmail2").innerHTML = "<p>Invalid<br/>The ending should be no more than 3 charaters long.<br/>Please have no extra special characters.<br/>And needs to contain 1 '@' symbol and 1 '.' </p>";
	}
	else
	{
		document.getElementById("inputEmail2").innerHTML = "<p>The entered email is valid</p>";
	}
}
function factorialCalc()
{
	var num = document.getElementById("number").value;
	var fac = num;
	if(isNaN(num) || num < 0)
	{
		document.getElementById("number").value = "Invalid input!";
	}
	else if(num == 0)
	{
		fac = 1;
		document.getElementById("number").value = fac;
	}
	else
	{
		while(num > 1)
		{
			num -= 1;
			fac = fac*num;	
		}
		document.getElementById("number").value = fac;
	}
}