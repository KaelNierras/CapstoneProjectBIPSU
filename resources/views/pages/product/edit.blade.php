@extends ('layouts.app')

@section('content')
    <div class="container max-w-md mx-auto bg-card p-6 shadow-md mt-5">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold mb-5 text-card-foreground">Edit Product</h2>
            <a href="{{ route('product.index') }}">
                <x-bladewind::icon name="arrow-uturn-left" class=" text-blue-500"></x-bladewind::icon>
            </a>
        </div>
        @if ($errors->any())
            <x-bladewind::alert type="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-bladewind::alert>
        @endif
        <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
            @csrf
            @method('put')
            <div class="mb-4">
                <label class="block text-card-foreground text-sm font-bold mb-2" for="name">Name</label>
                <input
                    class="shadow appearance-none border border-input rounded w-full py-2 px-3 text-card-foreground leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="name" placeholder="name" value="{{ $product->name }}" />
            </div>
            <div class="mb-4">
                <label class="block text-card-foreground text-sm font-bold mb-2" for="qty">Quantity</label>
                <input
                    class="shadow appearance-none border border-input rounded w-full py-2 px-3 text-card-foreground leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="qty" placeholder="qty" value="{{ $product->qty }}" />
            </div>
            <div class="mb-4">
                <label class="block text-card-foreground text-sm font-bold mb-2" for="price">Price</label>
                <input
                    class="shadow appearance-none border border-input rounded w-full py-2 px-3 text-card-foreground leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="price" placeholder="Price" value="{{ $product->price }}" />
            </div>
            <div class="mb-4">
                <label class="block text-card-foreground text-sm font-bold mb-2" for="description">Description</label>
                <x-bladewind::textarea name='description' placeholder='Description'
                    selected_value='{{ $product->description }}'></x-bladewind::textarea>
            </div>
            <x-bladewind::button can_submit="true">Update</x-bladewind::button>
        </form>
    </div>
@endsection
