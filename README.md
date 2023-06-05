# PROJECT SETUP

## Back-End

- Export dump.sql to database. Scheme name should be quiz

``` 
cd Quiz/Back-End
composer install --ignore-platform-req=ext-http
```

- Copy-Paste **.env.example** file and rename to **.env**

``` 
php -S localhost:8000
```

## Front-End

``` 
cd Quiz/Front-End
npm install --force
npm run dev
```

- You need to visit only Front-End Url

You need to launch Back-End in one terminal and Front-End in other