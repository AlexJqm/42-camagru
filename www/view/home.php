<canvas id="c" ></canvas>

<style>
body {
	padding - bottom: 0 !important;
}

nav {
	margin - bottom: 0 !important;
}

body,
html,
canvas {
	margin: 0 px;
	padding: 0 px;
	background - color: #353535;
}

canvas {
	width: 100%;
	height: 100%;
}
</style>

<script>
var partNum = 100;

	window.requestAnimFrame = (function () {
		return window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			function (callback) {
				window.setTimeout(callback, 1000 / 60);
			};
	})();

	function between(min, max) {
		return Math.random() * (max - min) + min;
	}

	var c = document.getElementById('c');
	var ctx = c.getContext('2d');

	var w = document.documentElement.clientWidth;
	var h = document.documentElement.clientHeight;

	c.width = w;
	c.height = h;

	var mouse = {
		x: w / 2,
		y: h / 2
	};

	document.addEventListener('mousemove', function (e) {
		mouse.x = e.clientX || e.pageX;
		mouse.y = e.clientY || e.pageY
	}, false);

	var particles = [];
	for (i = 0; i < partNum; i++) {
		particles.push(new particle);
	}

	function particle() {
		this.x = Math.random() * c.width;
		this.y = Math.random() * c.height;


		this.vx = Math.random() * 1 - 0.5;
		this.vy = Math.random() * 1 - 0.5;

		this.r = 3;

		this.color = '#444444';
	}

	function draw() {
		requestAnimFrame(draw)

		ctx.fillStyle = '#212020';
		ctx.fillRect(0, 0, c.width, c.height)

		for (t = 0; t < particles.length; t++) {
			var p = particles[t];

			ctx.beginPath();
			ctx.fillStyle = p.color;
			ctx.arc(p.x, p.y, p.r, Math.PI * 2, false);
			ctx.fill();

			p.x += p.vx;
			p.y += p.vy;

			p.vx;
			p.vy;

			if (p.y < 0) {
				p.vy *= -1;
			}

			if (p.y > c.height) {
				p.vy *= -1;
			}

			if (p.x < 0) {
				p.vx *= -1;
			}

			if (p.x > c.width) {
				p.vx *= -1;
			}

			for (j = 0; j < particles.length; j++) {
				var pp = particles[j];
				distance(p, pp);
			}
		}
	}

	function distance(p1, p2) {
		var dist,
			dx = p1.x - p2.x,
			dy = p1.y - p2.y;

		dist = Math.sqrt(dx * dx + dy * dy);

		var minDist = 100;

		if (dist <= minDist) {

			ctx.beginPath();
			ctx.strokeStyle = "#393939";
			ctx.moveTo(p1.x, p1.y);
			ctx.lineTo(p2.x, p2.y);
			ctx.stroke();
			ctx.closePath();
		}

	}
	draw();

</script>
