# gmj-laravel_livewire2_content

need tailwindcss support / gsap js

**composer require gmj/laravel_livewire2_content**

in terminal run:

```
php artisan vendor:publish --provider="GMJ\LaravelLivewire2Content\LaravelLivewire2ContentServiceProvider" --force
php artisan migrate
php artisan db:seed --class=LaravelLivewire2ContentSeeder
```

package for test<br>
composer.json#autoload-dev#psr-4: "GMJ\\LaravelLivewire2Content\\": "package/laravel_livewire2_content/src/",<br>
config: GMJ\LaravelLivewire2Content\LaravelLivewire2ContentServiceProvider::class,
