@extends('layouts/app')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success" permission="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div>
<button type="button" style="margin-top:50px;margin-left:1000px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nouvelle permission</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau permission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <d    iv class="modal-body">
        <form action="/permission-store" method="post">
        @csrf
          <div class="mb-3">
            <label for="name" class="col-form-label">Nom</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="mb-3">
            <label for="slug" class="col-form-label">Slug:</label>
            <input type="text" name="slug" class="form-control" id="slug">
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
                                            <th class="border-top-0 table-light" scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                            <tr>
                                            <td>{{ $permission -> id }}</td>
                                            <td>{{ $permission -> name}}</td>
                                            <td>{{ $permission -> slug}}</td>
 <td>  
  <a href="#" class="btn btn-success" permission="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $permission->id}}"> Editer</a>  
  
  <a href="#" class="btn btn-secondary" permission="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $permission->id}}">Supprimer </a>  
  <div class="modal fade" id="deleteModal{{ $permission->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                Voulez vous vraiment supprimer ' {{ $permission -> name}} ' ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="/delete/{{ $permission->id }}" method="post">
                @csrf
              @method('DELETE')
                <button onclick="window.location.href='/delete/{{ $permission->id }}'" class="btn btn-danger">Supprimer</button>
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