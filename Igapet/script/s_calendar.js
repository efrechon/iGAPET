
addCalendarContent(0);
addHeaderContent(0);

function addCalendarContent(m){
	var calendar = document.querySelector('#calendar');

	var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	var mS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

	var dL = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	var dS = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

	var date = new Date();
	var year = date.getFullYear();
	var month = date.getMonth()+m;
	var day = date.getDate();
	var firstDay = new Date(year,month,1).getDay();


	var l = document.createElement('tr');
	for(var i=0;i<dS.length;i++){
		var block = document.createElement('th');
		block.setAttribute('class','dayHeader');
		block.textContent = dS[i];
		l.appendChild(block);
	}
	calendar.appendChild(l);

	console.log(month);
	console.log(mL[month]);
	console.log(new Date(year,month+1,0).getDate());
	console.log(date.getDate());
	//console.log(firstDay+2+day);

	for (var i=0;i<6;i++){
		var l = document.createElement('tr');
		for (var j =0;j<7;j++){
			var val = j+7*i-day+3;
			var block = document.createElement('th');
			block.setAttribute('class','block');
			if (val<1)
			{
				if (month ==-1)
					val += new Date(year-1,11,0).getDate();
				else
					val += new Date(year,month,0).getDate();
				
				block.setAttribute('class','grised');
			}
			else if (val > new Date(year,month+1,0).getDate())
			{
				if (month == 11)
					val -= new Date(year+1,0,0).getDate();
				else
					val -= new Date(year,month+1,0).getDate();
				block.setAttribute('class','grised');
			}
			if (val == date.getDate() && block.attributes.class.value != "grised")
				block.setAttribute('id','selected');
			
			block.textContent= val;
			l.appendChild(block);
		}
		calendar.appendChild(l);
	}
	
}

function addHeaderContent(m){
	
	var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	
	var header = document.querySelector('#calendarHeader');
	
	var d = document.createElement('div');
	d.setAttribute('id','moveLeft');
	d.textContent = "<";
	d.addEventListener('click',changeMonth(d,m));
	header.appendChild(d);
	
	d = document.createElement('div');
	d.setAttribute('id','calendarTitle');
	d.textContent = mL[new Date().getMonth()+m];
	header.append(d);
	
	d = document.createElement('div');
	d.setAttribute('id','moveRight');
	d.textContent = ">";
	d.addEventListener('click',changeMonth(d,m));
	header.appendChild(d);
	
}

function changeMonth(elmnt,i) {
	console.log(elmnt.attributes.id.value);
	var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	if (elmnt.attributes.id.value == "moveRight")
		i += 1;
	else
		i-= 1;
	var calendar = document.querySelector('#calendar');
	
	while (calendar.hasChildNodes()) {
		calendar.removeChild(calendar.lastChild);
	}
	//console.log(document.querySelector('#calendarTitle'));
	//document.querySelector('#calendarTitle').textContent= mL[new Date().getMonth()+i];
	addCalendarContent(i);
}
