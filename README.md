#  Money Tracker API  
Laravel Backend Assessment Project

---

##  Introduction

Money Tracker API is a RESTful backend application built using Laravel.

The system enables users to:

- Create a user account
- Create and manage multiple wallets
- Record income and expense transactions
- View individual wallet balances
- View total balance across all wallets

Authentication was intentionally excluded in accordance with the assessment requirements.

---

## Getting Started

Follow the steps below to set up and run the project locally.

---

### Clone the Repository

```bash
git clone <your-repository-link>
cd money-tracker-api
```

---

### Install Dependencies

```bash
composer install
```

---

### Configure Environment

Copy the example environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

---

### Configure Database

Open the `.env` file and configure your database settings.

#### Example (MySQL)

```
DB_CONNECTION=mysql
DB_DATABASE=money_tracker
DB_USERNAME=root
DB_PASSWORD=
```

#### Example (SQLite)

```
DB_CONNECTION=sqlite
```

If using MySQL, create the database manually before running migrations.

---

###  Run Migrations

```bash
php artisan migrate
```

This will generate the required tables:

- users
- wallets
- transactions

---

### Start the Development Server

```bash
php artisan serve
```

The API will be accessible at:

```
http://127.0.0.1:8000
```

---

## Project Structure

```
app/
 ├── Models/
 │   ├── User.php
 │   ├── Wallet.php
 │   └── Transaction.php
 ├── Http/
 │   └── Controllers/
 │       ├── UserController.php
 │       ├── WalletController.php
 │       └── TransactionController.php

routes/
 └── api.php

database/
 └── migrations/
```

The application follows Laravel’s standard MVC structure, separating logic into models, controllers, and routes.

---

## Database Design

### Users
- id
- name
- email
- timestamps

### Wallets
- id
- user_id (foreign key)
- name
- timestamps

A user may have multiple wallets.

### Transactions
- id
- wallet_id (foreign key)
- type (income | expense)
- amount
- description
- timestamps

A wallet may contain multiple transactions.

---

##  API Endpoints

All endpoints are prefixed with:

```
/api
```

---

### Create User  
**POST** `/api/users`

Creates a new user account.

---

### View User Profile  
**GET** `/api/users/{id}`

Returns:
- User details
- All associated wallets
- Individual wallet balances
- Total balance across all wallets

---

### Create Wallet  
**POST** `/api/wallets`

Creates a new wallet linked to a specific user.

---

### View Wallet  
**GET** `/api/wallets/{id}`

Returns:
- Wallet details
- All transactions
- Calculated wallet balance

---

### Add Transaction  
**POST** `/api/transactions`

Validation rules:
- Wallet must exist
- Amount must be positive
- Type must be either `income` or `expense`

---

## Balance Calculation

Wallet balances are calculated dynamically.

- Income transactions increase balance
- Expense transactions decrease balance

Balance logic is implemented as a model accessor within the `Wallet` model to avoid redundant database fields and ensure data consistency.

---

## Design Decisions

- RESTful API structure
- Clear separation of concerns (Models, Controllers, Routes)
- Dynamic balance computation instead of storing derived values
- Controller-level validation for data integrity
- Logical commit history reflecting structured development workflow

---

## Testing the API

You can test endpoints using tools such as:

- Postman
- Insomnia
- cURL

Example:

```bash
curl -X POST http://127.0.0.1:8000/api/users \
     -H "Content-Type: application/json" \
     -d '{"name":"John Doe","email":"john@example.com"}'
```

---

## Development Workflow

The project was developed incrementally with logical commit separation:

1. Project setup
2. API routing configuration
3. Database migrations
4. Model relationships
5. Controller implementation
6. Validation rules
7. Balance calculation logic
8. Endpoint refinement

This approach reflects disciplined backend development practices.

---

## License

Developed as part of a backend technical assessment.
