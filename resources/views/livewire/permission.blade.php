<div x-data="{ table: 'close', dropdown: 'close' }">
    <div class="w-full max-w-screen-xl mx-auto p-2">
        <div class="relative rounded overflow-hidden mb-8">
            <div class="p-4 py-8">
                <div class="bg-white mx-auto max-w-sm shadow-lg rounded-lg overflow-hidden">
                    <div class="sm:flex sm:items-center px-2 py-4">
                        <div class="flex-grow">
                            <h3 class="font-bold px-2 py-3 leading-tight">Roles</h3>
                            <input type="text" x-on:input="dropdown = 'open'" wire:model.debounce.500ms="role" placeholder="Search roles" class="my-2 w-full text-sm bg-gray-light text-gray-darkest rounded h-10 p-3 focus:outline-none" />
                            <div x-show="dropdown == 'open'" class="w-full divide-y-2 divide-gray-400 divide-double ">
                                @if(isset($roles))
                                @foreach($roles as $role)
                                <div class="flex cursor-pointer my-1 hover:bg-blue-100 rounded" @click="table = 'open'" wire:click="role({{$role->id}},'{{$role->name}}')">
                                    <div class="w-8 h-10 text-center py-1">
                                        <p class="text-3xl p-0 text-green-600">&bull;</p>
                                    </div>
                                    <div class="w-4/5 h-10 py-3 px-1">
                                        <p class="hover:text-blue-dark capitalize">{{ $role->name }}</p>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-2/4 mx-auto" x-show="table == 'open'">
        <div class="flex items-center bg-blue-400 text-white text-sm font-bold px-4 py-3 mb-1 rounded-md" role="alert">
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" /></svg>
            <p class="capitalize">Role : {{ $role_name }}</p>
        </div>
        <div class="bg-white shadow-md rounded">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-500 border-b border-t border-gray-300">Module</th>
                        <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-500 border-b border-t border-gray-300">Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($permissions))
                    @foreach($modules as $module)
                    <tr class="hover:bg-gray-300">
                        <td class="py-4 px-6 border-b border-gray-300">{{ $module->name }}</td>
                        <td class="py-4 px-6 border-b border-gray-300">
                            @foreach($permissions as $permission)
                            @if($permission->module_id == $module->id)
                            <div class="inline-flex">
                                <label class="inline-flex items-center mx-1">
                                    <input type="checkbox" wire:click="permission('{{$permission->role_id == null ? 'not-checked' : 'checked'}}', '{{$permission->permission_name}}')" value="{{ $permission->permission_name }}" class="form-checkbox h-5 w-5 text-green-600" {{ $permission->role_id != null ? 'checked' : '' }}>
                                    <span class="ml-1 text-gray-700">{{ $permission->permission_name }}</span>
                                </label>
                            </div>
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>