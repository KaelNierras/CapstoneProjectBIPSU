@extends ('layouts.app')

@section ('content')

<div class="container max-w-md mx-auto bg-card p-6 shadow-md mt-5">
    <h2 class="text-2xl font-bold mb-5 text-card-foreground">Create Product</h2>
    @if ($errors->any())
        <div class="bg-destructive text-destructive-foreground border border-destructive-foreground px-4 py-3 rounded relative mb-6" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>  
    @endif
    <form method="post" action="{{ route('product.store') }}">
        @csrf
        @method('post')
        <div class="mb-4">  
            <label class="block text-card-foreground text-sm font-bold mb-2" for="name">Name</label>
            <input class="shadow appearance-none border border-input rounded w-full py-2 px-3 text-card-foreground leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" placeholder="Name">
        </div>
        <div class="mb-4">
            <label class="block text-card-foreground text-sm font-bold mb-2" for="qty">Quantity</label>
            <input class="shadow appearance-none border border-input rounded w-full py-2 px-3 text-card-foreground leading-tight focus:outline-none focus:shadow-outline" type="text" name="qty" placeholder="qty">
        </div>
        <div class="mb-4">
            <label class="block text-card-foreground text-sm font-bold mb-2" for="price">Price</label>
            <input class="shadow appearance-none border border-input rounded w-full py-2 px-3 text-card-foreground leading-tight focus:outline-none focus:shadow-outline" type="text" name="price" placeholder="Price">
        </div>
        <div class="mb-4">
            <label class="block text-card-foreground text-sm font-bold mb-2" for="description">Description</label>
            <textarea class="shadow appearance-none border border-input rounded w-full py-2 px-3 text-card-foreground leading-tight focus:outline-none focus:shadow-outline" type="text" name="description" placeholder="Description"></textarea>
        </div>
        <x-bladewind::button can_submit="true">Create</x-bladewind::button>
    </form>
</div>
@endsection