## Installation
1. Run following commands
```
cp .env.example .env
composer install
./vendor/bin/sail up
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail artisan migrate
sail artisan storage:link
npm install
npm run dev
sail artisan db:seed 
```
2. Open http://127.0.0.1:8085/
    - email: user@gmail.com
    - password: password

## API
- endpoint: http://localhost:8085/api/qr-code/generate
- bearer token: 1|LjhkjkGe0GD3xasi9rZDduzULE4gyBwXNLbuDf8P
- accepted params: content ("Mvix USA"), size (500), background_color ("rgba(255,255,255,1)"), fill_color ("rgba(0,0,0,1)")

## Screenshots
![Screenshot 2022-11-28 at 22 10 18](https://user-images.githubusercontent.com/88434147/204327722-3a6deeaa-083c-4199-b0a4-75dbdfc0b937.png)
![Screenshot 2022-11-28 at 11 15 23](https://user-images.githubusercontent.com/88434147/204199501-37c93ab6-a27f-48f3-a71a-8aceaa8b3aa3.png)
![Screenshot 2022-11-28 at 11 16 06](https://user-images.githubusercontent.com/88434147/204199509-e8278c9e-41d5-444a-af87-2fea95067300.png)
![Screenshot 2022-11-28 at 11 16 16](https://user-images.githubusercontent.com/88434147/204199513-3739e6bd-ed25-4bc1-8cf6-5f53e7d9de4f.png)
![Screenshot 2022-11-27 at 23 06 25](https://user-images.githubusercontent.com/88434147/204149641-e5e06a88-c1dc-4296-94e7-e0fdc32fe585.png)
