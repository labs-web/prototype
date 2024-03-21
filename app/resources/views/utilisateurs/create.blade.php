@extends('layouts.app')
@section('content')

 

    <!-- Main content -->
    <section class="content mt-5">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">{{ __('utilisateurs/messages.Add User') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('utilisateurs.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">{{ __('utilisateurs/messages.User Name') }}</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="Name" placeholder="{{ __('utilisateurs/messages.Enter User Name') }}">
                    <div style="color:red">
                        @error("name")
                        {{$message}}
                        @enderror
                        </div>
                  </div>
              
                  <div class="form-group">
                    <label for="Name">{{ __('utilisateurs/messages.User Lastname') }}</label>
                    <input type="text" class="form-control" value="{{ old('lastname') }}" name="lastname" id="Name" placeholder="{{ __('utilisateurs/messages.Enter User Lastname') }}">
                    <div style="color:red">
                        @error("lastname")
                        {{$message}}
                        @enderror
                        </div>
                  </div>


                  <div class="form-group">
                    <label for="email">{{ __('utilisateurs/messages.User Email') }}</label>
                    <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="{{ __('utilisateurs/messages.Enter User Email') }}">
                    <div style="color:red">
                        @error("email")
                        {{$message}}
                        @enderror
                        </div>
                    
                  </div>
               
                  <div class="form-group">            
                    <label for="password">{{ __('utilisateurs/messages.Password') }}</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('utilisateurs/messages.Enter User Password') }}" required autocomplete="new-password" />
                    @if($errors->has('password'))
                     <div class="text-danger">
                        {{ $errors->first('password') }}
                    </div>
                    @endif   
              </div>
        
        
              <div class="form-group">                  
                <label for="password_confirmation">{{ __('utilisateurs/messages.Confirm Password') }} </label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('utilisateurs/messages.Confirm Password') }}" value="{{old('password_confirmation')}}" required autocomplete="new-password" />
                @if($errors->has('password_confirmation'))
                 <div class="text-danger">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif   
          </div>
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">{{ __('utilisateurs/messages.Add User') }}</button>
           
                    <a href="{{route('utilisateurs.index')}}" type="submit" class="btn btn-secondary">{{ __('utilisateurs/messages.Cancel') }}</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>


            <!-- /.card -->

@endsection
