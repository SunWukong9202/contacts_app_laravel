@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Create New Contact') }}</div>
          <div class="card-body">
            <form method="POST" action="/change-password">
            @csrf
              <div class="row mb-3">
                <label for="name"
                  class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" name="password"
                    class="form-control" required autocomplete="password" autofocus>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Create') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
