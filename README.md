# Mini Framework

A simple and mini framework developed to supply small applications in PHP based on [this article](https://github.com/PatrickLouys/no-framework-tutorial).  
Developed implementing controller/service/repository patterns.

---

## Requirements
- PHP >= 8
- Composer >= 2

---

## Few Dependencies
- filp/whoops
- symfony/http-foundation
- nikic/fast-route
- rdlowrey/auryn
- twig/twig
- catfan/medoo
- vlucas/phpdotenv
- symfony/var-dumper

Bootstrap 5 front-end framework included.

---

## Install

Copy a `.env` file.
```shell
cp .env.example cp .env
```

Install dependencies.
```shell
composer install
```

You can start with php server built in.
```shell
cd public
php -S localhost:8000
```

---

### Usage

There are example routes (`/example`) in `src/routes.php` file, applying the entire application flow.
