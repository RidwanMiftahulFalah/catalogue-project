<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('User List') }}
    </h2>
  </x-slot>

  <div class="py-5">
    <div class="mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          
          <div class="max-w-screen overflow-auto">
            <table class="w-full rounded-lg table-auto">
              <thead class="bg-sky-800 text-white">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Name</th>

                  <th class="py-2 px-2">Email</th>

                  <th class="py-2 px-2">Role</th>

                  <th class="py-2 px-2">Account Status</th>

                  <th class="py-2 px-2 rounded-tr-lg">Action</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($users->count())
                  @foreach ($users as $user)
                    <tr class="{{ $loop->iteration != $users->count() ? 'border-b border-sky-800' : '' }}">
                      <td
                        class="border-r border-r-sky-800 {{ $loop->iteration == $users->count() ? 'rounded-bl-lg' : '' }}">
                        {{ $loop->iteration }}
                      </td>

                      <td>{{ $user->name }}</td>

                      <td>{{ $user->email }}</td>

                      <td>{{ $user->role }}</td>

                      <td>
                        <span
                          class="{{ $user->is_active ? 'bg-green-300' : 'bg-red-300' }} {{ $user->is_active ? 'text-green-900' : 'text-red-900' }} text-md font-extrabold px-3 py-1 rounded">
                          {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span>
                      </td>

                      <td
                        class="py-5 border-l border-l-sky-800 {{ $loop->iteration === $users->count() ? 'rounded-br-lg' : '' }}">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                          @csrf
                          @method('PUT')

                          <button type="submit"
                            class="inline-flex items-center justify-center w-32 py-1.5 {{ $user->is_active ? 'bg-red-600' : 'bg-emerald-600' }} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:{{ $user->is_active ? 'bg-red-500' : 'bg-emerald-500' }} focus:{{ $user->is_active ? 'bg-red-500' : 'bg-emerald-500' }} active:{{ $user->is_active ? 'bg-red-700' : 'bg-emerald-700' }} focus:outline-none focus:ring-2 focus:{{ $user->is_active ? 'ring-red-500' : 'ring-emerald-500' }} focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="7">Data not found.</td>
                @endif
              </tbody>
            </table>
          </div>


          {{ $users->links() }}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
