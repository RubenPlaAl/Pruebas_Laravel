<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Delete Users') }}
            </h2>
        </div>
    </x-slot>

    <section style="background-image: url('../storage/Fondo-dashboard.jpg'); background-size: cover; background-position: center; min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            @include('includes.mensaje')
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Name")}}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Button Delete")}}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Button Admin")}}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if($user->role !== 'admin')
                                <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button type="submit" class="deletebtn">
                                        <i class="bi bi-trash">{{__("Delete")}} </i>
                                    </x-primary-button>
                                </form>
                                @else
                                <x-primary-button disabled>
                                    <i class="bi bi-person-badge pr-1">{{__("Admin")}}</i>
                                </x-primary-button>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if($user->id == 1 && $user->role == 'admin')
                                <x-primary-button disabled>{{__("You are super admin")}}</x-primary-button>
                                @else
                                <form action="{{ route('admin.toggle-admin', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <x-primary-button type="submit">
                                        @if($user->role === 'admin')
                                        {{ __("Remove Admin") }}
                                        @else
                                        {{ __("Make Admin") }}
                                        @endif
                                    </x-primary-button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('admin.report') }}" class="mt-5 mb-5 translate-middle">
                    <x-primary-button class="mt-5 mb-5">
                        <i class="bi bi-file-earmark ">{{__("Create Report")}} </i>
                    </x-primary-button>
                </a>
            </div>
        </div>
        @include('includes.volver')
    </section>
</x-app-layout>