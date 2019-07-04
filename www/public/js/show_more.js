var nbr;

function show_more() {
	nbr = document.getElementById("count").stepUp(1);
	document.getElementById("count").value = nbr;
}
