var r;
var c;
var a;
var k = 0;
var k2 = 0;
var str ="";
var sav ="";
for(var i=0;i<Rooms.length;i++)
{
	r = Rooms[i];
	var cap = [[],[],[],[],[]];
	if (r["xPosition"] != 0 && r["yPosition"] != 0)
	{
		str += '<div class="RoomModif" name='+ r["Name"]+ ' style="position:absolute;left:'+r["xPosition"]+'px;top:'+r["yPosition"]+'px;Width:'+r["Width"]+'px;Height:'+r["Height"]+'px;">';
		str += '<div class="RoomBody"><div class="RoomName">'+ r["Name"] + '</div>'
		while(captors[k]!= null)
		{
			/*
			c= captors[k];
			str += '<div class="Captor"></div>';
			*/
			cap[captors[k]["CaptorTypeID"]-1].push(captors[k]["CaptorID"]);
			k +=1;
			if (captors[k] != null && captors[k]["RoomID"] != r["RoomID"]) { break; }
		}
		/*
		while(actuators[k2]!= null)
		{
			cap[actuators[k2]["ActuatorTypeID"]+2].push(actuators[k2]["ActuatorID"]);
			k2 +=1;
			if (actuators[k2] != null && actuators[k2]["RoomID"] != r["RoomID"]) { break; }
		}*/
		
		if (cap[0].length != 0) // lumière
		{
			str += '<div class="captorContainer" style="clear:left;float:left;width:48%;height:50%;"><div class="LuminosityCaptor" name="switch"><img src="img/light_icon.png" alt="light"></div></div>';
		}
		if (cap[1].length != 0) // température(capteur)
		{
			str += '<div class="captorContainer" style="width:48%;height:20%;"><div class="temperatureCaptor"><p> Température </p><p> 21.4 C </p></div></div>';
		}
		if (cap[2].length != 0) //humidité
		{

		}
		if (cap[3].length != 0) //volet
		{
			str += '<div class="captorContainer" style="clear:left;float:left;width:48%;height:20%;"><div class="ShutterActuator" ><div class="shutterBlock">▲</div><div class="shutterBlock">';
			str += '<img src="img/blinds.png" alt="light"></div><div class="shutterBlock">▼</div></div></div>';
		}
		if (cap[4].length != 0) // interrupteur lumière
		{
			
		}
		str += '</div></div>';

	}
}
document.getElementById("drawing").innerHTML = str;
document.getElementById("drawing").style.zoom=1.0;
window.addEventListener('wheel', function(e) {
  if (e.deltaY < 0) {
    console.log('scrolling up');
	document.getElementById("drawing").style.zoom = +document.getElementById("drawing").style.zoom + +0.1;
  }
  if (e.deltaY > 0 && document.getElementById("drawing").style.zoom >0.15) {
    console.log('scrolling down');
	document.getElementById("drawing").style.zoom -= +0.1;
  }
  console.log(document.getElementById("drawing").style.zoom);
});