@extends('layouts.app')

@section('title', 'New project')

@section('content')
<div class="container py-5">
  <form action="{{ route('admin.projects.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">

    @csrf


    <div class="col-3">
      <label for="title" class="form-label">Title*</label>
      <input type="text" class="form-control " id="title" name="title" required>
    </div>

    <div class="col-3">
      <label for="repository" class="form-label">Repository*</label>
      <input type="text" class="form-control " id="repository" name="repository" required>
    </div>

    <div class="col-3">
      <label for="type_id" class="form-label">Type*</label>
      <select type="text" class="form-select " id="type_id" name="type_id" required>
        @foreach($types as $type)
        <option value="{{$type->id}}">{{$type->type}}</option>
        @endforeach
      </select>
    </div>

    <div class="col-3">
      <label for="author" class="form-label">Author*</label>
      <input type="text" class="form-control " id="author" name="author" required>
    </div>


    <div class="col-4">
      <label for="date_create" class="form-label">Created at*</label>
      <input type="date" class="form-control " id="date_create" name="date_create" required>
    </div>


    <div class="col-4">
      <label for="last_update" class="form-label">Last update*</label>
      <input type="date" class="form-control " id="last_update" name="last_update" required>
    </div>

    <div class="col-4">
      <label for="image" class="form-label">Cover</label>
      <input type="file" name="image" id="image" class="form-control">
    </div>



    <div class="col-12">
      @foreach($techs as $tech)
      <div>
        <input type="checkbox" name="techs[]" id="tech_{{$tech['technology']}}" value="{{$tech['id']}}">
        <label for="tech_{{$tech['technology']}}">{{$tech['technology']}}</label>
      </div>
      @endforeach
    </div>

    <div class="col-12">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" rows="6" id="description" name="description"></textarea>
    </div>

    <div class="col-3 mt-3 mb-5">
      <button class=" btn btn-success">Add project</button>
    </div>
    <a href="{{ route('admin.projects.index') }}">back to index projects</a>

  </form>

</div>


@endsection