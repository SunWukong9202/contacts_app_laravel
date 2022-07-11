@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Contact Info') }}</div>

          <div class="card-body">
            <p>Name: {{ $contact->name }}</p>
            <p>Age: {{ $contact->age }}</p>
            <p>Email: <a href="mailto:{{ $contact->email }}">
                {{ $contact->email }}
              </a>
            </p>
            <p>Phone Number: <a href="tel:{{ $contact->phone_number }}">
                {{ $contact->phone_number }}
              </a>
            </p>
            <p>Create: {{ $contact->created_at }}</p>
            <p>Last Updated: {{ $contact->updated_at }}</p>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection