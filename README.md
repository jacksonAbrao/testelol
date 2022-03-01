<h1>LOL Design</h1>
configure the .env file, as shown in the .env.example file;<br>
configure the .env file in folder laradock, as shown in the .env.example (delete the php worker part, because it will install the old php, and give a problem) file in folder laradock;<br>
<hr>
type these command in terminal:<br>
cd laradock;<br>
docker-compose up -d nginx mysql phpmyadmin;<br>
docker-compose exec --user=laradock workspace bash<br>
composer install;<br>
npm install;<br>
npm run dev;<br>
road code php artisan migrate;<br>
php artisan db:seed;<br>
php artisan serve;<br>
