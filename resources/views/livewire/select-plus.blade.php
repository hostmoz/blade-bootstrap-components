<div class="mb-3">
    <div class="position-relative">
        <x-bootstrap::form.label :label="$label" :for="$name"/>
        <div class="input-group">
            <div class="position-relative" style="flex: 1;">
                <input
                        type="text"
                        class="form-control"
                        wire:model.live="searchTerm"
                        wire:click="showInitialItems"
                        wire:blur="handleBlur"
                        placeholder="Search or add..."
                        style="padding-right: 30px;"
                />
                <input type="hidden" name="{{$name}}" value="{{$selectedItemId}}">
                <div class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;">
                    <i class="fas fa-chevron-down text-muted"></i>
                </div>
            </div>
            <div class="input-group-append">
                <button class="btn btn-primary" wire:click="$dispatch('openModal', { component: '{{$modalName}}', arguments: { user: {{ 1 }} }})">+</button>
            </div>
        </div>

        @if($showDropdown && count($items) > 0)
            <div class="dropdown-menu show" style="position: absolute; width: calc(100% - 45px); max-height: 300px; overflow-y: auto; z-index: 1000; left: 0; top: 100%;">
                @foreach($items as $item)
                    <a class="dropdown-item" href="#" wire:click.prevent="selectItem({{ $item->id }})">
                        {{ $item->{$displayField} }}
                    </a>
                @endforeach
                @if($createLink)
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" wire:click.prevent="$dispatch('openModal', { component: '{{$modalName}}', arguments: { user: {{ 1 }} }})">
                        Create new item
                    </a>
                @endif
            </div>
        @endif
    </div>
</div>


