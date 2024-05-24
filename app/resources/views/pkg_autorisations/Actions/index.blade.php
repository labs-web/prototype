<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
@extends('layouts.app')
@section('title', ('app.add') . ' ' . ('pkg_autorisations/actions.singular'))
@section('content')

<body class="sidebar-mini" style="height: auto;">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


  <div class="wrapper">
    <!-- Navigation -->
    
    <!-- Barre latérale -->
   


    <!-- Content Wrapper. Contains page content -->
   
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Les actions</h1>
              </div>
              <div class="col-sm-6">
                <div class="float-sm-right">
                  <a href="#" class="btn btn-secondary mx-5 ">
                    <i class="fas fa-download"></i> Télécharger les Actions
                  </a>
                  <a href="{{route('actions.create')}}" class="btn btn-info">
                    <i class="fas fa-plus"></i> Ajouter
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row" >
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="search" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="form-group form-group-sm col-md-4">
                    <label for="controllerSelect">{{ __('Autorisation/GestionAutorisation/message.Controller') }}</label>
                      <select class="form-control" id="controllerSelect">
                        <option value="">All Controllers</option>
                          @foreach ($controllers as $controller)
                            <option value="{{$controller->nom}}">{{$controller->nom}}</option>
                          @endforeach
                       </select>
                  </div>
                </div>
                <!-- /.card-header -->

                <table class="table table-striped text-nowrap">
                  <thead>
                    <tr>
                      <th>Nom de l'action</th>
                      <th>Controller</th>
                      <th class="action-column" style="width: 150px;">Action </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($actions as $action)
                    <tr>
                    <td>{{ $action->nom }}</td>
                    <td>{{ $action->controller->nom }}</td>
                      <td>
                      <a href="{{ route('actions.edit', $action->id) }}" class="btn btn-sm btn-default">
                        <i class="fas fa-edit"></i>
                   </a>
                       <form action="{{ route('actions.destroy', $action->id) }}" method="POST" style="display:inline;">
                         @csrf
                        @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">
                               <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    <!-- Add more rows for other actions -->
                  </tbody>
                  <tfoot>
                  <tr>
                    <td colspan="3">
                        <ul class="pagination justify-content-end">
                         {{ $actions->links() }}
                        </ul>
                     </td>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card -->
            </div>
          </div>
 
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Inclure le pied de page -->
   

  </div>

  <!-- Inclure le script -->

@endsection