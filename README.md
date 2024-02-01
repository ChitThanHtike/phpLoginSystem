# PHP Login/Logout System

A simple PHP-based login/logout system with registration functionality. The system is designed to securely handle user registration, login, and logout processes.

## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [Folder Structure](#folder-structure)
- [Contributing](#contributing)
- [License](#license)

## Features

1. **Registration:**

   - Users can register with a valid name, email, and password.
   - Passwords are securely hashed using the `password_hash()` function.
   - Password strength is checked to ensure a mix of uppercase, lowercase, numbers, and special characters.

2. **Login:**

   - Users can log in using their registered email and password.
   - Passwords are verified securely using `password_verify()`.

3. **User Profile:**

   - After successful login, users are redirected to a user profile page (`admin_page.php`) displaying their ID, name, email, and password.

4. **Responsive Design:**

   - The login and registration pages have responsive design features for optimal viewing on various screen sizes.

5. **Database Connection:**
   - Database connection details are configured in the `User_database.php` file.
   - A MySQL database named `user_data` is assumed to store user information.

## Prerequisites

- PHP server (e.g., Apache, Nginx)
- MySQL database
- Git (optional, for cloning the repository)

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/ChitThanHtike/phpLoginSystem.git
   ```
