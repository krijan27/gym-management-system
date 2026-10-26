# Gym Management System

A web-based gym management application developed as a university project for the PHP Fundamentals course at the University of Slavonski Brod.

The application provides user authentication, role-based access, workout management, trainer management, and workout registrations.

## Features

## Authentication & Security

User registration and login

Secure password hashing using password_hash()

Role-based access control (Admin and Member)

User session management

## Admin Dashboard

Create, view, update, and delete trainers

Create, view, update, and delete workouts

View dashboard statistics

## Member Dashboard

Browse available workouts

Register for workouts

Cancel workout registrations

View personal workout registrations

## Technologies Used

Backend: PHP

Database: MySQL

Database Access: PDO (PHP Data Objects)

Frontend: HTML, CSS

Development Environment: XAMPP (Apache, MySQL)

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

Install XAMPP and start Apache and MySQL.

Create a MySQL database named gym_app.

Import sql/database.sql into the database using phpMyAdmin.

Configure your local database connection in config/database.php.

Place the project folder inside the XAMPP htdocs directory.

Open the application in your browser:

http://localhost/teretana/public/login.php

If you use a different folder name, update the URL accordingly.

## What I Learned

While developing this project, I gained practical experience with:

Server-side development using PHP

Connecting applications to MySQL databases using PDO

Implementing CRUD operations

User authentication and authorization

Working with relational databases

Organizing backend application code

## Author

Marin Krijan

Information Technology Student
University of Slavonski Brod, Croatia

GitHub: https://github.com/krijan27

## Project Status

Completed university project. Future improvements may include REST API development, automated testing, and deployment.
