 📌 Task Manager  

A simple PHP Task Manager where users can create, view, and complete their tasks. Built with PHP, MySQL, and JavaScript for smooth task management.  

 🚀 Features  
✅ User-Based Tasks – Each user can manage their own tasks.  
✅ Add Tasks – Easily add new tasks with a title.  
✅ Mark as Done – Completed tasks are removed with a smooth animation.  
✅ Responsive UI – Clean and simple styling for a better experience.  
✅ Database Support – All tasks are stored in MySQL.  

 🛠️ Tech Stack  
- Backend: PHP (PDO for database interactions)  
- Frontend: HTML, CSS, JavaScript (with smooth animations)  
- Database: MySQL  

 📂 Project Structure  
```
task_manager/                 
│── public/                      Public-facing pages
│   ├── css/                     Stylesheets
│   │   ├── style.css            Main styling
│   ├── index.php                List users, add new users
│   ├── register.php             User registration form
│   ├── tasks.php                Task list for a specific user
│── includes/                   
│   ├── db_connect.php           Database connection
│   ├── add_task.php             Add task script
│   ├── delete_task.php          Delete (mark as done) task script
│── database/                   
│   ├── init.sql                 Database schema
│── config/                     
│   ├── config.php               Database credentials
│── README.md                    This file
```  

 ⚡ Setup Guide  
1️⃣ Clone this repo:  
```bash
git clone https://github.com/yourusername/task_manager.git
```  
2️⃣ Import `database/init.sql` into MySQL.  
3️⃣ Configure `config/config.php` with your database credentials.  
4️⃣ Run a local PHP server:  
```bash
php -S localhost:8000 -t public
```  
5️⃣ Open `http://localhost:8000/index.php` in your browser.  

 🎯 Future Enhancements  
🚀 User authentication (login/logout)  
🚀 Task due dates & reminders  
🚀 Filter & sort tasks  

