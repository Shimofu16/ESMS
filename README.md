**Installation:**

1. Clone the repository:

```
git clone https://github.com/Shimofu16/ESMS.git
```

2. Install the project dependencies:

```
cd ESMS
composer install
```

3. Configure the database:
   
```
cp .env.example .env
php artisan key:generate
php artisan migrate
```

4. link the storage:

```
php artisan storage:link
```

5. Start the development server:

```
php artisan serve
```
