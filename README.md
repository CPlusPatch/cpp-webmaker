# CPlusPatch WebMaker

WebMaker is a simple project that aims to replicate a fully functional CRUD.

## Installation

Clone the repo and run

```bash
composer install
npm install
```
Optionally, run ```npm audit``` to check for vulnerabilities
Then, you will need to create a .env file with your database credentials and a key.
Create a database named `cpp_webmaker`and add a user with access to it.
Finally, run
```bash
php artisan migrate
```
to create database tables and stuff

## Usage
Launch the website with `php artisan serve --port=80` (you may need to use sudo for this). This will start the website at `127.0.0.1`.
For now, you can create a user at `127.0.0.1/register`. If you would like that user to be an admin, please edit the `users` table and change the `role` to `admin`.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)