# TDD-PHPUNIT

Basic use of TDD with PHPUnit for objects.

## REQUIREMENTS
- PHP (7.3.11) ou última versão (recomendado)
- Composer (1.10.5) ou última versão (recomendado)

## DEVELOPMENT

After installation requirements, let's put it to work!
Execute the following steps:
- Create a `composer.json` with this configuration:
    {
      "autoload": {
          "psr-4": {
              "Alura\\Leilao\\": "src/"
          }
      },
      "require-dev": {
          "phpunit/phpunit": "^9.1"
      }
    }
This configuration define a mapping from namespaces to path and a require-dev for use phpunit

- run in folder terminal `composer dump` ou `composer dumpautoload` - This commands has the same effect to run *autoload* file configuration

- In terminal run `composer install` for install the dev dependencies of composer.json


