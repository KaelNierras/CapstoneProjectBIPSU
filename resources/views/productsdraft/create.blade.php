<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite('resources/css/app.css')
    <title>Create Product</title>
</head>
<body class="bg-background">
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
                <input class="shadow appearance-none border border-input rounded w-full py-2 px-3 text-card-foreground leading-tight focus:outline-none focus:shadow-outline" type="text" name="description" placeholder="Description">
            </div>
            <x-bladewind::button can_submit="true">Create</x-bladewind::button>
        </form>
    </div>
</body>
</html>
