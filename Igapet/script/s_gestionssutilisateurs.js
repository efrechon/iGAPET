
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
		if (this !== event.target) return;
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
	console.log(L);
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
	p.setAttribute('type','hidden');
	
	f.appendChild(p);
	document.querySelector('#geressutilisateur').appendChild(f);
	f.submit();
	
}

function loadForm(a){
	
	document.querySelector('#P1').parentElement.removeChild(document.querySelector('#P1'));
	document.querySelector('#P2').parentElement.removeChild(document.querySelector('#P2'));
	document.querySelector('#P3').parentElement.removeChild(document.querySelector('#P3'));
	document.querySelector('#P0').parentElement.removeChild(document.querySelector('#P0'));
	document.querySelector('#sender').attributes.value.value = "modifier";
	for (var key in a)
	{
		
		if (!a.hasOwnProperty(key)) continue;
		
		switch(key){
			case "Name":
				document.querySelector('#N').setAttribute('value',a[key]);
				break;
			case "UserTypeID":
			case "ParentUserID":
			case "ManageUsers":
				if (a[key] == 1)
				document.querySelector('#MU').checked = true;
				break;
			case "AddScenarios":
				if (a[key] == 1)
				document.querySelector('#AS').checked = true;
				break;
			case "AddNotifications":
				if (a[key] == 1)
				document.querySelector('#AN').checked = true;
				break;
			case "ConsultNotifications":
				if (a[key] == 1)
				document.querySelector('#CN').checked = true;
				break;
			case "ManageHouses":
				if (a[key] == 1)
				document.querySelector('#MH').checked = true;
				break;
			case "CustomAutorisationsHouse":
				document.querySelector('#autorisationListHouse').setAttribute('value',a[key]);
				break;
			case "CustomAutorisationsCaptor":
				document.querySelector('#autorisationListCaptor').setAttribute('value',a[key]);
				break;
			case "UserID":
				var i = document.createElement('input');
				i.setAttribute('type','hidden');
				i.setAttribute('value',a[key]);
				i.setAttribute('Name',key);
				document.querySelector('#form').appendChild(i);
				break;
				
			
			
		}
	}
	loadAutorisationFromH(a);
}


function loadAutorisationFromH(UserInf){
	if (document.querySelector('#autorisationListHouse').attributes.value.value != "")
	{
		var a = document.querySelector('#autorisationListHouse').attributes.value.value.split("-");
		console.log(a);
		for(var i in a)
		{
			var node = document.createElement('div');
			node.className = "autorisationBlock";
			node.name = a[i];
			node.innerHTML = UserInf[a[i]];
			var del = document.createElement('div');
			del.className = "delete";
			
			node.appendChild(del);
			document.querySelector('#autorisation').appendChild(node);
		}
	}
	
	if (document.querySelector('#autorisationListCaptor').attributes.value.value != "")
	{
		var a = document.querySelector('#autorisationListCaptor').attributes.value.value.split("-");
		console.log(a);
		for(var i in a)
		{
			var node = document.createElement('div');
			node.className = "autorisationBlock";
			node.name = a[i];
			node.innerHTML = UserInf[a[i]];
			
			var del = document.createElement('div');
			del.className = "delete";
			
			node.appendChild(del);
			document.querySelector('#autorisation').appendChild(node);
		}
	}
	
	for(var i=0;i<document.getElementById("autorisation").getElementsByClassName('autorisationBlock').length;i++){
		document.getElementById("autorisation").getElementsByClassName('autorisationBlock')[i].querySelector('.delete').addEventListener("click",function(){
			deletionHouse(this.parentElement);
		});
	}
	for(var i=0;i<document.getElementById("autorisation").getElementsByClassName('autorisationBlock').length;i++){
			document.getElementById("autorisation").getElementsByClassName('autorisationBlock')[i].querySelector('.delete').addEventListener("click",function(){
		deletionCaptor(this.parentElement);
	});
	}
	
}