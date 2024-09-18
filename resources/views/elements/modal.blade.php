<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="livewire-bootstrap-modal" tabindex="-1"
     aria-hidden="true" style="z-index: 9999;" wire:ignore.self>
    <div class="modal-dialog {{$size ?? "modal-lg"}}">
        <div class="modal-content">
            @if ($alias)
                @livewire($alias, $params, key($activeModal))
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        let modalsElement = document.getElementById('livewire-bootstrap-modal');

        modalsElement.addEventListener('hidden.bs.modal', () => {
            Livewire.dispatch('resetModal');
        });

        Livewire.on('showBootstrapModal', (e) => {
            let modal = bootstrap.Modal.getOrCreateInstance(modalsElement);
            modal.show();
        });

        Livewire.on('hideModal', () => {
            let modal = bootstrap.Modal.getInstance(modalsElement);
            modal.hide();
            Livewire.dispatch('resetModal');
        });
    </script>
@endpush