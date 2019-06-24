	var decX;
	var decY;
	function godrag(e){
		var dde = (navigator.vendor) ? document.body : document.documentElement;
		var Obj =  e.currentTarget;
		var X = e.clientX + dde.scrollLeft;
		var Y = e.clientY + dde.scrollTop;
		decX = X - Obj.offsetLeft
		decY = Y - Obj.offsetTop
		e.dataTransfer.setData('Text', Obj.src);
		e.dataTransfer.effectAllowed = 'copy';
		e.dataTransfer.dropEffect = 'move';
	}
	function Dragov(e) {
		e.preventDefault();
	}
	function drop(e) {
		e.preventDefault();
		var dde = (navigator.vendor) ? document.body : document.documentElement;
		var X = e.clientX + dde.scrollLeft;
		var Y = e.clientY + dde.scrollTop;
		var draaag = e.dataTransfer.getData('Text');
		var imgz = new Image();
		imgz.src = draaag;
		imgz.onload = function(){
			var ctx = document.getElementById('canvas').getContext('2d');
			dcx = X - decX - document.getElementById('canvas').offsetLeft
			dcy = Y- decY - document.getElementById('canvas').offsetTop
			ctx.drawImage(imgz, dcx, dcy);
			document.getElementById('photo').value = ctx.toDataURL();
		}
	}
	function clearDraw() {
		var canvas = document.getElementById("canvas");
		var ctx = canvas.getContext("2d");
		ctx.clearRect(0, 0, canvas.width, canvas.height);
	}
