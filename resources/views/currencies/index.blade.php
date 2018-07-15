@extends('layout')

@section('title', 'Currency market')

@section('content')
    @empty($currencies)
        <p class="text-center">No currencies</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Short name</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($currencies as $currency)
                <tr>
                    <td><img src="{{ $currency['logo_url'] }}" height="24" width="24" alt=""> <a
                                href="{{ route('currencies.show', $currency['id']) }}">{{ $currency['title'] }}</a></td>
                    <td>{{ $currency['short_name'] }}</td>
                    <td>{{ $currency['price'] }}</td>
                    <td>
                        <a href="{{ route('currencies.show', $currency['id']) }}" class="btn btn-link py-0" title="View"><i class="fas fa-eye"></i> View</a>
                        <a href="{{ route('currencies.edit', $currency['id']) }}" class="btn btn-link py-0" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <button title="Delete" class="btn btn-link py-0" onclick="event.preventDefault();
                                document.getElementById('delete-form').action = '{{ route('currencies.destroy', $currency['id']) }}';
                                document.getElementById('delete-form').submit();">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form id="delete-form" method="post" style="display: none">
            @csrf
            {{ method_field('DELETE') }}
        </form>
    @endisset
@endsection