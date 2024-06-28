# Laravel Livewire Modals

This package allows you to dynamically show your Laravel Livewire 3 components inside tailwind modals.

 **Warning:** This package is not backward compatible with Livewire 2.

## Documentation

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
    - [Modal Views](#modal-views)
    - [Showing Modals](#showing-modals)
    - [Mount Parameters](#mount-parameters)
    - [Hiding Modals](#hiding-modals)
    - [Emitting Events](#emitting-events)
- [Publishing Assets](#publishing-assets)
    - [Custom View](#custom-view)

## Installation


Require the package:

```console
composer require kezeneilhou/livewire-tailwind-modal
```

Add the `livewire:modals` component to your app layout view:

```html
<livewire:modals/>
<livewire:scripts/>
<script src="{{ asset('js/app.js') }}"></script>
```

Require `../../vendor/kezeneilhou/livewire-tailwind-modal/resources/js/modals` in your app javascript file:

```javascript
import '../../vendor/kezeneilhou/livewire-tailwind-modal/resources/js/modals.js';
```

## Usage

 
### To call from a normal blade view

```html
<button type="button" onclick="Livewire.dispatch('showModal', {data: {'alias' : 'modals.example'}})">
                            Click me to open modal
                        </button>
```

### Showing Modals

Show a modal by emitting the `showModal` event with the component alias:

```html
<div>
    <button type="button"wire:click="$dispatch('showModal', {data: {'alias' : 'modals.example'}})">
Click me
    </button>
</div>
```

### Mount Parameters

Pass parameters to the component `mount` method after the alias:

```html
<div>
    <button type="button" wire:click="$dispatch('showModal', {data: {'alias' : 'modals.example', 'params' : {'name': 'test'}, 'size': '4', 'title': 'Test Modal'}})">
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
    
    public function mount(User $user)
    {
        $this->user = $user;
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

Use your own modals view by publishing the package view:

```console
php artisan vendor:publish --tag=livewire-tailwind-modal:views
```

Now edit the view file inside `resources/views/vendor/livewire-tailwind-modal`. The package will use this view to render the component.
