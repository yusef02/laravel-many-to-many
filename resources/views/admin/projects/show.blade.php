@extends('layouts.app')

@section('title', 'Project Detail')

@section('content')
<div class="container py-5">
  <h2 class="mb-5">{{ $project->title }}</h2>
  <div class="row mb-5">
    <div class="col-12">
      <span><strong>Title: </strong>{{ $project->title }}</span><br>
      <span><strong>Repository: </strong>{{ $project->repository }}</span><br>
      <span><strong>Type: </strong>{{ $project->type?->type }}</span><br>
      <span><strong>Technology: </strong>
        {{$project->getTechText()}}
      </span><br>
      <span><strong>Author: </strong>{{ $project->author }}</span><br>
      <span><strong>Description: </strong></span><br>
      <p>{{ $project->description }}</p><br>
      <span><strong>Created ad: </strong>{{ $project->date_create }}</span><br>
      <span><strong>Last update: </strong>{{ $project->last_update }}</span><br>
      @if(!empty($project->image_path))
      <img src="{{ asset('storage/' . $project->image_path) }}" class="img-fluid my-3">
      @endif
    </div>
  </div>
  <a href="{{ route('admin.projects.index') }}">back to index projects</a> |
  <a href="{{route('admin.projects.edit', $project)}}">edit</a> |
  <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
    @csrf
    @method('delete')
    <button class="btn btn-link p-0">dump</button>
  </form>
</div>
@endsection