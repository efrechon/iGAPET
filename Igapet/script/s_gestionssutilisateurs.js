


function AddHouse(){
	var doc = document.getElementById("autorisation");
	var list = document.getElementById("autorisationList");
	var selecteur = document.getElementById("HouseSelect");
	
	if ((selecteur.selectedIndex == 0))
		return;
	var L = list.value.split("-");
	for(var i=0;i<L.length;i++)
	{
		if (L[i] == "H"+selecteur.value)
			return;
	}
	var doc = document.getElementById("autorisation");
	doc.innerHTML += "<div class=autorisationBlock value=H"+selecteur.value+">" + selecteur.getElementsByTagName('option')[selecteur.selectedIndex].innerHTML +"<div class=plus>+</div></div>";
	
	list.value += "-H" + selecteur.value;
	
	
}

function AddRoom(){
	var doc = document.getElementById("autorisation");
	var list = document.getElementById("autorisationList");
	var selecteur = document.getElementById("RoomSelect");
	
	if ((selecteur.selectedIndex == 0))
		return;
	var L = list.value.split("-");
	for(var i=0;i<L.length;i++)
	{
		if (L[i] == "R"+selecteur.value)
			return;
	}
	var doc = document.getElementById("autorisation");
	doc.innerHTML += "<div class=autorisationBlock value=R"+selecteur.value+">" + selecteur.getElementsByTagName('option')[selecteur.selectedIndex].innerHTML +"</div>";
	
	list.value += "-R" + selecteur.value;
	
	
}

function AddCaptor(){
	var doc = document.getElementById("autorisation");
	var list = document.getElementById("autorisationList");
	var selecteur = document.getElementById("CaptorSelect");
	
	if ((selecteur.selectedIndex == 0))
		return;
	var L = list.value.split("-");
	for(var i=0;i<L.length;i++)
	{
		if (L[i] == "C"+selecteur.value)
			return;
	}
	var doc = document.getElementById("autorisation");
	doc.innerHTML += "<div class=autorisationBlock value=H"+selecteur.value+">" + selecteur.getElementsByTagName('option')[selecteur.selectedIndex].innerHTML +"</div>";
	
	list.value += "-C" + selecteur.value;
	
	
}