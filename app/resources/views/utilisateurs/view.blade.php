@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('utilisateurs/messages.User Details') }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
   
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="col-sm-12">
                              <label for="nom">{{ __('utilisateurs/messages.User Name') }} :</label>
                              <p>{{$utilisateur->name}}</p>
                          </div>

                          <div class="col-sm-12">
                            <label for="lastname">{{ __('utilisateurs/messages.User Last Name') }} :</label>
                            <p>{{$utilisateur->name}}</p>
                        </div>

                          <!-- Description Field -->
                          <div class="col-sm-12">
                              <label for="description">{{ __('utilisateurs/messages.User Email') }} :</label>
                              <p>{{$utilisateur->email}}</p>

                          </div>

            
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>




@endsection