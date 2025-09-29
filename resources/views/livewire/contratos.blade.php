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
                <a href="{{ route('contratos') }}"
                    class="hover:text-on-surface-strong dark:hover:text-on-surface-dark-strong">Lista de Contratos</a>
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
    <button wire:click="createModal" type="button"
        class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Crear
        nuevo contrato</button>
    <br><br>


    <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead
            class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong text-center">
            <tr>
                <th scope="col" class="p-4">Nro</th>
                <th scope="col" class="p-4">Propiedad_id</th>
                <th scope="col" class="p-4">Inquilino_id</th>
                <th scope="col" class="p-4">Fecha_inicio</th>
                <th scope="col" class="p-4">Fecha_fin</th>
                <th scope="col" class="p-4">Monto_renta</th>
                <th scope="col" class="p-4">Estado</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @foreach ($contratos as $contrato)
                <tr>
                    <td class="py-3 px-4" style="text-align:center">{{ $contrato->id }}</td>
                    <td class="p-4">{{ $contrato->propiedad_id }}</td>
                    <td class="p-4">{{ $contrato->inquilino_id }}</td>
                    <td class="p-4">{{ $contrato->fecha_inicio }}</td>
                    <td class="p-4 text-center">{{ $contrato->fecha_fin }}</td>
                    <td class="p-4 text-center">{{ $contrato->monto_renta }}</td>
                    <td class="p-4 text-center">{{ $contrato->estado }}</td>
                    <td class="flex space-x-2">
                        <!-- primary Button Show with Icon -->
                        <button wire:click="show({{ $contrato->id }})"
                            class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                <path
                                    d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            Ver
                        </button>

                        <!-- primary Button Edit with Icon -->
                        <button wire:click="edit({{ $contrato->id }})"
                            class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-surface-alt border border-surface-alt dark:border-surface-dark-alt px-4 py-2 text-xs font-medium tracking-wide text-on-surface-strong transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-surface-alt active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-surface-dark-alt dark:text-on-surface-dark-strong dark:focus-visible:outline-surface-dark-alt">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                            Editar
                        </button>

                        <flux:button variant="primary" color="red" wire:click="confirmDelete({{ $contrato->id }})">
                            Borrar</flux:button>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $contratos->links() }}
    </div>




</div>
