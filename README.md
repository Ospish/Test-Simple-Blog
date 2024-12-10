The simplest realization of a blog on Laravel, made in a day as a job application task.
Everything required by the task is working:
- 3 views: Home, Articles, Single
- Article Like/View API (Async AJAX)
- Article Comment API (Async AJAX, emulate time-consuming logic that shouldn't hurt user experience)
- Ready for testing (Data seeders in place to create articles, tags and comments)
Full task requirements: https://gist.github.com/an1creator/25e5428b6bb83e313541c18b0bb4c073

**Deployment:**<br>
git clone<br>
composer install<br>
npm install<br>
npm run build<br>
php artisan migrate<br>
php artisan db:seed<br>
php artisan serve<br>

![img_1.png](img_1.png)![img_3.png](img_3.png)![img_2.png](img_2.png)
