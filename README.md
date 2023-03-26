<h2>HOW TO RUN THE APPLICATION</h2>
<ul>
	<li>
		Run <b>docker-compose up -d</b>
	</li>
	<li>
		To generate initial weather information for the Cities,
		<br>you can execute this command: <b>docker exec -it app bash -c "php artisan migrate && php artisan weather:update"</b>,
		<br>or wait 15 minutes for the table to be populated by initial data
	</li>
	<li>
		Open http://localhost:4001/api/weather/{cityName} in your browser.
		<br>For example: <a href="http://localhost:4001/api/weather/manila">http://localhost:4001/api/weather/manila</a>
	</li>
</ul>