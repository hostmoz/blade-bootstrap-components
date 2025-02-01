<?php

namespace Hostmoz\BladeBootstrapComponents\Livewire;

use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use Livewire\Component;

class DependentSelects extends Component
{
    /**
     * Nome dos campos de país, província e distrito.
     * Exemplo de uso: 'living_country_id', 'living_province_id', 'living_district_id'
     */
    public $countryField;

    public $provinceField;

    public $districtField;

    public $countryLabel;
    public $provinceLabel;
    public $districtLabel;
    /**
     * Valores selecionados.
     */
    public $selectedCountry = null;

    public $selectedProvince = null;

    public $selectedDistrict = null;

    /**
     * Opções para cada caixa de seleção.
     */
    public $countries = [];

    public $provinces = [];

    public $districts = [];

    /**
     * Montar o componente e carregar os países.
     */
    public function mount($countryField, $provinceField, $districtField, $selectedCountry = null, $singleCountry=false,$selectedProvince = null, $selectedDistrict = null,$countryLabel = 'País',$provinceLabel = 'Província',$districtLabel = 'Distrito')
    {
        $this->countryField = $countryField;
        $this->provinceField = $provinceField;
        $this->districtField = $districtField;

        $this->selectedCountry = $selectedCountry;
        $this->selectedProvince = $selectedProvince;
        $this->selectedDistrict = $selectedDistrict;

        if($singleCountry){
            $this->countries = Country::where('id', $this->selectedCountry)->orderBy('name')->pluck('name', 'id')->toArray();
        }else{
            $this->countries = Country::orderBy('name')->pluck('name', 'id')->toArray();
        }

        // Se já houver um país selecionado, carregar as províncias correspondentes
        if ($this->selectedCountry) {
            $this->provinces = Province::where('country_id', $this->selectedCountry)->orderBy('name')->pluck('name', 'id')->toArray();
        }

        // Se já houver uma província selecionada, carregar os distritos correspondentes
        if ($this->selectedProvince) {
            $this->districts = District::where('province_id', $this->selectedProvince)->orderBy('name')->pluck('name', 'id')->toArray();
        }
    }

    /**
     * Atualizar as províncias quando um país é selecionado.
     */
    public function updatedSelectedCountry($countryId)
    {
        $this->provinces = Province::where('country_id', $countryId)->orderBy('name')->pluck('name', 'id');
        if($this->provinces->isEmpty()){
            $this->provinces = Province::where('id', 12)->pluck('name', 'id');
        }
        $this->selectedProvince = null;
        $this->districts = [];
        $this->selectedDistrict = null;

        $this->dispatch('dependentSelectsUpdated', [
            'field' => $this->provinceField,
            'selected' => $this->selectedProvince,
        ]);

        $this->dispatch('dependentSelectsUpdated', [
            'field' => $this->districtField,
            'selected' => $this->selectedDistrict,
        ]);
    }

    /**
     * Atualizar os distritos quando uma província é selecionada.
     */
    public function updatedSelectedProvince($provinceId)
    {
        $this->districts = District::where('province_id', $provinceId)->orderBy('name')->pluck('name', 'id')->toArray();
        $this->selectedDistrict = null;

        $this->dispatch('dependentSelectsUpdated', [
            'field' => $this->provinceField,
            'selected' => $this->selectedProvince,
        ]);
        $this->dispatch('dependentSelectsUpdated', [
            'field' => $this->districtField,
            'selected' => $this->selectedDistrict,
        ]);
    }

    public function updatedSelectedDistrict($districtId)
    {
        $this->dispatch('dependentSelectsUpdated', [
            'field' => $this->districtField,
            'selected' => $districtId,
        ]);
    }

    /**
     * Renderizar a view do componente.
     */
    public function render()
    {
        return view('blade-bootstrap-components::livewire.dependent-selects');
    }
}
