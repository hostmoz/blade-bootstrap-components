# Blade Bootstrap Components

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://packagist.org/packages/hostmoz/blade-bootstrap-components)
[![Build Status](https://img.shields.io/travis/hostmoz/blade-bootstrap-components/master.svg?style=flat-square)](https://travis-ci.org/hostmoz/blade-bootstrap-components)
[![Quality Score](https://img.shields.io/scrutinizer/g/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://scrutinizer-ci.com/g/hostmoz/blade-bootstrap-components)
[![Total Downloads](https://img.shields.io/packagist/dt/hostmoz/blade-bootstrap-components.svg?style=flat-square)](https://packagist.org/packages/hostmoz/blade-bootstrap-components)

A set of Blade components designed to rapidly build forms and UI elements
using [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/).

## Features

* **Rich Form Components:** Inputs, Textarea, Select, Checkbox, Radio, File Upload, Password (with toggle), Submit
  Button, Labels, Form Groups, Error display.
* **Advanced Form Inputs:** Includes components for Date Pickers (`date-picker`, `datepicker`, `date-time-picker`),
  Select2, SummerNote editor, Trix editor, Tag inputs, AutoComplete, Dual Listbox, and more.
* **Livewire Modals (Bootstrap 5):**
    * Provides a dynamic modal system powered by Livewire and AlpineJS, styled with Bootstrap 5.
    * Open modals, pass parameters (with automatic model binding), and manage state effortlessly.
    * Inspired by `wire-elements/modal` but adapted for Bootstrap.
    * Configure modal behavior (max width, close on escape/click away) per modal component.
* **Other UI Elements:** Delete Button component.
* **Livewire Integration:** Provides a `dependent-selects` component for cascading dropdowns.
* **Automatic Old Input & Errors:** Components automatically handle re-populating forms
  with [old input](https://laravel.com/docs/requests#old-input) and
  displaying [validation errors](https://laravel.com/docs/validation#quick-displaying-the-validation-errors).
* **Form Method Spoofing:** Automatically
  handles [form method spoofing](https://laravel.com/docs/routing#form-method-spoofing) for `PUT`, `PATCH`, `DELETE`
  requests.
* **Highly Customizable:** Publish and modify component views, component classes, and configuration.
* **Configurable Prefix:** Use the default `bootstrap::` prefix or define your own.

## Requirements

* PHP 7.4+
* Laravel 8+
* Bootstrap 5 (CSS/JS must be included separately in your project)
* Livewire v3

## Installation

You can install the package via composer:

```bash
composer require hostmoz/blade-bootstrap-components
```

## Setup

1. **Publish Assets (Required for JS Components):**
   ```bash
   php artisan vendor:publish --tag=bootstrap-assets --force
   ```

2. **Add Livewire Modal Component Directive:** Add `<livewire:bootstrap-modal />` (or `@livewire('bootstrap-modal')`)
   to your main layout file (usually `app.blade.php`), typically just before the closing `</body>` tag.

   ```blade
   <!DOCTYPE html>
   <html>
   <head>
       {{-- ... head content ... --}}
       @livewireStyles
       @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Or your asset bundling --}}
   </head>
   <body>
       {{ $slot }} {{-- Or @yield('content') --}}

       @livewireScripts
       @livewire('bootstrap-modal') {{-- Or <livewire:bootstrap-modal /> --}}
   </body>
   </html>
   ```

3. **Publish Configuration (Optional):**
   ```bash
   php artisan vendor:publish --tag=bootstrap-config
   ```
   Customize settings in `config/blade-bootstrap-components.php` (e.g., prefix, default JS include).

## Usage

### Standard Components

Components are used with the syntax `<x-prefix::directory.component-name />`.

**Default Prefix Example (`bootstrap`):**

```blade
{{-- Basic Form --}}
<x-bootstrap::form.form method="POST" action="/users">
    <x-bootstrap::form.input name="name" label="Your Name" />
    <x-bootstrap::form.select name="country_code" :options="$countries" label="Select a Country"/>
    <x-bootstrap::form.textarea name="bio" label="Biography" />
    <x-bootstrap::form.checkbox name="agree_terms" label="Agree with terms" />
    <x-bootstrap::form.submit value="Register" />
</x-bootstrap::form.form>
```

### Livewire Modals (Bootstrap 5 Style)

1. **Create a Modal Component:** Create a Livewire component that extends
   `Hostmoz\BladeBootstrapComponents\Contracts\ModalComponent`.

   ```bash
   php artisan make:livewire EditUserModal
   ```

   ```php
   <?php

   namespace App\Livewire;

   use Hostmoz\BladeBootstrapComponents\Components\Elements\ModalComponent;

   class EditUserModal  extends ModalComponent
   {
       public User $user;
       public string $name = '';
       public string $email = '';

       // Optional: Set a title for the modal header
       public function mount(User $user)
       {
           $this->user = $user;
           $this->name = $user->name;
           $this->email = $user->email;
       }

       public function render()
       {
           // Add modal-title attribute for the header title
           return view('livewire.edit-user-modal', [
               'modalTitle' => 'Edit User: ' . $this->user->name
           ]);
       }

       public function save()
       {
           $this->validate(['name' => 'required', 'email' => 'required|email']);
           $this->user->update(['name' => $this->name, 'email' => $this->email]);

           // Close the modal after saving
           $this->dispatch('closeModal');
       }
   }
   ```

   **Modal View (`resources/views/livewire/edit-user-modal.blade.php`):**

   ```blade
   <div>
       {{-- The modal structure (backdrop, dialog, content, header) is handled by the parent <livewire:bootstrap-modal /> --}}
       {{-- You only need to provide the *content* for the modal body and potentially a footer --}}
       
       <div class="modal-body">
           <p>Editing user: {{ $user->id }}</p>
           <div class="mb-3">
               <label for="name" class="form-label">Name</label>
               <input type="text" wire:model="name" class="form-control" id="name">
               @error('name') <span class="text-danger">{{ $message }}</span> @enderror
           </div>
           <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" wire:model="email" class="form-control" id="email">
               @error('email') <span class="text-danger">{{ $message }}</span> @enderror
           </div>
       </div>
       <div class="modal-footer">
           <button type="button" class="btn btn-secondary" wire:click="$dispatch('closeModal')">Cancel</button>
           <button type="button" class="btn btn-primary" wire:click="save">Save Changes</button>
       </div>
   </div>
   ```

2. **Trigger the Modal:** Dispatch the `openModal` event.

   ```blade
   {{-- From a regular Blade view --}}
   <button type="button" class="btn btn-primary" onclick="Livewire.dispatch('openModal', { component: 'edit-user-modal', arguments: { user: {{ $user->id }} }})">
       Edit User (ID: {{ $user->id }})
   </button>

   {{-- From another Livewire component's view --}}
   <button type="button" class="btn btn-warning" wire:click="$dispatch('openModal', { component: 'edit-user-modal', arguments: { user: {{ $someUserId }} }})">
       Edit Another User
   </button>
   ```

### Dependent Selects (Livewire)

```blade
<livewire:bootstrap::dependent-selects
    name="location"
    :options="['countries' => $countries, 'states' => $states, 'cities' => $cities]"
    labels="['countries' => 'Country', 'states' => 'State', 'cities' => 'City']"
    wire-model-names="['countries' => 'selectedCountry', 'states' => 'selectedState', 'cities' => 'selectedCity']"
/>
```

Refer to the component source files in `vendor/hostmoz/blade-bootstrap-components/resources/views/` for available
attributes and slots.

<img src="https://raw.githubusercontent.com/hostmoz/blade-bootstrap-components/main/resources/screenshot.png" alt="Component Screenshot"/>

## Customization

You can customize the look and behavior of the components:

1. **Configuration:** Publish the config file as shown in the Setup section.
2. **Views:** Publish the Blade views to modify the HTML structure:
   ```bash
   php artisan vendor:publish --tag=bootstrap-views
   ```
   The views will be placed in `resources/views/vendor/blade-bootstrap-components/`.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email elisio.leonardo@gmail.com instead of using the issue tracker.

## Credits

- [Elísio Leonardo](https://github.com/backstageel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
