<div>
    <nav class="text-sm font-medium text-on-surface dark:text-on-surface-dark" aria-label="breadcrumb">
        <ol class="flex flex-wrap items-center gap-1">
            <li class="flex items-center gap-1">
                <a href="{{ route('dashboard') }}"
                    class="hover:text-on-surface-strong dark:hover:text-on-surface-dark-strong">Inicio</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"
                    stroke-width="2" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li class="flex items-center gap-1">
                <a href="{{ route('inquilinos') }}"
                    class="hover:text-on-surface-strong dark:hover:text-on-surface-dark-strong">Lista de Inquilinos</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"
                    stroke-width="2" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>

        </ol>
    </nav>

    <br><br>
    <hr>
    <br>

    <!-- primary Button -->
    <button wire:click="openCreateModal" type="button"
        class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Crear
        nuevo inquilino</button>
    <br><br>


    <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead
            class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong text-center">
            <tr>
                <th scope="col" class="p-4">Nro</th>
                <th scope="col" class="p-4">Nombres</th>
                <th scope="col" class="p-4">Email</th>
                <th scope="col" class="p-4">Telefono</th>
                <th scope="col" class="p-4">Fecha de nacimiento</th>
                <th scope="col" class="p-4">Documento de identidad</th>
                <th scope="col" class="p-4">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @foreach ($inquilinos as $inquilino)
                <tr>
                    <td class="py-3 px-4" style="text-align:center">{{ $inquilino->id }}</td>
                    <td class="p-4">{{ $inquilino->nombres }}</td>
                    <td class="p-4">{{ $inquilino->email }}</td>
                    <td class="p-4">{{ $inquilino->telefono }}</td>
                    <td class="p-4 text-center">{{ $inquilino->fecha_nacimiento }}</td>
                    <td class="p-4 text-center">{{ $inquilino->documento_identidad }}</td>
                    <td class="flex space-x-2">

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $inquilinos->links() }}
    </div>




    {{-- Modal para la vista create inquilinos --}}
    <flux:modal name="create-inquilinos" class="md:w-96" style="width: 600px" wire:model="createModal">
        <div class="space-y-6">
            {{-- <div>
            <flux:heading size="lg">Crear nuevo.</flux:heading>
            <flux:text class="mt-2">Llene todos los campos requeridos.</flux:text>
        </div> --}}
            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <flux:label for="nombres">Nombres <b>(*)</b></flux:label>
                    <flux:input type="text" id="nombres" wire:model="nombres" required />
                    @error('nombres')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="email">Email <b>(*)</b></flux:label>
                    <flux:input type="text" id="email" wire:model="email" required />
                    @error('email')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="telefono">Telefono <b>(*)</b></flux:label>
                    <flux:input type="text" id="telefono" wire:model="telefono" required />
                    @error('telefono')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="fecha_nacimiento">Fecha de nacimiento <b>(*)</b></flux:label>
                    <flux:input type="date" id="fecha_nacimiento" wire:model="fecha_nacimiento" required />
                    @error('fecha_nacimiento')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="documento_identidad">Documento de identidad <b>(*)</b></flux:label>
                    <flux:input type="text" id="documento_identidad" wire:model="documento_identidad" required />
                    @error('documento_identidad')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <br><br>

                <div class="flex justify-end">
                    <flux:modal.close name="crear-inquilino" class="mr-2">
                        <flux:button type="button" variant="filled">Cerrar</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">Crear Inquilino</flux:button>
                </div>

            </form>
        </div>
    </flux:modal>


    @if (session('message'))
        <div x-data x-init="Swal.fire({
            icon: 'success',
            title: '{{ session('message') }}',
            showConfirmButton: false,
            timer: 1500
        })">

        </div>
    @endif


</div>
