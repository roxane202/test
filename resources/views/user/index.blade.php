@extends('layouts/app')

@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-success" user="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

<div>

<button type="button" style="margin-top:50px;margin-left:1000px;width:150px" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nouvel utilisateur</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content col-md-14 ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvel utilisateur </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/user-create" method="post">
        @csrf
        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
          
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                      
                            </div>
                        <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right"> Role:</label>
                        <select class="form-select form-select-sm col-md-8  " aria-label=".form-select-sm example" name="role">
                        <option selected>Choisissez un rôle</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role -> name }}</option>
                        @endforeach
                      </select>
                  </div>

          <div class="modal-footer ">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregister</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<!-- Data Table  -->

<div class="table-responsive">
     <table class="table text-nowrap">
          <thead>
              <tr>
                 <th class="border-top-0 table-light" scope="col">Id</th>
                <th class="border-top-0 table-light" scope="col">Nom</th>
                <th class="border-top-0 table-light" scope="col">Email</th>
                 <th class="border-top-0 table-light" scope="col">Role</th>
                <th class="border-top-0 table-light" scope="col">Actions</th>
               </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                            <tr>
                                            <td>{{ $user -> id }}</td>
                                            <td>{{ $user -> name}}</td>
                                            <td>{{ $user -> email}}</td>
                                            <td>{{  name }}</td>
 <td> 
  <a href="#" class="btn btn-success" user="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id}}"> Editer</a>  
  
  <a href="#" class="btn btn-secondary" user="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id}}">Supprimer </a>  
  <div class="modal fade" id="deleteModal{{ $user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                Voulez vous vraiment supprimer ' {{ $user -> name}} ' ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="/delete/{{ $user->id }}" method="post">
                @csrf
              @method('DELETE')
                <button onclick="window.location.href='/delete/{{ $user->id }}'" class="btn btn-danger">Supprimer</button>
          </form>
              </div>
            </div>
          </div>
        </div>
 
 
  </div>
 
   </td></tr>
 @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>
@endsection