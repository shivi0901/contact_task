# Contact Form with PHP and MySQL

This project demonstrates a simple contact form implementation using HTML, PHP, and MySQL. The form validates user input, saves data to a MySQL database, and sends email notifications.

## Requirements

- Web server (e.g., XAMPP, WAMP, MAMP) with PHP and MySQL support.
- Basic understanding of HTML, PHP, and MySQL.

## Features

- Simple HTML form with fields for Full Name, Phone Number, Email, Subject, and Message.
- Form data is validated on the server side using PHP.
- Form submissions are saved to a MySQL database table.
- Email notifications are sent to the site owner upon successful submission.

## Getting Started

Follow these steps to set up and run the project:

1. Clone this repository to your web server's document root.
2. Create a MySQL database and table using the provided SQL script in `create_table.sql`.
3. Configure the database connection in `process_form.php` by updating the `$host`, `$db_user`, `$db_password`, and `$db_name` variables.
4. Update the SMTP settings in `process_form.php` to use a valid SMTP server for sending email notifications.
5. Open the form in a web browser by navigating to `http://localhost/contact_form/contact_form.html`.

## Usage

1. Access the contact form by visiting the provided URL.
2. Fill out the form with valid information and submit.
3. The form data will be saved to the MySQL database table and an email notification will be sent to the site owner.

## Contributing

Contributions are welcome! If you find any issues or want to improve the project, feel free to submit a pull request.



## Contact

For questions or feedback, please contact:

- Name: shivani mishra
- Email: shivani.mishra0901@gmail.com
- GitHub: shivi0901



