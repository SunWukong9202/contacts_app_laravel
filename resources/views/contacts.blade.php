@extends('layouts.app')

@section('content')

    <div class="container pt-4 p-3">
      <div class="row">
        @if (count($contacts) == 0)
          <div class="col-md-4 mx-auto">
            <div class="card card-body text-center">
              <p>No contacts saved yet</p>
              <a href="{{ route('contacts.create') }}">Add One!</a>
            </div>
          </div>
        @endif
        @foreach ($contacts as $contact)
        <div class="col-md-4 mb-3">
          <div class="card text-center">
            <div class="card-body">
              <h3 class="card-title text-capitalize">{{ $contact->name }}</h3>
              <p class="m-2">{{ $contact->email }}</p>
              <a href="edit.php?id={{ $contact->id }}" class="btn btn-secondary mb-2">Edit Contact</a>
              <a href="delete.php?id={{ $contact->id }}" class="btn btn-danger mb-2">Delete Contact</a>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
    
@endsection