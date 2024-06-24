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
            searchable="true"
            has_border="true"
            search_placeholder="Find products by name..."
            >
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
                                <div class="flex gap-5 max-w-10">
                                    <a href="{{ route('product.edit', $product->id) }}">
                                        <x-bladewind::button class="mx-auto block" color="blue">Edit</x-bladewind::button>
                                    </a>
                                    <x-bladewind::button onclick="showModal('small-modal')">
                                        Small Modal
                                    </x-bladewind::button>
                                    <x-bladewind::modal
                                        size="small"
                                        title="Small Modal"
                                        name="small-modal">
                                        I am the smallest in the modal family. Don't hate.
                                    </x-bladewind::modal>
                                    {{-- <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                        @csrf
                                        @method('delete')
                                        <x-bladewind::button
                                        can_submit="true"
                                        class="mx-auto block"
                                        color="red">Delete</x-bladewind::button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
            
        </x-bladewind::table>
    </div>

@endsection



