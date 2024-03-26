@extends('layouts.app')
@section('content')

 

    <!-- Main content -->
    <section class="content mt-5">

      @if (session('success'))
      <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('success') }}.
      </div>
      @endif
      @if($errors->has('User_exist'))
          <div class="alert alert-danger">
              {{ $errors->first('User_exist') }}
          </div>
      @else
          @if($errors->has('unexpected_error'))
              <div class="alert alert-danger">
                  {{ $errors->first('unexpected_error') }}
              </div>
          @endif
      @endif

      <div class="container-fluid">
        <div class="">
            <!-- general form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">{{ __('utilisateurs/message.Add User') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('utilisateurs.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="prenom">{{ __('utilisateurs/message.User Name') }}</label>
                    <input type="text" class="form-control" value="{{ old('prenom') }}" name="prenom" id="prenom" placeholder="{{ __('utilisateurs/message.Enter User Name') }}">
                    <div style="color:red">
                        @error("prenom")
                        {{$message}}
                        @enderror
                        </div>
                  </div>
              
                  <div class="form-group">
                    <label for="nom">{{ __('utilisateurs/message.User Lastname') }}</label>
                    <input type="text" class="form-control" value="{{ old('nom') }}" name="nom" id="nom" placeholder="{{ __('utilisateurs/message.Enter User Lastname') }}">
                    <div style="color:red">
                        @error("nom")
                        {{$message}}
                        @enderror
                        </div>
                  </div>


                  <div class="form-group">
                    <label for="email">{{ __('utilisateurs/message.User Email') }}</label>
                    <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="{{ __('utilisateurs/message.Enter User Email') }}">
                    <div style="color:red">
                        @error("email")
                        {{$message}}
                        @enderror
                        </div>
                    
                  </div>
               
                  <div class="form-group">            
                    <label for="password">{{ __('utilisateurs/message.Password') }}</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('utilisateurs/message.Enter User Password') }}" required autocomplete="new-password" />
                    @if($errors->has('password'))
                     <div class="text-danger">
                        {{ $errors->first('password') }}
                    </div>
                    @endif   
              </div>
        
        
              <div class="form-group">                  
                <label for="password_confirmation">{{ __('utilisateurs/message.Confirm Password') }} </label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('utilisateurs/message.Confirm Password') }}" value="{{old('password_confirmation')}}" required autocomplete="new-password" />
                @if($errors->has('password_confirmation'))
                 <div class="text-danger">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif   
          </div>
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">{{ __('utilisateurs/message.Add User') }}</button>
           
                    <a href="{{route('utilisateurs.index')}}" type="submit" class="btn btn-secondary">{{ __('utilisateurs/message.Cancel') }}</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>


            <!-- /.card -->

@endsection
