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
</div>

</div>
