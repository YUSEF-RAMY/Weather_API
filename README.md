# 🌦️ Laravel Weather App

تطبيق طقس مبني باستخدام Laravel 12 و Livewire و Laravel Volt، يعرض توقعات الطقس لمدة 7 أيام باستخدام واجهة برمجة تطبيقات [WeatherAPI.com](https://www.weatherapi.com/).

## 🚀 الخصائص

- البحث عن حالة الطقس لأي مدينة.
- عرض الطقس الحالي بالتفصيل.
- عرض توقعات الأيام القادمة (7 أيام).


## 🧰 المتطلبات

- PHP >= 8.2
- Composer
- Laravel 11
- API Key من [WeatherAPI](https://www.weatherapi.com/)

## 🔧 التثبيت

```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
composer install
cp .env.example .env
php artisan key:generate
```
## 📦 التثبيت المكتبات
```bash
npm install
npm run dev
```
## 🔑 إعداد الـ API Key
```bash
API_KEY=your_api_key_here
```
## ⚙️ إعداد ملف الإعدادات `config/services.php`
```php
'API_KEY' => [
    'key' => env('API_KEY'),
],
```
▶️ التشغيل
```bash
composer run dev
```
---

