

function requestData(){
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
	xmlhttp.open("GET","models/request.php",true);
	xmlhttp.send();

    setTimeout(requestData, 5000);
}

requestData();