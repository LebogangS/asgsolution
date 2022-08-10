@extends('pages.layouts.app')
@extends('pages.layouts.navigation')

@section('content')
<main class="single-currency">
  <div class="cotainer">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <h3 class="card-header text-center">View Currency</h3>
          <div class="card-body">
            <form> @csrf <div class="form-group mb-3">
                <input type="text" placeholder="Currency" id="currency" class="form-control" name="currency" readonly value="{{ $currency->currency_name }}">
              </div>
              <div class="form-group mb-3">
                <input type="text" placeholder="Code" id="code" class="form-control" name="code" readonly value="{{ $currency->code }}">
              </div>
              <div class="d-grid mx-auto buttons">
                <a class="btn btn-warning" href="{{ route('currencies.edit',$currency->id) }}">Edit</a>
                <a class="btn btn-primary" href="{{ route('currencies') }}">Back</a>
                <a onclick="return confirm('Are you sure want to delete <?php echo $currency->currency_name ?> from currencies?')" 
                  class="btn btn-danger" href="{{ route('currencies.delete',$currency->id) }}">Delete</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
