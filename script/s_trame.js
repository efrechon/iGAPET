
timedfunction();

function timedfunction(){
    console.log("test");
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200){
			console.log(this.responseText);
		}
	};
	xmlhttp.open("GET","models/m_request.php",true);
	xmlhttp.send();

    setTimeout(timedfunction, 10000);
}

function sendData(i){
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
	xmlhttp.open("GET","http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=007E&TRAME=1007E2912"+i,true);
	xmlhttp.send();
}