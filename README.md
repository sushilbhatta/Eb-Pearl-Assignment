## Introduction
This guide helps you set up a full-stack developer project on your local machine, featuring a responsive home page, a task manager, and a contact form, all built with HTML, CSS, JavaScript, and PHP, using a MySQL database.

A brief description of your project.

## Prerequisites

Ensure you have the following installed before setting up the project:

- [XAMPP](https://www.apachefriends.org/index.html) (Includes Apache, MySQL, PHP, and phpMyAdmin)
- Web Browser (Chrome, Firefox, etc.)

## Installation & Setup

### 1. Clone the Repository
```sh
 git clone https://github.com/sushilbhatta/Eb-Pearl-Assignment.git
```

### 2. Move Project Files to XAMPP Directory
Move the cloned project folder to the `htdocs` directory inside the XAMPP installation folder.

```sh
 mv Eb-Pearl-Assignment C:\xampp\htdocs\
```

### 3. Start XAMPP Services
- Open XAMPP Control Panel
- Start **Apache** and **MySQL**

### 4. Import the Database
1. Open [phpMyAdmin](http://localhost/phpmyadmin/)
2. Click **New** and create a new database (e.g., `mydatabase`)
3. Select the newly created database
4. Click **Import** and choose `database.sql` from the project folder
5. Click **Go** to import the database

### 5. Configure Database Connection
Edit the `config.php` file in your project directory:

```php
$host = 'localhost';
$username = 'root'; // Default XAMPP user
$password = ''; // Default XAMPP password (leave blank)
$database = 'myproject_db';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```

### 5. Pre-populate the payment-features table automatically

```
http://localhost/Eb-Pearl-Assignment/setup.php
```

### 6. Run the Project
Open your browser and navigate to:

```
http://localhost/Eb-Pearl-Assignment/index.php
```

## Usage
Provide details on how to use the project.

## Troubleshooting
- If Apache or MySQL fails to start, check for port conflicts (change Apache port to `8080` if necessary).
- Ensure your database name in `config.php` matches the one in phpMyAdmin.


## Contact
For issues or inquiries, contact(mailto:sushilbhatta00@gmail.com).

