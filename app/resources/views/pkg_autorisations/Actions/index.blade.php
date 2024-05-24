<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
@extends('layouts.app')
@section('title', ('app.add') . ' ' . ('pkg_autorisations/actions.singular'))
@section('content')

<body class="sidebar-mini" style="height: auto;">

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
                  <a href={{route('actions.create')}} class="btn btn-info">
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
                    <tr>
                      <td>create-ProjectsController</td>
                      <td>ProjectsController</td>
                      <td>
                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>edit-ProjectsController</td>
                      <td>ProjectsController</td>
                      <td>
                        <a href="./edit.php" class="btn btn-sm btn-default"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>delete-TasksController</td>
                      <td>TasksController</td>
                      <td>
                        <a href="./edit.php" class="btn btn-sm btn-end"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                    <!-- Add more rows for other actions -->
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2">
                        <ul class="pagination justify-content-end">
                          <li class="page-item"><a class="page-link text-secondary" href="#"><</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item active">
                            <a class="page-link" href="#">2 </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">4</a></li>
                          <li class="page-item"><a class="page-link text-secondary" href="#">></a></li>
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