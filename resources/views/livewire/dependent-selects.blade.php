<div class="row p-2">
    <!-- Seleção de País -->
    <div class="form-group col-4">
        <label for="{{ $countryField }}">{{$countryLabel}}</label>
        <select id="{{ $countryField }}" class="form-control" wire:model.live="selectedCountry"
                name="{{$countryField}}">
            <option value="">Selecione um país</option>
            @foreach($countries as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('selectedCountry') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Seleção de Província -->
    <div class="form-group col-4">
        <label for="{{ $provinceField }}">{{$provinceLabel}}</label>
        <select id="{{ $provinceField }}" class="form-control" name="{{$provinceField}}"
                wire:model.live="selectedProvince" {{ empty($provinces) ? 'disabled' : '' }}>
            <option value="">Selecione uma província</option>
            @foreach($provinces as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('selectedProvince') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <!-- Seleção de Distrito -->
    <div class="form-group col-4">
        <label for="{{ $districtField }}">{{$districtLabel}}</label>
        <select id="{{ $districtField }}" class="form-control" name="{{$districtField}}"
                wire:model.live="selectedDistrict" {{ empty($districts) ? 'disabled' : '' }}>
            <option value="">Selecione um distrito</option>
            @foreach($districts as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('selectedDistrict') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
