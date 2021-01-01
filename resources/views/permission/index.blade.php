<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>
    <div x-data="{ table: 'close' }">
    <div class="w-full max-w-screen-xl mx-auto p-2">
        <div class="relative rounded overflow-hidden mb-8">
            <div class="p-4 py-8">
                <div class="bg-white mx-auto max-w-sm shadow-lg rounded-lg overflow-hidden">
                    <div class="sm:flex sm:items-center px-2 py-4">
                        <div class="flex-grow">
                            <h3 class="font-bold px-2 py-3 leading-tight">Roles</h3>
                            <input type="text" placeholder="Search roles" class="my-2 w-full text-sm bg-grey-light text-grey-darkest rounded h-10 p-3 focus:outline-none" />
                            <div class="w-full divide-y-2 divide-grey-600 divide-double ">
                                <div class="flex cursor-pointer my-1 hover:bg-blue-100 rounded" @click="table = 'open'">
                                    <div class="w-8 h-10 text-center py-1">
                                        <p class="text-3xl p-0 text-green-600">&bull;</p>
                                    </div>
                                    <div class="w-4/5 h-10 py-3 px-1">
                                        <p class="hover:text-blue-dark">Kevin Durant</p>
                                    </div>
                                </div>
                                <div class="flex cursor-pointer my-1 hover:bg-blue-100 rounded">
                                    <div class="w-8 h-10 text-center py-1">
                                        <p class="text-3xl p-0 text-green-600">&bull;</p>
                                    </div>
                                    <div class="w-4/5 h-10 py-3 px-1">
                                        <p class="hover:text-blue-dark">Kevin Durant</p>
                                    </div>
                                </div>
                                <div class="flex cursor-pointer my-1 hover:bg-blue-100 rounded">
                                    <div class="w-8 h-10 text-center py-1">
                                        <p class="text-3xl p-0 text-green-600">&bull;</p>
                                    </div>
                                    <div class="w-4/5 h-10 py-3 px-1">
                                        <p class="hover:text-blue-dark">Kevin Durant</p>
                                    </div>
                                </div>
                                <div class="flex cursor-pointer my-1 hover:bg-blue-100 rounded">
                                    <div class="w-8 h-10 text-center py-1">
                                        <p class="text-3xl p-0 text-green-600">&bull;</p>
                                    </div>
                                    <div class="w-4/5 h-10 py-3 px-1">
                                        <p class="hover:text-blue-dark">Kevin Durant</p>
                                    </div>
                                </div>
                                <div class="flex cursor-pointer my-1 hover:bg-blue-100 rounded">
                                    <div class="w-8 h-10 text-center py-1">
                                        <p class="text-3xl p-0 text-green-600">&bull;</p>
                                    </div>
                                    <div class="w-4/5 h-10 py-3 px-1">
                                        <p class="hover:text-blue-dark">Kevin Durant</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-2/4 mx-auto" x-show="table == 'open'">
        <div class="bg-white shadow-md rounded">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">City</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">New York</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Edit</a>
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">View</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Paris</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Edit</a>
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">View</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">London</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Edit</a>
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">View</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Oslo</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Edit</a>
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">View</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Mexico City</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Edit</a>
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</x-app-layout>