function AddHouse(){
	var doc = document.getElementById("autorisationHouse");
	var list = document.getElementById("autorisationListHouse");
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
		doc.getElementsByClassName('autorisationBlock')[i].querySelector('.delete').addEventListener("click",function(){
			deletionHouse(this.parentElement);
		});
	}
	if (list.value != "")
		list.value += "-";
	list.value += txt;
}


function AddCaptor(){
	var doc = document.getElementById("autorisationCaptor");
	var list = document.getElementById("autorisationListCaptor");
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
		doc.getElementsByClassName('autorisationBlock')[i].querySelector('.delete').addEventListener("click",function(){
			deletionCaptor(this.parentElement);
		});
	}
	if (list.value != "")
		list.value += "-";
	list.value += txt;
	
	
}