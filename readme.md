````md
# Laravel Livewire Tailwind Modals

A dynamic global modal component for **Laravel 12** and **Livewire 4**, built to work seamlessly with **Livewire Flux**.

This package allows you to load any Livewire component inside a single reusable modal, without polluting your DOM with multiple modal instances.

---

## 📋 Requirements

- PHP 8.2+
- Laravel 12+
- Livewire 4+
- Livewire Flux (must be installed and configured)

---

## 📦 Installation

Install the package via Composer:

```bash
composer require kezeneilhou/livewire-tailwind-modal
````

---

## ⚙️ Setup

### 1. Publish Assets

Publish the JavaScript and view files:

```bash
php artisan vendor:publish --tag=livewire-tailwind-modal:assets
php artisan vendor:publish --tag=livewire-tailwind-modal:views
```

---

### 2. Register JavaScript (Vite)

Import the modal script into your main `app.js` file:

```js
// resources/js/app.js
import './vendor/livewire-tailwind-modal/modals.js';
```

Then rebuild assets:

```bash
npm run dev
```

---

### 3. Configure Layout

Add the `<livewire:modals />` component to your main layout (for example: `layouts/app.blade.php`).

Place it near the end of the `<body>` tag.

Make sure `@fluxScripts` and `@livewireScripts` are included.

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @fluxStyles
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">

    {{ $slot }}

    <!-- Global Modal -->
    <livewire:modals />

    @fluxScripts
    @livewireScripts
</body>
</html>
```

---

## 🚀 Usage

### Opening a Modal (Blade / JavaScript)

You can trigger a modal from a normal Blade view or JavaScript using `Livewire.dispatch`.

```html
<button
    type="button"
    onclick="Livewire.dispatch('showModal', { 
        data: { alias: 'modals.example' } 
    })"
>
    Open Modal
</button>
```

---

### Opening from a Livewire View

```html
<div>
    <button
        type="button"
        wire:click="$dispatch('showModal', { 
            data: { alias: 'modals.example' } 
        })"
    >
        Open Modal
    </button>
</div>
```

---

## 📌 Passing Parameters

You may pass parameters, size, and title when opening a modal.

### Supported Sizes

| Value        | Width              |
| ------------ | ------------------ |
| 1 or `sm`    | Small              |
| 2 or `md`    | Medium (default)   |
| 3 or `lg`    | Large              |
| 4 or `xl`    | Extra Large        |
| 5 or `2xl`   | 2XL                |
| 6 or `3xl`   | 3XL                |
| `4xl`-`7xl`  | Larger widths      |
| `full`       | Viewport width cap |

The modal width is responsive and capped to the viewport, so large sizes still fit on small screens.

---

### Example with Parameters

```html
<div>
    <button
        type="button"
        wire:click="$dispatch('showModal', {
            data: {
                alias: 'modals.example',
                params: { name: 'test' },
                size: '4',
                title: 'Test Modal'
            }
        })"
    >
        Open Modal
    </button>
</div>
```

---

### Receiving Parameters in Component

```php
namespace App\Http\Livewire\Users;

use Livewire\Component;

class Update extends Component
{
    public function mount($name)
    {
        // $name = "test"
    }

    public function render()
    {
        return view('users.update');
    }
}
```

---

## ❌ Closing Modals

### From Blade

```html
<button type="button" wire:click="$dispatch('hideModal')">
    Close
</button>
```

---

### From Livewire Component

```php
public function save()
{
    $this->validate();

    // Save logic...

    $this->dispatch('hideModal');
}
```

---

## 📤 Publishing Views (Customization)

If you want to customize the modal layout or animations, publish the package view:

```bash
php artisan vendor:publish --tag=livewire-tailwind-modal:views
```

The view will be copied to:

```
resources/views/vendor/livewire-tailwind-modal
```

You may edit it freely. The package will automatically use your customized view.

---

## 🛠 Troubleshooting

### JavaScript Not Loading

Make sure:

* Assets are published
* `modals.js` is imported in `app.js`
* `npm run build` has been executed

### Alpine Errors

Ensure Alpine is loaded before `modals.js`:

```js
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

import './vendor/livewire-tailwind-modal/modals.js';
```

---
