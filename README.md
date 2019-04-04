Description:

From provided JSON files write a small service which imports the files and stores the data in a local DB.
Read the data from the DB to render a microsite which displays the article in a simple layout.
You have a given local dev environment with PHP7, MySQL and NGINX based on Docker.
There is also a Container with Node, NPM & Sass for building the Frontend.
There are two JSON files provided in data/json/, one is valid, one is invalid (for error handling).

Backend requirements:
- Start the local environment with 'docker-compose up', the site is available under http://localhost:8080/
- Use a composer skeleton, e.g. Symfony
- Create the entity class(es) and the table(s) based on the data in the JSON files and save the content to the local DB, e.g. Doctrine
- Output the data from the DB using a template engine, e.g. TWIG
- Appropriate error handling & logging---------------
- Nice to have: test cases------------------

Frontend requirements:
- You can use the Node container for building 'docker exec npm_api npm -v'
- Create a simple responsive layout using mixins without any libraries (Bootstrap, Foundation, ...), e.g. SASS/LESS--------------
- JS Lightbox module to overlay a bigger image size, don't use any existing Lightbox frameworks---------------
- Nice to have: AMP Layout

General requirements:
- Use the MVC and OOP design patterns
- A working HTML microsite
- Description on how to setup and run the application
