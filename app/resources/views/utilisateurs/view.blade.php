@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pages-text.Stagiaire Details') }}</h1>
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
                              <label for="nom">{{ __('Pages-text.Stagiaire Name') }} :</label>
                              <p>{{$stagiaire->name}}</p>
                          </div>

                          <!-- Description Field -->
                          <div class="col-sm-12">
                              <label for="description">{{ __('Pages-text.Stagiaire Email') }} :</label>
                              <p>{{$stagiaire->email}}</p>

                          </div>

            
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>




@endsection