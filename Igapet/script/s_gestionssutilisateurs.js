



function AddHouse(){
	var doc = document.getElementById("autorisation");
	var list = document.getElementById("autorisationList");
	var selecteur = document.getElementById("HouseSelect");
	var txt = selecteur.value;
	
	
	if ((selecteur.selectedIndex == 0))
		return;
	
	var L = list.value.split("-");
	for(var i=0;i<L.length;i++)
	{
		if (L[i] == txt)
			return;
	}
	
	
	var node = document.createElement('div');
	node.className="autorisationBlock";
	node.name=txt;
	node.innerHTML=selecteur.getElementsByTagName('option')[selecteur.selectedIndex].innerHTML;
	
	var del = document.createElement('div');
	del.className = "delete";
	
	node.appendChild(del);
	doc.appendChild(node);
	
	for(var i=0;i<doc.getElementsByClassName('autorisationBlock').length;i++){
		doc.getElementsByClassName('autorisationBlock')[i].addEventListener("click",function(){
			deletion(this);
		});
	}
	if (list.value != "")
		list.value += "-";
	list.value += txt;
	
}

function AddRoom(){
	var doc = document.getElementById("autorisation");
	var list = document.getElementById("autorisationList");
	var selecteur = document.getElementById("RoomSelect");
	var txt = selecteur.value;
	
	
	if ((selecteur.selectedIndex == 0))
		return;
	
	var L = list.value.split("-");
	for(var i=0;i<L.length;i++)
	{
		if (L[i] == txt)
			return;
	}
	
	
	var node = document.createElement('div');
	node.className="autorisationBlock";
	node.name=txt;
	node.innerHTML=selecteur.getElementsByTagName('option')[selecteur.selectedIndex].innerHTML;
	
	var del = document.createElement('div');
	del.className = "delete";
	
	node.appendChild(del);
	doc.appendChild(node);
	
	for(var i=0;i<doc.getElementsByClassName('autorisationBlock').length;i++){
		doc.getElementsByClassName('autorisationBlock')[i].addEventListener("click",function(){
			deletion(this);
		});
	}
	if (list.value != "")
		list.value += "-";
	list.value += txt;
	
	
}

function AddCaptor(){
	var doc = document.getElementById("autorisation");
	var list = document.getElementById("autorisationList");
	var selecteur = document.getElementById("CaptorSelect");
	var txt = selecteur.value;
	
	if ((selecteur.selectedIndex == 0))
		return;
	
	var L = list.value.split("-");
	for(var i=0;i<L.length;i++)
	{
		if (L[i] == txt)
			return;
	}
	

	
	var node = document.createElement('div');
	node.className="autorisationBlock";
	node.name=txt;
	node.innerHTML=selecteur.getElementsByTagName('option')[selecteur.selectedIndex].innerHTML;
	
	var del = document.createElement('div');
	del.className = "delete";
	
	node.appendChild(del);
	doc.appendChild(node);
	
	for(var i=0;i<doc.getElementsByClassName('autorisationBlock').length;i++){
		doc.getElementsByClassName('autorisationBlock')[i].addEventListener("click",function(){
			deletion(this);
		});
	}
	if (list.value != "")
		list.value += "-";
	list.value += txt;
	
	
}
function deletion(elmnt){
	var list = document.getElementById("autorisationList");
	var L = list.value.split("-");
	list.value="";
	for (var i=0;i<L.length;i++)
	{
		if (L[i] != "" && L[i] != elmnt.name)
		{
			if (list.value != "")
				list.value += "-";
			list.value += L[i];
		}
	}
	if (elmnt.parentElement)
		elmnt.parentElement.removeChild(elmnt);
}