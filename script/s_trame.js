
timedfunction();

function timedfunction(){
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			var r = JSON.parse(this.responseText);
			console.log(r);
			for (var i =0;i<r.length;i++){
				var d = document.getElementsByClassName(r[i]["Link"]+r[i]["CaptorNumber"]);
				if (d != null){
					for(var j=0;j<d.length;j++){
						d[j].innerText = parseInt("0x"+r[i]['Value']);
					}
				}
			}
		}
	};
	xmlhttp.open("GET","models/m_request.php",true);
	xmlhttp.send();
	
    setTimeout(timedfunction, 10000);
}

function sendData(c,l,n){
    console.log("test");
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			console.log("done");
		}
	};
	xmlhttp.open("GET","http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM="+l+"&TRAME=1007E29"+n+c,true);
	xmlhttp.send();
}