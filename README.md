# SWE Microservice - Carservice

First heck out the project and navigate to the root folder.

To setup up your current environment, you have to copy the file `/environments/dev/.env.example` to the environment folder which you would like to run. Change env values and rename the file to `.env`. Note: to run the development environment, there is a sample `.env` file already stored. If you change to stage or prod you also have to change the environment file path `env_file:` in your `./docker-compose.yml`.

Finally type `docker-compose build && docker-compose up -d` to build and run the application. Now you are able to enter the microservice under: `http://localhost:8888/`.

You can test the microservice using the attached postman collection: `./postman-collection.json`
