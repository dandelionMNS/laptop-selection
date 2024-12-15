<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laptop Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- {{ $laptop }} --}}
            <div class="flex gap-2 py-3">
                <a href="{{ url()->previous() }}" class="font-semibold text-lg border">Go Back</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex gap-12">
                    <div class="bg-gray-100 px-3 py-5 flex items-center w-1/2">
                        <img class="prod-img" src='{{ $laptop->img_url }}' alt='{{ $laptop->model }}' />
                    </div>
                    <div class="flex flex-col">
                        <h2>
                            {{ $laptop->company->name }} {{ $laptop->model }}
                        </h2>

                        <h3>RM {{ $laptop->price }}</h3>
                        <div class="max-h-72 overflow-y-hidden bg-gray-200">
                            <p class="p-5 h-full overflow-y-scroll"> {!! nl2br(e($laptop->desc)) !!} </p>
                        </div>

                        <div class="w-full p-10">
                            <hr />
                        </div>

                        <div class="flex gap-5 px-10">
                            <a href="{{ $laptop->url }}" target="_blank">
                                <x-primary-button>
                                    Buy Now
                                </x-primary-button>
                            </a>
                            <a href="{{ $laptop->company->url }}" target="_blank">
                                <x-primary-button>
                                    Company Reference
                                </x-primary-button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .prod-img {
        width: 100%;
        max-width: 800px;
    }
</style>
