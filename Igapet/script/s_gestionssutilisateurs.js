
var d= document.querySelectorAll('.userBlock');
for(var i=0;i<d.length;i++)
{
	d[i].querySelector('.delete').addEventListener("click",function(){
		deletionUserType(this);
	});
}


var node = document.createElement('div');
node.className = "userBlock";
node.innerText = "Ajouter un Utilisateur";
document.querySelector(".resume").appendChild(node);


var d= document.querySelectorAll('.userBlock');

for(var i=0;i<d.length;i++)
{
	d[i].addEventListener("click",function(){
		if (d[i] !== event.target) return;
		loadUserType(this);
	},false);
}

if (typeof UserInformation != "undefined")
	loadForm(UserInformation);

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
		doc.getElementsByClassName('autorisationBlock')[i].querySelector('.delete').addEventListener("click",function(){
			deletionHouse(this.parentElement);
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
		doc.getElementsByClassName('autorisationBlock')[i].querySelector('.delete').addEventListener("click",function(){
			deletionCaptor(this.parentElement);
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
	document.getElementById('delinput').value= elmnt.parentElement.attributes.userid.value;
	document.getElementById('delform').submit();

}

function loadUserType(elmnt){
	var f = document.createElement("form");
	f.setAttribute('method','post');
	f.setAttribute('action','index.php?pageAction=v_gestionssutilisateurs');
	
	var p = document.createElement("input");
	var d = "";
	if (elmnt.attributes.userID)
		d = elmnt.attributes.userID.value;
	p.setAttribute('value',d);
	p.setAttribute('Name','LoadFormUserID');
	
	if (elmnt.attributes.userID != undefined)
	{
		console.log("a");
	}
	console.log(elmnt.attributes.userID);
	
	f.appendChild(p);
	document.querySelector('#geressutilisateur').appendChild(f);
	f.submit();
	
}

function loadForm(a){
	console.log(a);
	for (var i=0;i<a.length;i++)
	{
		console.log(a[i]);
	}
	
	
}