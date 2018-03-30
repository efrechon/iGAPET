<!DOCTYPE html>
<?php
require('Home.php');
$HouseID  ="";
$Floor ="";
if (isset($_POST['HouseID'])) {
    $HouseID = $_POST['HouseID'];
}
if (isset($_POST['Floor'])) {
    $Floor = $_POST['Floor'];
}
$HouseID = 1;
$Floor = 1;
$sql = "SELECT * FROM rooms WHERE HouseID=$HouseID AND Floor=$Floor";
$Rooms = get($db,$sql);
$captorArray = array();
foreach($Rooms as $Room)
{
    $sqlcap = "SELECT * FROM captor WHERE RoomID=".$Room["RoomID"]."";
    $captors =get($db,$sqlcap);
    $captorArray['.$RoomID.'] = array();
    foreach($captors as $captor)
    {
        $captorArray[] = $captor;
    }
}
?>


<html>
<head>
    <style>
        div.Captor {
            position:relative;
            z-index:20;
            Width:20px;
            Height:20px;
            background-color:red;
            margin:5px;
            float:left;
        }
        .Room{
            position: absolute;
            border: solid;
            border-color:black;
            border-width:10px;
            z-index:10;
            background-color:lightgrey;
            margin:0px;
            border:0px;
            -webkit-box-shadow:inset 0px 0px 0px 2px #000000;
            -moz-box-shadow:inset 0px 0px 0px 2px #000000;
            box-shadow:inset 0px 0px 0px 2px #000000;
        }
    </style>

</head>

<body>
<div id="drawing" style="position:relative;Width:1000px;Height:800px;margin:10px;border-style: dashed;border-color:Black"></div>
<div ></div><form id="SendBox" action="SaveFloor.php" method="post"><input type="button" onclick="saveToForm()"><input type="submit"></form>
</body>

<script> // dessine la pièce avec les capteurs et actionneurs correspondant et stocke les valeurs
    var Rooms = <?php echo json_encode($Rooms); ?>;
    var captors = <?php echo json_encode($captorArray); ?>;
    var r;
    var c;
    var a;
    var k = 0;
    var str ="";
    for(var i=0;i<Rooms.length;i++)
    {
        r = Rooms[i];
        str += '<div class="Room" name='+ r["Name"]+ ' style="left:'+r["xPosition"]+'px;top:'+r["yPosition"]+'px;Width:'+r["width"]+'px;Height:'+r["height"]+'px;">';
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
    function saveToForm()
    {
		
		var xhr = new XMLHttpRequest();
		var url = "SaveFloor.php";
		var param = new Array();
		for (var i=0;i<Rooms.length;i++)
		{
			param[i] = JSON.stringify(Rooms[i]);
		}
		xhr.open("POST",url,true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {//Call a function when the state changes.
		if(xhr.readyState == 4 && xhr.status == 200) {
				alert(xhr.responseText);
			}
		}
		for (var i=0;i<param.length;i++)
		{
			xhr.send(param);
		}		
		
    }
</script>

</html>