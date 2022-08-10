@extends('pages.layouts.app')
@extends('pages.layouts.navigation')

@section('content')
<main class="single-currency">
  <div class="cotainer">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <h3 class="card-header text-center">Update Currency</h3>
          <div class="card-body">
            <form action="{{ route('currencies.update', $currency->id) }} method="POST"> @csrf <div class="form-group mb-3">
                <input type="text" placeholder="Currency" id="currency" class="form-control" name="currency" value="{{ $currency->currency_name }}">
              </div>
              <div class="form-group mb-3">
                <input type="text" placeholder="Code" id="code" class="form-control" name="code" value="{{ $currency->code }}">
              </div>
              <div class="d-grid mx-auto buttons">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn btn-primary" href="{{ route('currencies') }}">Back</a>
                <a class="btn btn-danger" href="{{ route('currencies.delete',$currency->id) }}">Delete</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
