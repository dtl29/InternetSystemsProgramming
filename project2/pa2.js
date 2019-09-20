/*
Daniel Louis
Internet Systems Programming Fall 2019
Project 2
*/

function calculator()
{
}

function animation()
{
	
}

function emailCheckWhileTypeing()
{
	var em = document.getElementById("email").value;
    
	document.getElementById("inputEmail").innerHTML = "you're typomg";
}
function emailCheckWhileClicked()
{
    var em = document.getElementById("emailval").value;
       document.getElementById("inputEmail").innerHTML = "clicked me did'ya "+em;
    var str1 = em;
    var str2 = em;
    var str3 = em;
    var pnt = em.search("@");
    var pnt2 = em.search(".");
    
    str1 = str1.slice(pnt);
    str2 = str2.substr(pnt, pnt2);
    str3 = str3.substr(pnt2, str3.length());
    
    document.getElementById("inputEmail").innerHTML = "clicked me did'ya "+em+" " +st1;
    
    if(str1.length() > 0 && str2.length() > 0 && str3.length() > 0)
    {
        document.getElementById("inputEmail").innerHTML = "This is a valide email.";
    }
    else
    {
        document.getElementById("inputEmail").innerHTML = "This is an invalide email.";
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
