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
                <a href="{{ route('propiedades') }}"
                    class="hover:text-on-surface-strong dark:hover:text-on-surface-dark-strong">Lista de Propiedades</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"
                    stroke-width="2" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>

        </ol>
    </nav>

    <br>
    <br>
    <br>

    <flux:button variant="primary" color="blue" wire:click="openCreateModal">Crear nueva propiedad</flux:button>

    <br><br>

    {{-- @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Exito!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif --}}


    <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
        <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
            <thead
                class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong text-center">
                <tr>
                    <th scope="col" class="p-4">Nro</th>
                    <th scope="col" class="p-4">Tipo</th>
                    <th scope="col" class="p-4">Dirección</th>
                    <th scope="col" class="p-4">Precio</th>
                    <th scope="col" class="p-4">Estado</th>
                    <th scope="col" class="p-4">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline dark:divide-outline-dark">
                @foreach ($propiedades as $propiedad)
                    <tr>
                        <td class="py-3 px-4" style="text-align:center">{{ $propiedad->id }}</td>
                        <td class="p-4">{{ $propiedad->tipo }}</td>
                        <td class="p-4">{{ $propiedad->direccion }}</td>
                        <td class="p-4">{{ $propiedad->precio }}</td>
                        <td class="p-4">{{ $propiedad->estado }}</td>
                        <td class="flex space-x-2">
                            <!-- primary Button Show with Icon -->
                            <button wire:click="show({{ $propiedad->id }})"
                                class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-primary border border-primary dark:border-primary-dark px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-eye-icon lucide-eye">
                                    <path
                                        d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                Ver
                            </button>

                            <!-- primary Button Edit with Icon -->
                            <button wire:click="edit({{ $propiedad->id }})"
                                class="inline-flex justify-center items-center gap-2 whitespace-nowrap rounded-radius bg-surface-alt border border-surface-alt dark:border-surface-dark-alt px-4 py-2 text-xs font-medium tracking-wide text-on-surface-strong transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-surface-alt active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-surface-dark-alt dark:text-on-surface-dark-strong dark:focus-visible:outline-surface-dark-alt">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                                Edit
                            </button>


                            {{-- <flux:button variant="primary" color="blue" wire:click="show({{ $propiedad->id }})">Ver
                            </flux:button>
                            <flux:button variant="filled" wire:click="edit({{ $propiedad->id }})">Editar</flux:button> --}}
                            <flux:button variant="primary" color="red"
                                wire:click="confirmDelete({{ $propiedad->id }})">
                                Borrar</flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $propiedades->links() }}
        </div>
    </div>



    {{-- Modal para la vista create propiedad --}}
    <flux:modal name="create-propiedad" class="md:w-96" style="width: 600px" wire:model="createModal">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Crear nuevo.</flux:heading>
                <flux:text class="mt-2">Llene todos los campos requeridos.</flux:text>
            </div>
            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <flux:label for="tipo">Tipo de propiedad <b>(*)</b></flux:label>
                    <flux:input type="text" id="tipo" wire:model="tipo" required />
                    @error('tipo')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="direccion">Dirección <b>(*)</b></flux:label>
                    <flux:input type="text" id="direccion" wire:model="direccion" required />
                    @error('direccion')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="precio">Precio <b>(*)</b></flux:label>
                    <flux:input type="number" id="precio" wire:model="precio" required />
                    @error('precio')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="descripcion">Descripcion <b>(*)</b></flux:label>
                    <flux:textarea id="descripcion" wire:model="descripcion" rows="3"></flux:textarea>
                    @error('descripcion')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="estado">Estado <b>(*)</b></flux:label>
                    <flux:select id="estado" wire:model="estado">
                        <option value="">Seleccione un estado</option>
                        <option value="disponible">Disponible</option>
                        <option value="alquilado">Alquilado</option>
                        <option value="mantenimiento">Mantenimiento</option>
                    </flux:select>
                    @error('estado')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <br>
                <br>

                <div class="flex justify-end">
                    <flux:modal.close name="crear-propiedad" class="mr-2">
                        <flux:button type="button" variant="filled">Cerrar</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">Crear Propiedad</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>



    {{-- Modal para la vista show propiedad --}}
    <flux:modal name="show-propiedad" class="md:w-96" style="width: 600px" wire:model="showModal">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Detalles de la propiedad</flux:heading>
            </div>

            @if ($propiedadSeleccionada)
                <div class="space-y-4">
                    <div>
                        <flux:label for="tipo">Tipo de propiedad</flux:label>
                        <flux:text>{{ $propiedadSeleccionada->tipo }}</flux:text>
                    </div>

                    <div>
                        <flux:label for="direccion">Dirección <b>(*)</b></flux:label>
                        <flux:text>{{ $propiedadSeleccionada->direccion }}</flux:text>
                    </div>

                    <div>
                        <flux:label for="precio">Precio</flux:label>
                        <flux:text>{{ $propiedadSeleccionada->precio }}</flux:text>
                    </div>

                    <div>
                        <flux:label for="descripcion">Descripcion</flux:label>
                        <flux:text>{{ $propiedadSeleccionada->descripcion }}</flux:text>
                    </div>


                    <div>
                        <flux:label for="estado">Estado</flux:label>
                        <flux:text>{{ $propiedadSeleccionada->estado }}</flux:text>
                    </div>

                    <br>
                    <br>

                    <div class="flex justify-end">
                        <flux:modal.close name="show-propiedad" class="mr-2">
                            <flux:button type="button" variant="filled">Cerrar</flux:button>
                        </flux:modal.close>

                    </div>
                </div>
            @endif
        </div>
    </flux:modal>


    {{-- Modal para la vista edicion propiedad --}}
    <flux:modal name="editar-propiedad" class="md:w-96" style="width: 600px" wire:model="editModal">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Editar propiedad</flux:heading>
                <flux:text class="mt-2">Llene todos los campos requeridos.</flux:text>
            </div>
            <form wire:submit.prevent="update" class="space-y-4">
                <div>
                    <flux:label for="tipo">Tipo de propiedad <b>(*)</b></flux:label>
                    <flux:input type="text" id="tipo" wire:model="editTipo" required />
                    @error('tipo')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="direccion">Dirección <b>(*)</b></flux:label>
                    <flux:input type="text" id="direccion" wire:model="editDireccion" required />
                    @error('direccion')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="precio">Precio <b>(*)</b></flux:label>
                    <flux:input type="number" id="precio" wire:model="editPrecio" required />
                    @error('precio')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="descripcion">Descripcion <b>(*)</b></flux:label>
                    <flux:textarea id="descripcion" wire:model="editDescripcion" rows="3"></flux:textarea>
                    @error('descripcion')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <flux:label for="estado">Estado <b>(*)</b></flux:label>
                    <flux:select id="estado" wire:model="editEstado">
                        <option value="">Seleccione un estado</option>
                        <option value="disponible">Disponible</option>
                        <option value="alquilado">Alquilado</option>
                        <option value="mantenimiento">Mantenimiento</option>
                    </flux:select>
                    @error('estado')
                        <span class="tex-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <br>
                <br>

                <div class="flex justify-end">
                    <flux:modal.close name="editar-propiedad" class="mr-2">
                        <flux:button type="button" variant="filled">Cerrar</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">Actualizar Propiedad</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    {{-- Modal para la confirmacion  de borrado de propiedad --}}

    <flux:modal name="delete-propiedad" class="min-w-[22rem]" wire:model="deleteModal">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">¿Eliminar registro?</flux:heading>
                <flux:text class="mt-2">
                    <p>Estas a punto de eliminar esta propiedad.</p>
                    <p>Esta accion no se puede deshacer.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button type="submit" wire:click="delete" variant="danger">Eliminar registro</flux:button>
            </div>
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
