# Gym Management System

A web-based gym management application developed as a university project for the **PHP Fundamentals** course at the University of Slavonski Brod, Croatia.

The application provides user authentication, role-based access control, workout management, trainer management, and workout registrations.

## Features

### Authentication & Security

- User registration and login
- Secure password hashing using `password_hash()`
- Role-based access control (Admin and Member)
- User session management

### Admin Dashboard

- Create, view, update, and delete trainers
- Create, view, update, and delete workouts
- View dashboard statistics

### Member Dashboard

- Browse available workouts
- Register for workouts
- Cancel workout registrations
- View personal workout registrations

## Technologies Used

- **Backend:** PHP
- **Database:** MySQL
- **Database Access:** PDO (PHP Data Objects)
- **Frontend:** HTML, CSS
- **Development Environment:** XAMPP (Apache, MySQL)

## Project Structure

```text
gym-management-system/
├── admin/       # Admin functionalities
├── config/      # Database configuration
├── includes/    # Shared functionality and authentication
├── member/      # Member functionalities
├── public/      # Login, registration and dashboard
├── sql/         # Database SQL script
└── README.md
```

## Installation and Setup

Follow these steps to run the project locally.

1. Install XAMPP and start Apache and MySQL.
2. Create a MySQL database named `gym_app`.
3. Import the `sql/database.sql` file using phpMyAdmin.
4. Configure the local database connection in `config/database.php`.
5. Place the project folder inside the XAMPP `htdocs` directory.
6. Open the application in your browser:

`http://localhost/gym-management-system/public/login.php`

**Note:** If your project folder has a different name, update the URL accordingly.

## User Roles

### Administrator

Administrators can manage trainers and workouts and access dashboard statistics.

### Member

Members can browse available workouts, register for training sessions, cancel registrations, and view their personal workout history.

## What I Learned

While developing this project, I gained practical experience with:

- Server-side development using PHP
- Connecting PHP applications to MySQL databases using PDO
- Implementing CRUD operations
- User authentication and authorization
- Working with relational databases
- Organizing backend application code
- Implementing role-based access control
- Managing user sessions

## Future Improvements

Potential future improvements include:

- Developing a REST API
- Adding automated tests
- Improving application security
- Implementing additional workout statistics
- Deploying the application to a hosting platform

## Project Status

**Completed university project.**

The application was developed for educational purposes to demonstrate practical backend development, database management, and user authentication.

## Author

**Marin Krijan**

Information Technology Student  
University of Slavonski Brod, Croatia

GitHub: https://github.com/krijan27

Project repository: https://github.com/krijan27/gym-management-system
