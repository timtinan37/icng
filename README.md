# ICNG
Insurance cover note generator.

**Steps to run :**  

 1. Go to project root
 2. Run *docker-compose up -d*
 3. Run *docker-compose ps* and ensure 3 containers - 'icng-app', 'icng-db', 'icng-nginx' are in the 'Up' state.
 4. Run *docker-compose exec app php artisan migrate:fresh --seed*
 5. Go to *http://127.0.0.1:8000*
 6. Credentials: admin@example.com , password: *password*
