@extends ('layouts.app')

@section ('content')

<h1 class="text-3xl font-bold text-center py-5">Products</h1>
    <div class="container mx-auto">
        @if (session('success'))
            <x-bladewind::alert type="success">
                {{ session('success') }}
            </x-bladewind::alert>
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
                                <div class="flex gap-5 w-auto">
                                    <a href="{{ route('product.edit', $product->id) }}">
                                        <x-bladewind::button class="mx-auto block" color="blue">Edit</x-bladewind::button>
                                    </a>
                                    <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                        @csrf
                                        @method('delete')
                                        <x-bladewind::button
                                        can_submit="true"
                                        class="mx-auto block"
                                        color="red">Delete</x-bladewind::button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            
        </x-bladewind::table>
    </div>

@endsection



