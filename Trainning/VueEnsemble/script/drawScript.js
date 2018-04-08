function dragElement(elmnt,k,Rooms) {
	var pos1 = 0, pos2 = 0;
	elmnt.onmousedown = dragMouseDown;
	function dragMouseDown(e) {
		e = e || window.event;
		document.onmouseup = closeDragElement;
		document.onmousemove = elementDrag;
	}
	function elementDrag(e) {
		var rad = 20;
		e = e || window.event;
		// calculate the new cursor position:
		posX = e.clientX-elmnt.parentElement.offsetLeft;
		posY = e.clientY-elmnt.parentElement.offsetTop;
		// set the element's new position:
		for (var i = 0; i < anchorPoint1.length; i++) {
			if (i == k)
			{
				continue;
			}
			var a = anchorPoint1[i];
			var b = anchorPoint2[i];
			var halfWidth = parseInt(elmnt.style.width) / 2;
			var halfHeight = parseInt(elmnt.style.height) / 2;
			C1 = {x:+posX - +halfWidth ,y:+posY - +halfHeight };
			C2=  {x:+posX + +halfWidth ,y:+posY + +halfHeight };
			if (C1.x < +b.x + +rad && C1.x > +b.x - +rad) // left side to right
			{
				posX= +b.x + +halfWidth;
			}
			else if (C2.x < +a.x + +rad && C2.x > +a.x - +rad) // right side to left
			{
				posX= +a.x - +halfWidth;
			}
			else if (C2.x < +b.x + +rad && C2.x > +b.x - +rad) // right side to right
			{
				posX= +b.x - +halfWidth;
			}
			else if (C1.x < +a.x + +rad && C1.x > +a.x - +rad) // left side to left
			{
				posX= +a.x + +halfWidth;
			}
			if (C1.y < +b.y + +rad && C1.y > +b.y - +rad) // top side to bottom
			{
				posY= +b.y + +halfHeight;
			}
			else if (C2.y < +a.y + +rad && C2.y > +a.y - +rad) // bottom side to top
			{
				posY= +a.y - +halfHeight;
			}
			else if (C1.y < +a.y + +rad && C1.y > +a.y - +rad) // top side to top
			{
				posY= +a.y + +halfHeight;
			}
			else if (C2.y < +b.y + +rad && C2.y > +b.y - +rad) // bottom side to bottom
			{
				posY= +b.y - +halfHeight;
			}
		}
		posX = posX - parseInt(elmnt.style.width) / 2 ;
		posY = posY - parseInt(elmnt.style.height) / 2 ;
		elmnt.style.left = posX + "px";
		elmnt.style.top = posY + "px";
		Rooms[k]["xPosition"] = posX;
		Rooms[k]["yPosition"] = posY;
		anchorPoint1[k] = {x:Rooms[k]["xPosition"],y:Rooms[k]["yPosition"]};
		anchorPoint2[k] = {x:(+Rooms[k]["xPosition"] + +Rooms[k]["width"]),y:(+Rooms[k]["yPosition"] + +Rooms[k]["height"])};
		
	}
	function closeDragElement() {
		/* stop moving when mouse button is released:*/
		document.onmouseup = null;
		document.onmousemove = null;
	}
}
function saveToForm2()
{
	
	var xhr = new XMLHttpRequest();
	var url = "SaveFloor.php";
	/*
	var param = new Array();
	for (var i=0;i<Rooms.length;i++)
	{
		param[i] = JSON.stringify(Rooms[i]);
	}
	*/
	param = "";
	for (var i= 0;i<Rooms.length;i++)
	{
		param += Rooms[i]["Name"] + "," + Rooms[i]["xPosition"] + "," + Rooms[i]["yPosition"] + ",";
	}
	param = JSON.stringify(param);
	console.log(param);
	xhr.open("POST",url,true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function() {//Call a function when the state changes.
	if(xhr.readyState == 4 && xhr.status == 200) {
			alert(xhr.responseText);
		}
	}
	/*
	for (var i=0;i<param.length;i++)
	{
		xhr.send(param);
	}
	*/
	xhr.send(param);		
	
}
function saveToForm()
{
	e = document.getElementById("SendBox");
	param = "";
	for (var i= 0;i<Rooms.length;i++)
	{
		param += Rooms[i]["RoomID"] + "," + Rooms[i]["xPosition"] + "," + Rooms[i]["yPosition"] + ";";
	}
	e.childNodes[0].defaultValue = param;		
}