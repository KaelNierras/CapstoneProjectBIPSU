@extends ('layouts.app')

@section ('content')

<h1 class="text-3xl font-bold text-center py-5">Products</h1>
    <div class="container mx-auto">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="py-5">
            <x-bladewind::button><a href="{{ route('product.create') }}">Create Product</a></x-bladewind::button>
        </div>
        <x-bladewind::table
            divider="thin">
            <x-slot name="header">
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </x-slot>
            @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('product.edit', $product->id) }}">Edit</a>
                                <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            
        </x-bladewind::table>
    </div>

@endsection



