<?php

namespace App\Observers;

use App\Models\AuditLogCar;
use App\Models\Car;
use App\Utils\ActionsUtils;
use App\Utils\UpdatedObserverUtils;
use Illuminate\Support\Facades\Auth;

class CarObserver
{

    public function __construct(
        protected AuditLogCar $auditLogCar,
        protected UpdatedObserverUtils $utils,
    )
    {}

    protected function saveAuditLogCar($action, $description): void
    {
        $this->auditLogCar
            ->query()
            ->create([
            'action' => $action,
            'user_name' => Auth::user()->name ?? 'Sistema',
            'description' => $description
        ]);
    }

    public function creating(Car $car): void
    {
        $this->saveAuditLogCar(ActionsUtils::CREATION,
            'Criação do Carrro: ' . $car->modelo);
    }

    public function created(Car $car): void
    {
        $this->saveAuditLogCar(ActionsUtils::CREATED,
            'Criado o carro: ' . $car->modelo);
    }

    public function updating(Car $car): void
    {
        $this->saveAuditLogCar(ActionsUtils::UPDATED,
            'Atualização do carro: ' . $car->modelo);
    }
    public function updated(Car $car): void
    {
        //$this->saveAuditLogCar(ActionsUtils::UPDATED,'Atualizado o carro: ' . $car->modelo);

        $changesDescription = $this->utils->getChangesDescription($car);

        (!empty($changesDescription))
            ? $this->saveAuditLogCar(ActionsUtils::UPDATE, 'Atualizando carro ID ' .
            $car->id . ': ' . implode(', ', $changesDescription))
            : $this->saveAuditLogCar(ActionsUtils::UPDATE,
            'Atualizando carro ID ' . $car->id);
    }

    public function deleted(Car $car): void
    {
        $this->saveAuditLogCar(ActionsUtils::DELETION,
            'Deletado o carro: ' . $car->modelo);
    }

    public function restored(Car $car): void
    {
        $this->saveAuditLogCar(ActionsUtils::RESTORED,
            'Restaurado o carro: ' . $car->modelo);
    }

    public function forceDeleted(Car $car): void
    {
        $this->saveAuditLogCar(ActionsUtils::FORCEDELETD,
            'Forçado a deleção do carro: ' . $car->modelo);
    }


}
