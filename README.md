# Requirement:
Create a simple PHP calculator with operations plus, minus, multiply, divide.
- consider future extensions with other operations (without worries of breaking the existing code).
- use namespaces and PHP7 features
- follow OOP and SOLID principles
- catch all necessary exceptions
- create unit tests

------

# How to use:

## Install
- Ensure you have docker installed
- Run `./vendor/bin/sail up`

## Use the application
- Open [http://localhost:8006/](http://localhost:8006/)
- Feel free to update `CALCULATOR_MAX_SUPPORTED_VALUE` in .env

## How to test
- Run `./vendor/bin/sail test`

## ToDos:
- Make use of MySQL/Redis or remove them from sail (Docker)
- Set maximum allowed number editable and pass it as an argument
- Set restriction to maximum number of digits after dot (decimals)
- Create dusk tests (where we test HTML pages)
- Use Decimal instead of float for better precision
- Add more operations, such as modulo, pow, log, etc
- Add operations with only 1 number, such as sqrt, sin, cos, etc.

