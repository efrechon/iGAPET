var r;
var c;
var a;
var k = 0;
var str ="";
var sav ="";
for(var i=0;i<Rooms.length;i++)
{
	r = Rooms[i];
	if (r["xPosition"] != 0)
	{
		str += '<div class="Room" name='+ r["Name"]+ ' style="position:absolute;left:'+r["xPosition"]+'px;top:'+r["yPosition"]+'px;Width:'+r["Width"]+'px;Height:'+r["Height"]+'px;">';
		str += r["Name"];
		str += "</div>";
	}
	else
	{
		sav += '<div class="Room" name='+ r["Name"]+ ' style="position:relative;left:'+r["xPosition"]+'px;top:'+r["yPosition"]+'px;Width:'+r["Width"]+'px;Height:'+r["Height"]+'px;">';
	}
}
document.getElementById("drawingedition").innerHTML = str;
var es = document.body.querySelectorAll("div.Room");
var k=0

var anchorPoint1 = new Array();
var anchorPoint2 = new Array();
var i=0;
while(es[i] != null)
{
	anchorPoint1[i] = {x:Rooms[i]["xPosition"],y:Rooms[i]["yPosition"]};
	anchorPoint2[i] = {x:(+Rooms[i]["xPosition"] + +Rooms[i]["Width"]),y:(+Rooms[i]["yPosition"] + +Rooms[i]["Height"])};
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
		var rad = 10;
		e = e || window.event;
		// calculate the new cursor position:
		posX = (e.clientX-getOffsetLeft(elmnt.parentElement))/document.getElementById("drawingedition").style.zoom;
		posY = (e.clientY-getOffsetTop(elmnt.parentElement))/document.getElementById("drawingedition").style.zoom;
		//posY = +posY + + parseInt(elmnt.style.height);
		// set the element's new position:
		for (var i = 0; i < anchorPoint1.length; i++) {
			var halfWidth = parseInt(elmnt.style.width) / 2;
			var halfHeight = parseInt(elmnt.style.height) / 2;
			C1 = {x:+posX - +halfWidth ,y:+posY - +halfHeight };
			C2=  {x:+posX + +halfWidth ,y:+posY + +halfHeight };
			if (i == k)
			{
				continue;
			}
			var a = anchorPoint1[i];
			var b = anchorPoint2[i];
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
			if (C1.x < 0) // leftside
			{
				posX=halfWidth;
			}
			else if (C2.x > elmnt.parentElement.parentElement.offsetWidth) // right side
			{
				posX = +elmnt.parentElement.parentElement.offsetWidth - +halfWidth;
			}
			if (C1.y < 0) // bottom side
			{
				posY = halfHeight;
			}
			else if( C2.y > elmnt.parentElement.offsetHeight) // top side
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
		anchorPoint2[k] = {x:(+Rooms[k]["xPosition"] + +Rooms[k]["Width"]),y:(+Rooms[k]["yPosition"] + +Rooms[k]["Height"])};
		
	}
	function closeDragElement() {
		/* stop moving when mouse button is released:*/
		document.onmouseup = null;
		document.onmousemove = null;
		if (C2.x > elmnt.parentElement.offsetWidth) // right side
		{
			elmnt.style.position="relative";
			elmnt.style.left="0";
			elmnt.style.top="0";
			elmnt.style.margin="2% auto";
			elmnt.parentElement.removeChild(elmnt);
			document.getElementById("drawingHolder").appendChild(elmnt);
			console.log(es);
		}
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
document.getElementById("drawingedition").style.zoom=1.0;
window.addEventListener('wheel', function(e) {
  if (e.deltaY < 0) {
    console.log('scrolling up');
	document.getElementById("drawingedition").style.zoom = +document.getElementById("drawingedition").style.zoom + +0.1;
  }
  if (e.deltaY > 0 && document.getElementById("drawingedition").style.zoom >0.15) {
    console.log('scrolling down');
	document.getElementById("drawingedition").style.zoom -= +0.1;
  }
  console.log(document.getElementById("drawingedition").style.zoom);
});
	
	
