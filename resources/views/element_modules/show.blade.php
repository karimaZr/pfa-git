@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
    <h1>Details de l'élément de module</h1>

less

<table>
    <tr>
        <td>Code:</td>
        <td>{{ $element_module->Code }}</td>
    </tr>
    <tr>
        <td>Nom:</td>
        <td>{{ $element_module->Nom }}</td>
    </tr>
    <tr>
        <td>Coefficient:</td>
        <td>{{ $element_module->coifficent }}</td>
    </tr>
    <tr>
        <td>Module:</td>
        <td>{{ $element_module->module->nom }}</td>
    </tr>
    <tr>
        <td>Professeur:</td>
        <td>{{ $element_module->user->nom }}</td>
    </tr>
</table>
<br>

<a href="{{ route('element_modules.index') }}">Retour à la liste des éléments de module</a>
<br>
<a href="{{ route('element_modules.edit', $element_module->id) }}">Modifier l'élément de module</a>

@include('layouts.footer')       
