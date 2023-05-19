---

# Laravel Task Management Web Application

This is a simple Laravel web application for task management. It allows you to create, edit, delete tasks, and reorder them using drag and drop functionality. The priority of tasks is automatically updated based on the order.

## Requirements

Make sure you have the following software installed on your machine:

- PHP (8.0 or higher)
- Composer
- MySQL
- Web server (e.g., Apache or Nginx)

## Installation

1. Clone the repository to your local machine:

   ```shell
   git clone https://github.com/blingyplus/task-manager.git
   ```

2. Navigate to the project directory:

   ```shell
   cd task-manager
   ```

3. Install the dependencies using Composer:

   ```shell
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`:

   ```shell
   cp .env.example .env
   ```

5. Generate the application key:

   ```shell
   php artisan key:generate
   ```

6. Configure the database connection in the `.env` file. Update the following variables:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

7. Run the database migrations to create the necessary tables:

   ```shell
   php artisan migrate
   ```

8. Start the development server:

   ```shell
   php artisan serve
   ```

9. You can now access the web application by visiting `http://localhost:8000` in your browser.

## Deployment

To deploy the Laravel application to a production environment, follow these general steps:

1. Set up a web server (e.g., Apache or Nginx) and point the document root to the `public` directory of your project.

2. Configure the `.env` file on your production server with the appropriate database and environment settings.

3. Ensure that the `storage` and `bootstrap/cache` directories are writable by the web server.

4. Run any necessary deployment scripts or tasks (e.g., building assets, optimizing code, etc.).

5. Monitor the logs and troubleshoot any issues that may arise during deployment.

For more detailed instructions on Laravel deployment, please refer to the official Laravel documentation: [Deployment - Laravel Documentation](https://laravel.com/docs/deployment)

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvement, feel free to open an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).

---

Feel free to modify the instructions according to your specific setup and deployment process. Make sure to include any additional steps or configuration specific to your application or environment.

I hope this helps! Let me know if you have any further questions.
