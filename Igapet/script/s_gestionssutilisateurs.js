

var d= document.getElementsByClassName('userBlock');
for(var i=0;i<d.length;i++)
{
	d[i].getElementsByClassName('delete')[0].addEventListener("click",function(){
		deletionUserType(this);
	});
}

function AddHouse(){
	var doc = document.getElementById("autorisation");
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
		doc.getElementsByClassName('autorisationBlock')[i].addEventListener("click",function(){
			deletionHouse(this);
		});
	}
	if (list.value != "")
		list.value += "-";
	list.value += txt;
	
}

function AddCaptor(){
	var doc = document.getElementById("autorisation");
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
		doc.getElementsByClassName('autorisationBlock')[i].addEventListener("click",function(){
			deletionCaptor(this);
		});
	}
	if (list.value != "")
		list.value += "-";
	list.value += txt;
	
	
}
function deletionHouse(elmnt){
	var list = document.getElementById("autorisationListHouse");
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
function deletionCaptor(elmnt){
	var list = document.getElementById("autorisationListCaptor");
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

function deletionUserType(elmnt){
	if (!window.confirm("êtes vous sur de supprimer cet utilisateur?"))
		return;
	
	console.log(elmnt.parentElement);
	elmnt.parentElement.remove();

	document.getElementById('delinput').value= elmnt.parentElement.innerHTML;
	document.getElementById('delform').form.submit;
	
		
	
}