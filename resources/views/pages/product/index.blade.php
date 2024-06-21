@extends ('layouts.app')

@section ('content')
    <div class="container mx-auto p-4 rounded-lg shadow dark:bg-gray-200 dark:border-gray-700">
        <h1 class="text-3xl font-bold text-center py-2">Products</h1>
        <div class="absolute right-0 mr-8">
            @if (session('success'))
                @include('components.alert')
            @endif
        </div>
        <div class="py-2">
            <x-bladewind::button><a href="{{ route('product.create') }}"><i class="fas fa-plus"></i></a></x-bladewind::button>
        </div>
        <x-bladewind::table
            celled="true"
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
                                <div class="flex gap-2 max-w-10">
                                    <a href="{{ route('product.edit', $product->id) }}">
                                        <x-bladewind::button class="mx-auto block" color="blue"><i class="fas fa-edit"></i></x-bladewind::button>
                                    </a>
                                    <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                        @csrf
                                        @method('delete')
                                        <x-bladewind::button
                                        can_submit="true"
                                        class="mx-auto block"
                                        color="red"><i class="fas fa-trash"></i></x-bladewind::button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

        </x-bladewind::table>
    </div>
@endsection



