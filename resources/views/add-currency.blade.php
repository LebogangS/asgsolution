@extends('pages.layouts.app')
@extends('pages.layouts.navigation')

@section('content')
<main class="add-currency">
  <div class="cotainer">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <h3 class="card-header text-center">Add Currency</h3>
          <div class="card-body">
            <form action="{{ route('adding-currency') }}" method="POST"> @csrf <div class="form-group mb-3">
                <input type="text" placeholder="Currency" id="currency" class="form-control" name="currency" required autofocus> @if ($errors->has('currency')) <span class="text-danger">{{ $errors->first('currency') }}</span> @endif
              </div>
              <div class="form-group mb-3">
                <input type="text" placeholder="Code" id="code" class="form-control" name="code" required autofocus> @if ($errors->has('code')) <span class="text-danger">{{ $errors->first('code') }}</span> @endif
              </div>
              <div class="d-grid mx-auto buttons">
                <button type="submit" class="btn btn-success">Add Currency</button>
                <a class="btn btn-primary" href="{{ route('currencies') }}">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection