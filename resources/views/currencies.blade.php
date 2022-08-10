@extends('pages.layouts.app')
@extends('pages.layouts.navigation')

<!DOCTYPE html>
<head>

@section('content')
  <main class="container">
    @if(Session::has('success'))
      <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          {{ Session::get('success') }}
        </div>
      </div>
    @endif

    <h1>Currencies</h1>

    <table class="table table-bordered data-table">
      <thead>
        <tr>
          <th>Currency</th>
          <th>Code</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($currencies as $currency)
          <tr>
            <td>{{ $currency->currency_name }}</td>
            <td>{{ $currency->code }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('currencies.show',$currency->id) }}">View</a>
              <a class="btn btn-warning" href="{{ route('currencies.edit',$currency->id) }}">Update</a>
              <a onclick="return confirm('Are you sure want to delete <?php echo $currency->currency_name ?> from currencies?')" 
                class="btn btn-danger" href="{{ route('currencies.delete',$currency->id) }}">Delete</a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3">There are no currencies.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
    {!! $currencies->withQueryString()->links('pagination::bootstrap-5') !!}

    <a href="{{ route('add-currency')}}" class="btn btn-primary">Add Currency</a>
</main>
@endsection