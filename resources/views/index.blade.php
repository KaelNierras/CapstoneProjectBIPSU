@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="font-bold text-xl mb-2">Index Page</div>

                <div class="px-6 py-4">
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif

                    <p class="text-gray-700 text-base">
                        Please Log In.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
