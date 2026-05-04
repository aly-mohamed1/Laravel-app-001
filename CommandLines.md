# Artisan Commands

## Run Laravel app
```bash
php artisan serve
# OR
php artisan serv
# OR
php artisan ser
```

## List all routes
```bash
# All routes (web, api, vendor(laravel))
php artisan route:list
php artisan r:l

# APIs only
php artisan r:l --path=api

# All without APIs
php artisan r:l --except-path=api

# Only web
php artisan r:l --except-path=api --except-vendor
```

## Create a controller 
```bash
php artisan make:controller TaskController
php artisan make:controller TaskController -r # create a controller with all CRUD methods (7)
php artisan make:controller TaskController --api # create a controller with all API methods (5)
```


## Migrations

### Create a migration for new table
```bash
php artisan make:migration create_name
```

### Run pending migrations
```bash
php artisan migrate
```

### Check migrations statuses
```bash
php artisan migrate:status
```

### Undo last migrations (single batch)
```bash
php artisan migrate:rollback
```

### Undo specific number of migrations
```bash
php artisan migrate:rollback --step=3
```

### Undo all migrations and re-run from scratch, (step nbach and then migrate)
```bash
php artisan migrate:refresh
```

### Drop all tables including (migrations table) and run all migrations from scratch 
```bash
php artisan migrate:fresh
```
### Making changes in a table has been migrated, here I specified which table do I want to change it
```bash
php artisan make:migration change_deleted_at_column_in_suppliers_table --table=suppliers
```
### Creating a folder in the Models
```bash
php artisan make:mode City
```
### Creating a folder in the Models and a controller in the Controllers
```bash
php artisan make:mode Country-c
```
### Creating a folder in the Models and a controller in the Controllers with its all resources
```bash
php artisan make:mode Item-cr
```
### Creating a folder in the Models, a controller in the Controllers with its all resources, in seeders, in migrations, in factories
```bash
php artisan make:mode Car-a
```
### Dropping all tables and Seeding them again 
```bash
php artisan migrate:fresh--seed
```
### Seeding to a specific class with the same number in the factory which is 5 
```bash
php artisan db:seed--class=PostSeeder
```

