# Codiegniter-bug-creator# CodeIgniter 3 Bug Tracker (Starter)
A compact issue-tracking module built for CodeIgniter 3. This repository contains the controller, model, view, and SQL schema to integrate into a standard CI3 application.

## Features
- List, create, and update bug tickets
- Priority and status fields
- Search by title
- Responsive Bootstrap view

## Install
1. Start with a working CodeIgniter 3 project.
2. Copy `application/controllers/Bugs.php`, `application/models/Bug_model.php`, and `application/views/bugs/index.php` into the matching folders.
3. Import `database.sql` into your MySQL database.
4. Configure the database in `application/config/database.php`.
5. Add route: `$route['bugs'] = 'bugs/index';`
6. Visit `/index.php/bugs`.

This is a starter module, not a complete standalone CodeIgniter installation. Add authentication and CSRF protections before production deployment.

