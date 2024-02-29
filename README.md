# Laravel Nova issue #6157

[Nova issue link](https://github.com/laravel/nova-issues/issues/6157)

### How to reproduce the issue

- Create a database and update the `.env` file
- Run these commands:
```bash
composer install
php artisan nova:install
php artisan migrate
php artisan db:seed
php artisan nova:user
```
- Visit any Nova _Orders_ resource (`/nova/resources/orders/1` for example)
- Try to select some _Order Item_, as you would try to execute "Test sole action" action.


### Resources

- [Nova `sole()` actions](https://nova.laravel.com/docs/actions/registering-actions.html#sole-actions)
