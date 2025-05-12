@extends('layout.master')
<div class="container">

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-red-100 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-center text-red-500">Payment UnSuccessful</h1>
                <p class="mt-4 text-center text-red-500">Please try again later!</p>

                {{-- <a href="{{ route('home') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Go to
                    Home</a> --}}
            </div>
        </div>

        <div>
            <div class="flex justify-center mt-4">
                <a href="/"
                    class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Go to
                    Home</a>
            </div>
        </div>

    </div>

</div>
