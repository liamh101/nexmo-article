# Phone Debugger Simple

This Repo was made in cooperature with Nexmo for creating a phone debugger.

## Orignal Article

https://www.nexmo.com/blog/2019/11/14/creating-a-phone-status-checker-with-nexmo-and-php-dr

## Requirements

**Backend and Environment**

[Docker](https://www.docker.com/)

[Composer](https://getcomposer.org/)

[Ngrok](https://ngrok.com/)

## Setup

Step 1: `composer install`

Step 2: Create a `.env.local` that contains the Nexmo details (overriding the blank details in the default `.env`) 

Step 3: `docker-compose up -d` This sets up PHP and NGINX. 

## Misc

Web address: `localhost:8080`
