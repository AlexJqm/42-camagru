<style>
.navbar {
	margin-bottom: 0 !important;
}
#particles {
  width: 100%;
  height: 100%;
  overflow: hidden;
  padding-top: -50px;
}

#intro {
  position: absolute;
  left: 0;
  top: 50%;
  padding: 0 20px;
  width: 100%;
  text-align: center;
}
</style>
<div id="particles">
	<div id="intro">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="400" height="400" viewBox="0 0 430.117 430.118" style="enable-background:new 0 0 430.117 430.118;" xml:space="preserve" class=""><g><g>
			<path id="Dailybooth" d="M215.059,430.118c51.371,0,98.536-18.024,135.514-48.08l75.476,27.284l-31.456-75.831l-0.009-0.009   c22.458-33.963,35.534-74.664,35.534-118.423C430.117,96.284,333.836,0,215.059,0C96.279,0,0,96.284,0,215.059   C0,333.836,96.279,430.118,215.059,430.118z M96.055,159.105l44.794-10.524c12.702-24.502,38.261-41.252,67.766-41.252   c16.86,0,32.439,5.481,45.068,14.748l43.39-10.197c10.244-2.399,20.727,4.994,23.434,16.531l29.29,124.705   c2.717,11.541-3.388,22.836-13.618,25.244l-201.011,47.222c-10.237,2.408-20.729-4.994-23.438-16.531L82.43,184.34   C79.721,172.812,85.823,161.514,96.055,159.105z M219.418,270.844c29.916,0,54.176-24.255,54.176-54.18   c0-29.916-24.26-54.171-54.176-54.171c-29.928,0-54.185,24.255-54.185,54.171C165.233,246.589,189.49,270.844,219.418,270.844z    M219.418,182.021c19.135,0,34.644,15.513,34.644,34.648c0,19.13-15.509,34.639-34.644,34.639   c-19.135,0-34.644-15.509-34.644-34.639C184.774,197.534,200.283,182.021,219.418,182.021z" data-original="#000000" class="active-path" style="fill:#FFC107" data-old_color="#ffc107"></path></g></g>
		</svg>
	</div>
</div>
<script type='text/javascript' src="public/js/particleground.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		particleground(document.getElementById('particles'), {
			dotColor: '#ffc107',
			lineColor: '#ffc107'
		});
		var intro = document.getElementById('intro');
		intro.style.marginTop = -intro.offsetHeight + 'px';
	}, false);
</script>
