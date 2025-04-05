<?php

namespace Hostmoz\BladeBootstrapComponents\Livewire;

use Livewire\Component;

class SelectPlus extends Component
{
    public $model;              // The model containing the options (e.g., App\Models\Item)
    public $displayField;       // The field to display (e.g., 'name')
    public $searchTerm = '';    // The current input value
    public $items = [];         // List of matching options
    public $showDropdown = false; // Controls dropdown visibility
    public $selectedItem = null;  // The currently selected item
    public $selectedItemId = null;  // The currently selected item
    public $isValid = true;      // Tracks if the input matches an option
    public $createLink = false;

    /** @var bool Controls the visibility of the modal */
    public $showModal = false;

    /** @var string The name of the new item to be added */
    public $newItemName = '';

    public $modalName = '';

    public $label = '';

    public $name;

    /**
     * Initialize the component with model and display field.
     *
     * @param string $model The model class name
     * @param string $displayField The field to display
     */
    public function mount($model, $displayField)
    {
        $this->model = $model;
        $this->displayField = $displayField;
        $this->loadInitialItems();
    }

    /**
     * Load initial items when the input is focused
     */
    public function loadInitialItems()
    {
            $this->items = $this->model::orderBy($this->displayField)
                ->limit(15)
                ->get();
    }

    public function showInitialItems()
    {
        $this->loadInitialItems();
        $this->showDropdown = true;
    }
    /**
     * Update the items list when the search term changes.
     */
    public function updatedSearchTerm()
    {
        if (strlen($this->searchTerm) > 0) {
            $this->items = $this->model::where($this->displayField, 'like', '%' . $this->searchTerm . '%')
                ->orderBy($this->displayField)
                ->limit(15)
                ->get();

            $this->showDropdown = true;
            $this->isValid = $this->model::where($this->displayField, $this->searchTerm)->exists();
        } else {
            // If search term is empty, show initial items
            $this->loadInitialItems();
            $this->isValid = true;
        }
    }

    /**
     * Select an item from the dropdown.
     *
     * @param int $itemId The ID of the item to select
     */
    public function selectItem($itemId)
    {
        $this->selectedItem = $this->model::find($itemId);
        $this->selectedItemId = $itemId;
        $this->searchTerm = $this->selectedItem->{$this->displayField};
        $this->showDropdown = false;
        $this->isValid = true;
    }

    // Handle blur: clear invalid input and close dropdown
    public function handleBlur()
    {
        // Always close the dropdown when the input loses focus
        $this->showDropdown = false;

        // If the input is invalid and not empty, clear it
        if (!$this->isValid && $this->searchTerm) {
            $this->searchTerm = '';
            $this->selectedItem = null;
        }
    }

    public function render()
    {
        return view('blade-bootstrap-components::livewire.select-plus');
    }
}
