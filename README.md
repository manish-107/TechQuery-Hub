
## Overview
TechQuery Hub is a college mini project aimed at creating an interactive online platform for students to discuss various tech-related topics. Built with HTML, CSS, JavaScript, PHP, and SQL, this project serves as a practical application of programming skills in a collaborative environment.

## Purpose
The purpose of TechQuery Hub is to provide students with a dynamic space to explore, share, and discuss tech topics. Whether you're a beginner seeking guidance or an experienced programmer willing to contribute, TechQuery Hub offers an inclusive environment for all. It serves as a valuable learning tool and fosters a vibrant tech community within the college.

## Features
- User registration and authentication
- Posting questions and answers
- Commenting on posts
- Tagging questions with relevant topics

## Technologies Used
- HTML
- CSS
- JavaScript(JQuery)
- PHP
- SQL

## Getting Started
To get started with TechQuery Hub, follow these steps:
1. Clone the repository: `git clone https://github.com/your-username/TechQuery-Hub.git`
2. Set up a local web server environment (e.g., XAMPP, WAMP).
3. Import the database schema from the `techquery.sql` file.
4. Configure the database connection in the PHP files.
5. Launch the application and start exploring!..

## Tables
`Users:`
1. UserID (Primary Key)
2. Username
3. Password 
4. Email
5. JoinDate

`Questions:`
1. QuestionID (Primary Key)
2. UserID (Foreign Key to Users table)
4. Title
5. Body
6. CreationDate

`Answers:`
1. AnswerID (Primary Key)
2. QuestionID (Foreign Key to Questions table)
3. UserID (Foreign Key to Users table)
4. Body
5. CreationDate

`Tags:`
1. TagID (Primary Key)
2. TagName

`QuestionTags (a junction table to link questions with tags):`
1. QuestionID (Foreign Key to Questions table)
2. TagID (Foreign Key to Tags table)
