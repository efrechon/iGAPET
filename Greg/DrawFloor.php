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
        <div id="drawing" style="position:relative;Width:1000px;Height:1000px;margin:10px;border-style: dashed;border-color:Black"></div>
        <div ></div><form id="SendBox" action="SaveFloor.php" method="post"><input id="SecretArray" type="hidden" name="Save" value="test"><input type="button" onclick="saveToForm()"><input type="submit"></form>
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
            str += "</div>"
        }
        document.getElementById("drawing").innerHTML = str;


        var es = document.body.querySelectorAll("div.Room");



        var k=0
        while(es[k] != null)
        {
            dragElement(es[k],k,Rooms);
            k+=1;
        }
        function dragElement(elmnt,k,Rooms) {
            var pos1 = 0, pos2 = 0;
            var anchorPoint1 = new Array();
            var anchorPoint2 = new Array();
            var i=0;
            while(es[i] != null)
            {
                anchorPoint1[i] = {x:Rooms[i]["xPosition"],y:Rooms[i]["yPosition"]};
                anchorPoint2[i] = {x:(+Rooms[i]["xPosition"] + +Rooms[i]["width"]),y:(+Rooms[i]["yPosition"] + +Rooms[i]["height"])};
                i+=1;
            }

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
                posX = e.clientX;
                posY = e.clientY;
                // set the element's new position:
                for (var i = 0; i < anchorPoint1.length; i++) {
                    var a = anchorPoint1[i];
                    var b = anchorPoint2[i];
                    /*
                    console.log("__________");
                    console.log("pos :");
                    console.log(posX);
                    console.log(posY);
                    console.log("x:")
                    console.log(a.x);
                    console.log(b.x);
                    console.log("y:");
                    console.log(a.y);
                    console.log(b.y);
                    console.log("_________");
					*/
                    var addedBorder = 2.5;
                    if ((posX > a.x - rad) && (posX < +a.x + +rad)) {
                        posX = +a.x + +addedBorder;
                    }
                    if (posY > a.y - rad && posY < +a.y + +rad) {
                        posY = +a.y + +addedBorder;
                    }
                    if ((posX > b.x - rad) && (posX < +b.x + +rad)) {
                        posX = +b.x + +addedBorder;
                    }
                    if (posY > b.y - rad && posY < +b.y + +rad) {
                        posY = +b.y + +addedBorder;
                    }
					var temp = (+b.x + +a.x)/2;
                    if ((posX > temp - rad) && (posX < +temp + +rad)) {
                        posX = +temp + +addedBorder;
                    }
					var temp = (+b.y + +a.y)/2;
                    if (posY > temp - rad && posY < +temp + +rad) {
                        posY = +temp + +addedBorder;
                    }

                }

                posY = posY - parseInt(elmnt.style.height) / 2 -2.5;
                posX = posX - parseInt(elmnt.style.width) / 2 -2.5;

                elmnt.style.top = posY + "px";
                elmnt.style.left = posX + "px";
				console.log(Rooms[k]["xPosition"]);
				console.log(Rooms[k]["yPosition"]);
                Rooms[k]["xPosition"] = posX;
                Rooms[k]["yPosition"] = posY;
				console.log(Rooms[k]["xPosition"]);
				console.log(Rooms[k]["yPosition"]);

            }

            function closeDragElement() {
                /* stop moving when mouse button is released:*/
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
		
		function saveToForm()
		{
			e = document.getElementById("SecretArray");
			e.style.value = JSON.stringify(Rooms);
			console.log(e.style.value);
		}

    </script>

</html>