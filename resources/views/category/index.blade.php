@extends('layouts.app-dashboard')

@section('scripts')

  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Bootstrap CSS --  SI SE QUITA ESTE ENLACE, EL BOTÓN PRIMARY TOMA FONDO VERDE-->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
  <!-- Font Awesome CSS -->
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

@endsection

@section('content')

<div class="col">
    @include('custom.message')
    <div class="col">
        <div class="dashboard-right-side">
            <div class="float-left">
                <h2>Àreas</h2>
            </div>
            @if (auth()->user()->role_id === "Admin")
            <button type="button" class="cta" data-toggle="modal" data-target="#create-category">
                Afegir una àrea
            </button>
            @include('category.create')
            @endif
        </div>
        <div class="dashboard-right-side">
            <table class="table table-striped table-borderless">
                <thead class="thead text-uppercase">
                    <tr>
                        <td><small><b>Nom de l'àrea</b></small></td>
                        <td><small><b>Descripció de l'àrea</b></small></td>
                        <td colspan="3"><small><b>Accions</b></small></td>
                    </tr>
                </thead>
                @if ($categories)
                @foreach($categories as $category)
                @can('view-any', $category)
                <tr>
                    <td class="icon-text">
                        <div class="primary-green">
                            <a href="" data-toggle="modal" data-target="#show-category{{$category->id}}" class="primary-green" category="button">
                            <i class="icofont-list"></i>{{$category->name}}
                            </a>
                        </div>
                        @include('category.show')
                        </td>
                    <td>{{Str::limit($category->description, 40)}}</td>
                    <td class="actions">
                        @can('update', $category)
                        <div class="primary">
                            <a href="" data-toggle="modal" data-target="#edit-category{{$category->id}}" class="primary-green" category="button">
                                <i class="icofont-ui-edit"></i>
                            </a>
                        </div>
                        @include('category.edit')
                        @endcan
                    </td>
                    <td class="actions">
                        @can('destroy', $category)
                        <div class="danger">
                            <a style="color:white" data-toggle="modal" data-target="#destroy-category{{$category->id}}" class="danger" category="button">
                                <i class="icofont-ui-delete"></i>
                            </a>
                        </div>
                        @include('category.destroy')
                        @endcan
                    </td>
                </tr>
                @endcan
                @endforeach
                @endif
            </table>
        </div>
        <div class="dashboard-right-side d-flex align-items-center justify-content-end">
            <div><small>Mostrant {{ count($categories) }} de {{ $categories->total() }}</small></div>
            <div> {{ $categories->links() }}</div>
        </div>
    </div>
</div>



@endsection

