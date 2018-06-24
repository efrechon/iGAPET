function changeFloor(elmnt){
	console.log(elmnt.selectedIndex);
	var selectFloor = document.querySelector('#FloorSelector');
	while(selectFloor.firstChild)
		selectFloor.removeChild(selectFloor.firstChild);	
	
	var n;
	for (var i=0;i<array[elmnt.selectedIndex-1];i++){
		n = document.createElement('option');
		n.innerText = i+1;
		n.value = 1
		selectFloor.appendChild(n);
	}
	
}