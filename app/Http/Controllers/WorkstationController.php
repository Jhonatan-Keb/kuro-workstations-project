<?php

namespace App\Http\Controllers;

use App\Models\Workstation;
use App\Http\Requests\StoreWorkstationRequest;
use App\Http\Requests\UpdateWorkstationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Importante para Laravel 12

class WorkstationController extends Controller
{
    use AuthorizesRequests; // Trait para usar $this->authorize()

    public function index()
    {
        $user = Auth::user();
        
        // Admin/Tech ven todo, Cliente solo lo suyo
        $query = Workstation::with('user')->latest();
        
        if ($user->role === 'customer') {
            $query->where('user_id', $user->id);
        }

        $workstations = $query->paginate(9);
        return view('workstations.index', compact('workstations'));
    }

    public function create()
    {
        $cpus = $this->getOptions('cpu', ['Intel Core i9-14900K', 'Intel Core i7-14700K', 'AMD Ryzen 9 7950X3D', 'AMD Ryzen 7 7800X3D', 'Intel Core i5-13600K', 'AMD Ryzen 5 7600X']);
        $rams = $this->getOptions('ram', [8, 16, 32, 64, 128]);
        $gpus = $this->getOptions('gpu', ['NVIDIA RTX 4090', 'NVIDIA RTX 4080 Super', 'NVIDIA RTX 4070 Ti', 'AMD Radeon RX 7900 XTX', 'AMD Radeon RX 7800 XT', 'NVIDIA RTX 3060']);
        
        return view('workstations.create', compact('cpus', 'rams', 'gpus'));
    }

    public function store(StoreWorkstationRequest $request)
    {
        // El Request ya validó los datos. Creamos la PC asignándola al usuario actual.
        $request->user()->workstations()->create($request->validated());

        return redirect()->route('workstations.index')
            ->with('swal', [
                'title' => '¡Orden Creada!',
                'text' => 'Workstation solicitada con éxito 🚀',
                'icon' => 'success'
            ]);
    }

    public function edit(Workstation $workstation)
    {
        // Verificamos si tiene permiso (Policy)
        $this->authorize('update', $workstation);

        $cpus = $this->getOptions('cpu', ['Intel Core i9-14900K', 'AMD Ryzen 9 7950X']);
        $rams = $this->getOptions('ram', [16, 32, 64]);
        $gpus = $this->getOptions('gpu', ['NVIDIA RTX 4090', 'AMD Radeon RX 7900 XTX']);

        return view('workstations.edit', compact('workstation', 'cpus', 'rams', 'gpus'));
    }

    private function getOptions($column, $defaults = [])
    {
        return Workstation::distinct()
            ->pluck($column)
            ->merge($defaults)
            ->unique()
            ->sort()
            ->values();
    }

    public function update(UpdateWorkstationRequest $request, Workstation $workstation)
    {
        $this->authorize('update', $workstation);

        // Filtramos: Si es cliente, quitamos el 'status' de los datos para que no pueda inyectarlo
        $data = $request->validated();
        if ($request->user()->role === 'customer') {
            unset($data['status']);
        }

        $workstation->update($data);

        return redirect()->route('workstations.index')
            ->with('swal', [
                'title' => '¡Actualizado!',
                'text' => 'Configuración actualizada correctamente ✨',
                'icon' => 'success'
            ]);
    }

    public function destroy(Workstation $workstation)
    {
        // $this->authorize('delete', $workstation); // Removed to allow all roles to delete
        
        $workstation->delete();

        return redirect()->route('workstations.index')
            ->with('swal', [
                'title' => '¡Eliminado!',
                'text' => 'Orden eliminada del sistema 🗑️',
                'icon' => 'success'
            ]);
    }
}
