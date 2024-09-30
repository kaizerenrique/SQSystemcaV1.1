<div class="p-2 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-3">  
        <table class="table-auto w-full mt-6">
            <thead>
                <tr class="bg-indigo-500 text-white">
                    <th class="px-4 py-2">
                        <div class="flex items-center">Nombre</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Cedula</div>
                    </th>                    
                    <th class="px-4 py-2">
                        <div class="flex items-center">Código del cliente </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Código de Orden </div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Fecha y Hora</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Saldo</div>
                    </th>  
                    <th class="px-4 py-2">
                        <div class="flex items-center">Acción</div>
                    </th>                  
                </tr>
            </thead>
            <tbody>
                @foreach($actis as $acti)
                    <tr>
                        <td class="rounded border px-4 py-2">{{$acti->nombreyapellido}}</td> 
                        <td class="rounded border px-4 py-2">{{$acti->cedula}}</td>                                               
                        <td class="rounded border px-4 py-2">{{$acti->codigo}}</td>  
                        <td class="rounded border px-4 py-2">{{$acti->orden}}</td>                       
                        <td class="rounded border px-4 py-2">{{$acti->created_at}}</td>                         
                        <td class="rounded border px-4 py-2">{{$acti->costo}}</td> 
                        <td class="rounded border px-4 py-2">                            
                            <x-jet-button class="bg-red-500 hover:bg-red-700" wire:click="consulta_borrar({{$acti->id}})">
                                {{ __('Eliminar') }}
                            </x-jet-button>                           
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{$actis->links()}}
    </div>

    <!-- Inicio del Modal para Alerta Eliminar Documento -->
    <x-jet-dialog-modal wire:model="elimirModal">
        <x-slot name="title">
            {{$titulo}}
        </x-slot>

        <x-slot name="content">
            {{$resultado}}             
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('elimirModal', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="BorrarOrden({{$idorden}})" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Inicio del Modal para mostrar el codigo -->
    <x-jet-dialog-modal wire:model="eliminado">
        <x-slot name="title">
            {{ __($titulo) }}
        </x-slot>

        <x-slot name="content">
            {{$resultado}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('eliminado', false)" wire:loading.attr="disabled">
                {{ __('Aceptar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>


