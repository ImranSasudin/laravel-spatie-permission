<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as {{ Auth::user()->roles()->first()->name }}!
                </div>
            </div>
        </div>
    </div>
    <div class="font-sans flex items-center justify-center bg-blue-darker w-full py-8">
        <div class="overflow-hidden bg-white rounded max-w-xl w-full shadow-lg  leading-normal">
        @foreach($modules as $module)
            <div href="#" class="block group p-4 border-b">
                <p class="font-bold text-lg mb-1 text-black">{{ $module->name }}</p>
                @foreach($permissions as $permission)
                    @if($permission->module_id == $module->id)
                    <p class="bg-purple-500 inline-block px-2 rounded-lg cursor-default text-white mb-2 ml-2 transform hover:-translate-y-1 hover:scale-110 hover:bg-blue-500 transition duration-500 ease-in-out">{{ $permission->name }}</p>
                    @endif
                @endforeach
            </div>
        @endforeach
        </div>
    </div>
</x-app-layout>