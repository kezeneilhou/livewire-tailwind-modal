# Laravel Livewire Tailwind Modals

A dynamic, global modal component for **Laravel 12** and **Livewire 4**, built to work seamlessly with **Livewire Flux**. This package allows you to load any Livewire component inside a modal without polluting your DOM with multiple modal instances.

## Requirements

- **PHP:** 8.2+
- **Laravel:** 12+
- **Livewire:** 4+
- **Livewire Flux:** (Must be installed and configured)

## Installation

You can install the package via composer:

```bash
composer require kezeneilhou/ivewire-tailwind-modal

```

## Setup

### 1. Configure the Layout

Add the `<livewire:modals/>` component to your main layout file (e.g., `layouts/app.blade.php`). This should be placed near the bottom of the `<body>` tag.

Ensure you have `@fluxScripts` included as well, which is required for the modal interactions.

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @fluxStyles
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">

        {{ $slot }}

        <livewire:modals />

        @fluxScripts
        @livewireScripts
    </body>
</html>

```

---

## Usage

### To call from a normal blade view

You can trigger the modal from standard JavaScript or Alpine context using `Livewire.dispatch`.

```html
<button
  type="button"
  onclick="Livewire.dispatch('showModal', {data: {'alias' : 'modals.example'}})"
>
  Click me to open modal
</button>
```

### Showing Modals

Show a modal by emitting the `showModal` event with the component alias. This can be done directly from a Livewire component view:

```html
<div>
  <button
    type="button"
    wire:click="$dispatch('showModal', {data: {'alias' : 'modals.example'}})"
  >
    Click me
  </button>
</div>
```

### Mount Parameters

Pass parameters to the component `mount` method after the alias. You can also define the modal `size` and `title` here.

**Supported Sizes:** `'1'` (sm), `'2'` (md/default), `'3'` (lg), `'4'` (xl), `'5'` (2xl), `'6'` (3xl).

```html
<div>
  <button
    type="button"
    wire:click="$dispatch('showModal', {data: {'alias' : 'modals.example', 'params' : {'name': 'test'}, 'size': '4', 'title': 'Test Modal'}})"
  >
    Click me to open modal
  </button>
</div>
```

The component `mount` method for the example above would look like this:

```php
namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Update extends Component
{
    public $user;

    // The 'params' passed in the dispatch are injected here
    public function mount($name)
    {
        // $name will be 'test'
    }

    public function render()
    {
        return view('users.update');
    }
}

```

### Hiding Modals

Hide the currently open modal by emitting the `hideModal` event:

```html
<button type="button" wire:click="$dispatch('hideModal')">
  {{ __('Close') }}
</button>
```

### Emitting Events

You can emit events inside your views:

```html
<button type="button" wire:click="$dispatch('hideModal')">
  {{ __('Close') }}
</button>
```

Or inside your components, just like any normal Livewire event:

```php
public function save()
{
    $this->validate();

    // save the record

    $this->dispatch('hideModal');
}

```

## Publishing Assets

### Custom View

Use your own modals view by publishing the package view. This is useful if you want to customize the Flux modal wrapper or change transition effects.

```console
php artisan vendor:publish --tag=livewire-tailwind-modal:views

```

Now edit the view file inside `resources/views/vendor/livewire-tailwind-modal`. The package will use this view to render the component.
