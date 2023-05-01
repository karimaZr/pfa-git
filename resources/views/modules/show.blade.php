@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Détails du module') }}</div>

                <div class="card-body">
                    <p><strong>Code :</strong> {{ $module->Code }}</p>
                    <p><strong>Nom :</strong> {{ $module->Nom }}</p>
                    <p><strong>Filière :</strong> {{ $module->filiere->Nom }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')       
