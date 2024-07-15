<?php
namespace App\Observers;

use App\Models\Client;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class ClientObserver
{
    public function __construct(
        protected AuditLog $model
    )
    {
    }

    protected function saveAuditLog($action, $description)
    {
        $this->model->create([
            'action' => $action,
            'user_name' => Auth::user()->name ?? 'System', // Ou outro método de obter o nome do usuário
            'description' => $description
        ]);
    }

    public function creating(Client $client): void
    {
        $this->saveAuditLog('criação', 'Creating Client: ' . $client->name);
    }

    public function created(Client $client): void
    {
        $this->saveAuditLog('criado', 'Created Client: ' . $client->name);
    }

    public function updating(Client $client)
    {
        //$this->saveAuditLog('atualização', 'Updating Client: ' . $client->name);

       // $originalValues = $client->getOriginal();
        $changedFields = $client->getDirty();
        $changesDescription = [];

        foreach ($changedFields as $field => $newValue) {
            //$oldValue = $originalValues[$field];
            $changesDescription[] = "$field alterado para '$newValue'";
        }

        (!empty($changesDescription))
           ? $this->saveAuditLog('atualização', 'Atualizando cliente ID ' .
                $client->id . ': ' . implode(', ', $changesDescription))
           : $this->saveAuditLog('atualização', 'Atualizando cliente ID ' . $client->id);
    }

    public function updated(Client $client)
    {
        $this->saveAuditLog('atualizado', 'Updated Client: ' . $client->name);
    }

    public function deleting(Client $client)
    {
        $this->saveAuditLog('exclusão', 'Deleting Client: ' . $client->name);
    }

    public function deleted(Client $client)
    {
        $this->saveAuditLog('excluido', 'Deleted Client: ' . $client->name);
    }
}


