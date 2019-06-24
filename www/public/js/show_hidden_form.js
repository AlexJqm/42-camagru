function show_form() {
	var x = document.getElementById("form-picture");
	var y = document.getElementById("form-camera");
	if (x.style.display === "none" && y.style.display === "block") {
		x.style.display = "block";
		y.style.display = "none";
	} else {
		x.style.display = "none";
		y.style.display = "block";
	}

}
