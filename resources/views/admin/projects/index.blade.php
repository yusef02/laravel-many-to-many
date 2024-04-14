@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="container py-5">

  <a class=" d-inline-block mb-3" href="{{route('admin.projects.create')}}">Add new project</a>

  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Repository</th>
        <th>Type</th>
        <th>Technology</th>
        <th>Create date</th>
        <th>Last update</th>
        <th>Author</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse($projects as $project)
      <tr>
        <td>{{$project['title']}}</td>
        <td>{{$project['repository']}}</td>
        <td>{{$project->type?->type}}</td>
        <td>
          {{$project->getTechText()}}
        </td>
        <td>{{$project['date_create']}}</td>
        <td>{{$project['last_update']}}</td>
        <td>{{$project['author']}}</td>
        <td>
          <a href="{{route('admin.projects.show', $project)}}">show</a> |
          <a href="{{route('admin.projects.edit', $project)}}">edit</a> |
          <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-link p-0">dump</button>
          </form>

        </td>
      </tr>
      @empty
      <tr>
        <td colspan="100">
          Not any project found
        </td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection