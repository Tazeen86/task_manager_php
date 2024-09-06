Here's a simple and clear `README.md` file that provides step-by-step instructions on how to set up the Laravel Task Management application:

---

# Laravel Task Management App

This is a simple task management application built with Laravel. It allows users to:
- Create, view, update, and delete tasks.
- Organize tasks by priority using drag-and-drop functionality.
- Assign tasks to projects and manage projects.
  
## Features
- Task CRUD (Create, Read, Update, Delete).
- Project CRUD (Create, Read, Update, Delete).
- Reorder tasks by priority using drag-and-drop.
- Tasks are linked to projects, and you can view tasks by project.

## Prerequisites

Before setting up the project, ensure you have the following installed on your machine:

1. **PHP** (version 8.0 or higher)
2. **Composer** (PHP package manager)
3. **Node.js and npm** (for managing JavaScript dependencies)
4. **MySQL** (or any other supported database)
5. **Git** (for version control)

## Installation Steps

### 1. Clone the Repository
```bash
git clone https://github.com/your-repo/taskmanager.git
cd taskmanager
```

### 2. Install PHP Dependencies
Install the required PHP dependencies using Composer:
```bash
composer install
```

### 3. Install Node.js Dependencies
Install the required JavaScript dependencies using npm:
```bash
npm install
```

### 4. Set Up the Environment File
Create a `.env` file by copying the `.env.example` file:
```bash
cp .env.example .env
```

Edit the `.env` file to configure your database connection. Set the following values to match your local environment:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskmanager
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Generate the Application Key
Generate a unique application key:
```bash
php artisan key:generate
```

### 6. Run the Database Migrations
Run the following command to create the necessary tables in your database:
```bash
php artisan migrate
```

### 7. Compile the Assets
Compile the front-end assets using Laravel Mix:
```bash
npm run dev
```
For production, use:
```bash
npm run production
```

### 8. Run the Application
Start the Laravel development server:
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`.

## Task Reordering

The application uses **Sortable.js** to enable drag-and-drop functionality for reordering tasks. When tasks are reordered, their priority is updated in the backend via an AJAX call.

## Routes

Here are the main routes of the application:

- `/tasks`: View all tasks, reorder tasks by drag-and-drop, and manage tasks.
- `/tasks/create`: Create a new task.
- `/tasks/{id}/edit`: Edit an existing task.
- `/projects`: Manage projects (create, edit, delete).
- `/projects/{id}/edit`: Edit a project.

## Folder Structure

- `app/Models`: Contains the `Task` and `Project` models.
- `app/Http/Controllers`: Contains the `TaskController` and `ProjectController`.
- `resources/views`: Contains Blade templates for tasks and projects.
- `routes/web.php`: Defines the routes for tasks and projects.

## Technologies Used

- **Laravel**: PHP framework for building web applications.
- **Sortable.js**: JavaScript library for drag-and-drop functionality.
- **Bootstrap**: Front-end framework for styling.
- **MySQL**: Relational database for storing tasks and projects.

## API Endpoints (for Task Reordering)

- **POST** `/tasks/reorder`: Updates task priority order based on drag-and-drop.
  - Request Payload: 
    ```json
    {
      "taskOrder": [
        { "id": 1, "priority": 1 },
        { "id": 2, "priority": 2 },
        ...
      ]
    }
    ```

## Contribution

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/my-feature`).
3. Make your changes and commit them (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/my-feature`).
5. Open a pull request.

## License

This project is open-source and free to use under the MIT license.

---


