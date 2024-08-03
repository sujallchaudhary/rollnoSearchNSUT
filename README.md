Sure, here's the complete README content that you can copy directly into a Markdown file:

```markdown
# NSUT Roll Number Search

This project is a web application that allows users to search for the roll numbers of students at NSUT by entering their names. The application is developed by Sujal Chaudhary.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [API](#api)
- [Demo](#demo)
- [Author](#author)

## Features

- Search for student roll numbers by name.
- Responsive design using Tailwind CSS.
- Animated transitions.
- API integration for fetching student data.

## Usage

1. Enter the student's name in the input field.
2. Click the "Search" button.
3. The table will display the student's roll number and other details if found.

## Configuration

This project uses a PHP configuration file named `configs.php` for database connection.

## API

The application uses a working API endpoint to fetch student data. The API is hosted at:

```
https://api.sujal.info/nsut/rollno
```

### API Request

- **Method**: POST
- **Payload**: JSON

    ```json
    {
        "name": "studentName"
    }
    ```

### API Response
 ```json
[
    {
        "id": "1507",
        "Degree": "B.Tech.",
        "specialization": "COMPUTER SCIENCE AND ENGINEERING (ARTIFICIAL INTELLIGENCE)",
        "studentName": "SUJAL CHAUDHARY",
        "fatherName": "ANUJ KUMAR",
        "rollNo": "2024UCA1953",
        "section": "2"
    }
]
    ```

The API returns the student's roll number and other details in JSON format.


## Demo

You can see a live demo of the application at:

```
https://rollno.sujal.info
```

## Author

Developed by Sujal Chaudhary. For any queries, feel free to contact me at [me@sujal.info](mailto:me@sujal.info).
```
