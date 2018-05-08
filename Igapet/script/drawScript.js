console.log("ICCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCI");
var r;
var c;
var a;
var k = 0;
var str ="";
for(var i=0;i<Rooms.length;i++)
{
	r = Rooms[i];
	str += '<div class="Room" name='+ r["Name"]+ ' style="left:'+r["xPosition"]+'px;top:'+r["yPosition"]+'px;Width:'+r["Width"]+'px;Height:'+r["Height"]+'px;">';
	
	while(captors[k]!= null)
	{
		c= captors[k];
		str += '<div class="Captor"></div>';
		k +=1;
		if (captors[k] != null && captors[k]["RoomID"] != r["RoomID"]) { break; }
	}
	str += r["Name"];
	str += "</div>"
}
document.getElementById("drawing").innerHTML = str;
var es = document.body.querySelectorAll("div.Room");
var k=0

var anchorPoint1 = new Array();
var anchorPoint2 = new Array();
var i=0;
while(es[i] != null)
{
	anchorPoint1[i] = {x:Rooms[i]["xPosition"],y:Rooms[i]["yPosition"]};
	anchorPoint2[i] = {x:(+Rooms[i]["xPosition"] + +Rooms[i]["width"]),y:(+Rooms[i]["yPosition"] + +Rooms[i]["height"])};
	i+=1;
}

while(es[k] != null)
{
	dragElement(es[k],k,Rooms);
	k+=1;
}
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

		posX = e.clientX-getOffsetLeft(elmnt.parentElement);
		posY = e.clientY-getOffsetTop(elmnt.parentElement);
		//posY = +posY + + parseInt(elmnt.style.height);
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
			if (C1.x < 0)
			{
				posX=halfWidth;
			}
			else if (C2.x > elmnt.parentElement.offsetWidth)
			{
				posX = +elmnt.parentElement.offsetWidth - +halfWidth;
			}
			if (C1.y < 0)
			{
				posY = halfHeight;
			}
			else if( C2.y > elmnt.parentElement.offsetHeight)
			{
				posY = +elmnt.parentElement.offsetHeight - +halfHeight;
			}
		}
		posX = posX - halfWidth ;
		posY = posY - halfHeight ;
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

function saveToForm()
{
	e = document.getElementById("SendBox");
	param = "";
	for (var i= 0;i<Rooms.length;i++)
	{
		param += Rooms[i]["RoomID"] + "," + Rooms[i]["xPosition"] + "," + Rooms[i]["yPosition"] + ";";
	}
	e.childNodes[1].defaultValue = param;
}


function getOffsetLeft( elem )
{
    var offsetLeft = 0;
    do {
      if ( !isNaN( elem.offsetLeft ) )
      {
          offsetLeft += elem.offsetLeft;
      }
    } while( elem = elem.offsetParent );
    return offsetLeft;
	
}
function getOffsetTop( elem )
{
    var offsetTop = 0;
    do {
      if ( !isNaN( elem.offsetTop ) )
      {
          offsetTop += elem.offsetTop;
      }
    } while( elem = elem.offsetParent );
    return offsetTop;
	
}
