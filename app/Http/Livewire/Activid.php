<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Actividad;
use Carbon\Carbon;

class Activid extends Component
{
    use WithPagination;    

    public $elimirModal = false;
    public $eliminado = false;
    public $idorden;
    public $titulo;
    public $resultado;

    public $fecha;


    public function render()
    {

        if (empty($this->fecha)) {
            $date = Carbon::now();
            $fecha = $date->format('Y-m-d');
            $this->fecha = $fecha;
        }else {
            $fecha = $this->fecha;
        }
        
        $actis = Actividad::where('user_id', auth()->user()->id)
            ->whereDate('created_at', $fecha)
            ->orderBy('id','desc')
            ->paginate(12);       

        return view('livewire.activid',[
            'actis' => $actis
        ]);
    }

    public function consulta_borrar($id)
    {
        $resul = Actividad::find($id);
        $this->titulo = 'Alerta !!';
        $this->resultado = 'Esta seguro de querer eliminar el registro '. $resul->orden . ' una vez eliminado no podrá ser recuperado';
        $this->idorden = $resul->id;
        $this->elimirModal = true;
    }

    public function BorrarOrden($idorden)
    {
        $this->elimirModal = false;

        $this->titulo = 'Borrado';
        $this->resultado = 'El documento se ha borrado exitosamente.';
        
        $resul = Actividad::find($idorden);
        $resul->delete();
        $this->eliminado = true;
    }

}
