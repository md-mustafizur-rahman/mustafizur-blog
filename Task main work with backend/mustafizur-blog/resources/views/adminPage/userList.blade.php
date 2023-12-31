<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{route('page.userList')}}" class="mb-4 flex justify-end items-center">
                <label for="search" class="sr-only">Search</label>
                <input type="text" id="search" name="search" class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:focus:border-gray-400" placeholder="Search..." />
                <button type="submit" class="ml-2 px-6 py-2 font-medium text-white bg-indigo-500 dark:bg-indigo-700 rounded-md hover:bg-indigo-600 dark:hover:bg-indigo-800 focus:outline-none focus:bg-indigo-600 dark:focus:bg-indigo-800">
                    Search
                </button>
            </form>



            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    AuthorID
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                            <!-- Example row -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">1</td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    @if($user->image==null)
                                    <div class="flex-shrink-0">
                                        <img src="https://cdn.vectorstock.com/i/1000x1000/43/95/default-avatar-photo-placeholder-icon-grey-vector-38594395.webp" alt="Image Alt Text" class="h-12 w-12 rounded-full">
                                    </div>
                                    @else
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('storage/profile_images/' . $user->image) }}" alt="Image Alt Text" class="h-12 w-12 rounded-full">
                                        @endif

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$user->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$user->email}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">


                                    @if($user->roles==0)
                                    User
                                    @else
                                    Admin
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$user->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if(auth()->user()->id !== $user->id)
                                    <a href="{{ route('page.userRoleController', ['id' => $user->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    @else
                                    <strong style="color: red;">Own</strong>
                                    @endif

                                    <!-- <a href="#" class="text-red-600 hover:text-red-900 ml-2">Delete</a> -->
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                            <!-- Another example row with a line -->
                            <tr>
                                <td class="border-t border-gray-200" colspan="8"></td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>
                    <div style="margin-top: 30px;"> {{ $users->links() }}</div>
                </div>

            </div>
        </div>
    </div>




</x-app-layout>