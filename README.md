**To deploy the project is necessary:**
1. Create a folder on the computer where the project will be stored (example: myProject).
2. In the folder "myProject", create a folder "www".
3. Go to the folder "www" in the terminal.
4. Run: git clone http://gitlab.intita.com/Ita/Paulownia.git
5. Locate the folder "docker-files" and copy its contents to "myProject".
 At this stage, the project structure should look like this: 
 "myProject" -> files from folder "docker-files" and folder "www" (The entire project should be in the folder "www").
6. In the folder "myProject" you created, where the file "docker-compose.yml" is located, run the command **docker-compose up -d**
(XAMPP must be turned off, services apache and mysql stopped).
7. Go to php container:
    1. docker-compose exec php bash
    2. cd Paulownia
8. Copy the file .env.example to .env
9. Run commands:
    1. composer install
    2. php artisan key:generate
    3. php artisan migrate
    4. php artisan db:seed
    5. php artisan vendor:publish (press 0 and enter)
    6. php artisan storage:link