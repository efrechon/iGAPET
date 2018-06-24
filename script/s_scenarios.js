function AjHouse(){
	var doc = document.getElementById("selectionH");
	var list = document.getElementById("selectionHList");
	var selecteur = document.getElementById("HouseSelect");
	if ((selecteur.selectedIndex == 0))
		return;
	var L = list.value.split("-");
	for(var i=0;i<L.length;i++)
	{
		if (L[i] == "Hs"+selecteur.value)
			return;
	}
	doc.innerHTML += "<div class=autorisationBlock value=Hs"+selecteur.value+">" + selecteur.getElementsByTagName('option')[selecteur.selectedIndex].innerHTML +"<div class=plus></div></div>";
	
	list.value += "-Hs" + selecteur.value;
}


function AjRoom(){
	var doc = document.getElementById("selectionH");
	var list = document.getElementById("selectionRList");
	var selecteur = document.getElementById("RoomSelect");
	if ((selecteur.selectedIndex == 0))
		return;
	var L = list.value.split("-");
	for(var i=0;i<L.length;i++)
	{
		if (L[i] == "Rs"+selecteur.value)
			return;
	}
	doc.innerHTML += "<div class=autorisationBlock value=Rs"+selecteur.value+">" + selecteur.getElementsByTagName('option')[selecteur.selectedIndex].innerHTML +"<div class=plus></div></div>";
	
	list.value += "-Rs" + selecteur.value;
	
	
}