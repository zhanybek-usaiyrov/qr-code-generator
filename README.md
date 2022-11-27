## Installation
1. Run following commands
```
cp .env.example .env
composer install
./vendor/bin/sail up
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail artisan migrate
npm install
npm run dev
```
2. Open http://127.0.0.1
