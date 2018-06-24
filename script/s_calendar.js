
addCalendarContent(0,0);

function addCalendarContent(m,y){
	var calendar = document.querySelector('#calendar');

	var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	var mS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

	var dL = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	var dS = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

	var date = new Date();
	var year = date.getFullYear();
	var month = date.getMonth();
	if (month+m > 11)
	{
		m = -month;
		y += 1;
	}
	else if (month+m <0)
	{
		m = 11-month;
		y -= 1;
	}
	
	month = month+m;
	year  = year + y;
	
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

	//console.log(month);
	//console.log(mL[month]);
	//console.log(new Date(year,month+1,0).getDate());
	//console.log(date.getDate());
	//console.log(firstDay+2+day);
	//console.log(firstDay);
	//console.log(firstDay);
	var buf =0;
	var start = false;
	for (var i=0;i<6;i++){
		var l = document.createElement('tr');
		for (var j =0;j<7;j++){
			var val = j+7*i-firstDay+2-buf;
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

			if (val == date.getDate() && month == date.getMonth() && year == date.getFullYear() && block.attributes.class.value != "grised")
			{
				if (start)
					block.setAttribute('id','selected');
				
			}
			
			if (!start && val==1)
				start = true;
			else if (!start && val > 1 && val<15)
			{
				start = true;
				buf = 7;
				block.setAttribute('class','grised');
				val -= buf;
				if (month ==-1)
					val += new Date(year-1,11,0).getDate();
				else
					val += new Date(year,month,0).getDate();
				block.setAttribute('class','grised');
			}
			
			block.textContent= val;
			l.appendChild(block);
		}
		calendar.appendChild(l);
	}
	console.log("---------------");
	//header
	
	var header = document.querySelector('#calendarHeader');
	
	var d = document.createElement('div');
	d.setAttribute('id','moveLeft');
	d.textContent = "<";
	d.addEventListener('click',function(){
		changeMonth(m,y,1);
	});
	header.appendChild(d);
	
	d = document.createElement('div');
	d.setAttribute('id','calendarTitle');
	var num = new Date().getFullYear()+y;
	d.textContent = mL[new Date().getMonth()+m] + " - " + num.toString();
	header.append(d);
	
	d = document.createElement('div');
	d.setAttribute('id','moveRight');
	d.textContent = ">";
	d.addEventListener('click',function(){
		changeMonth(m,y,2);
	});
	header.appendChild(d);
	
}

function changeMonth(i,y,a) {
	
	var mL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	if (a == 2)
		i += 1;
	else
		i-= 1;
	var calendar = document.querySelector('#calendar');
	
	while (calendarHeader.hasChildNodes()) {
		calendarHeader.removeChild(calendarHeader.lastChild);
	}

	while (calendar.hasChildNodes()) {
		calendar.removeChild(calendar.lastChild);
	}	
	
	//console.log(document.querySelector('#calendarTitle'));
	addCalendarContent(i,y);
}
