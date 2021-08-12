@extends('layouts/app')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div>
<button type="button" style="margin-top:50px;margin-left:1000px;width:150px" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nouveau role</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <d    iv class="modal-body">
        <form action="/role-store" method="post">
        @csrf
          <div class="mb-3">
            <label for="name" class="col-form-label">Nom</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="mb-3">
            <label for="slug" class="col-form-label">Slug:</label>
            <input type="text" name="slug" class="form-control" id="slug">
          </div>
          <div class="mb-3">
            <label for="permission" class="col-form-label">Permissions:</label>
            @foreach($permissions as $permission)     
            <div class="form-check">
  <input class="form-check-input" type="checkbox" value="{{$permission ->id}}" name="permission[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    {{$permission ->name}}
  </label>
</div>
@endforeach
          </div>
        
          <div class="modal-footer">
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
                                            <th class="border-top-0 table-light" scope="col">Slug</th>
                                            <th class="border-top-0 table-light" scope="col">Permissions</th>
                                            <th class="border-top-0 table-light" scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                            <tr>
                                            <td>{{ $role -> id }}</td>
                                            <td>{{ $role -> name}}</td>
                                            <td>{{ $role -> slug}}</td>
                                            <td>
                                              <ul>
                                                @foreach($role->permissions as $permission)
                                                <li>
                                                {{ $permission -> name}}
                                                </li>
                                                @endforeach
                                              </ul>

                                            </td>
 <td>  
  <a href="#" class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $role->id}}"> Editer</a>  
  
  <a href="#" class="btn btn-secondary" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $role->id}}">Supprimer </a>  
  <div class="modal fade" id="deleteModal{{ $role->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                Voulez vous vraiment supprimer ' {{ $role -> name}} ' ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="/delete/{{ $role->id }}" method="post">
                @csrf
              @method('DELETE')
                <button onclick="window.location.href='/delete/{{ $role->id }}'" class="btn btn-danger">Supprimer</button>
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