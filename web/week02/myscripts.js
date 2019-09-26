/*

Javascript File for Week02 team activity made by Alexander Bluhm

*/

function whenClicked() {
	alert("Clicked!");
}

function changeColor() {
	var elem = document.getElementById("color-code").value;
	var div = document.getElementById("div1");
	
	div.style.backgroundColor = elem;
}