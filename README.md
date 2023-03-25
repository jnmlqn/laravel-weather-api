<h2>HOW TO RUN THE APPLICATION</h2>
<ul>
	<li>Run <b>docker-compose up -d</b></li>
	<li>Run <b>docker exec -it {containerID} bash</b></li>
	<li>Run <b>php artisan migrate</b></li>
	<li>To generate initial weather information for the Cities, please run: <b>php artisan weather:update</b></li>
	<li>Open http://localhost:4001/api/weather/{cityName} in your browser. For example: <a href="http://localhost:4001/api/weather/manila">http://localhost:4001/api/weather/manila</a></li>
</ul>