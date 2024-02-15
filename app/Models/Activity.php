<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'form', 'specific', 'profession','responsable', 'experience',
        'antiquity', 'property',
        'evaluation_id', 'caedec_id'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function caedec()
    {
        return $this->belongsTo(Caedec::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function averageSales()
    {
        return $this->hasMany(AverageSale::class);
    }

    public function cash()
    {
        return $this->hasOne(Cash::class);
    }

    public function shoppings()
    {
        return $this->hasMany(Shopping::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function complements()
    {
        return $this->hasMany(Complement::class);
    }

    public function businessExpenses()
    {
        return $this->hasMany(BusinessExpense::class);
    }

    public function businessCurrentAssets()
    {
        return $this->hasMany(BusinessCurrentAsset::class);
    }

    public function businessFixedAssets()
    {
        return $this->hasMany(BusinessFixedAsset::class);
    }

    public function businessPassives()
    {
        return $this->hasMany(BusinessPassive::class);
    }

    public function businessAddress()
    {
        return $this->hasOne(BusinessAddress::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function debt()
    {
        return $this->hasOne(Debt::class);
    }

    public function mbTotal()
    {
        $activity = $this;
        $res = 0;

        if ($activity->inventories->sum('sale') > 0) {
            if ($activity->inventories->count() != 0) {
                $res = ($activity->inventories->sum('amount') * $activity->inventories->sum('buys')) / ($activity->inventories->sum('amount') * $activity->inventories->sum('sale'));
                return round($res, 2);
            } else {
                return round($res, 2);
            }
        }
    }

    public function mbpTotal()
    {
        $activity = $this;
        $saleDetails = $activity->saleDetails;
        $res = 0;

        if ($saleDetails) {
            foreach ($saleDetails as $saleDetail) {
                if ($activity->form == "Comercio" || $activity->form == "Servicio") {
                    $res += round($saleDetail->inventory->mb * ($saleDetail->total / $saleDetails->sum('total')), 2);
                }
                if ($activity->form == "Produccion") {
                    $res += $saleDetail->article->mb * ($saleDetail->total / $saleDetails->sum('total'));
                }
            }
            return $res;
        } else {
            return 0;
        }
    }

    public function mbTransport()
    {
        $minVentaMensual = null;

        if ($this->form == "Transporte" ) {
            foreach ($this->vehicles as $vehicle) {
                foreach ($vehicle->averageSales as $averageSale) {
                    $tipo = 'mensual';
                    $ventaMensual = $averageSale->ventaMensual($tipo);
                    if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                        $minVentaMensual = $ventaMensual;
                    }
                }
            }
            $minVentaMensual = max($minVentaMensual, 1); // minVentaMensual no sea menor que 1
            return 1 - ($this->vehicles->flatMap->maintenances->sum('month') / $minVentaMensual);
        }
    }

    public function venta()
    {
        $minVentaMensual = null;

        if ($this->form == "Comercio" || $this->form == "Servicio") {
            foreach ($this->averageSales as $averageSale){
                $tipo = 'mensual';
                $ventaMensual = $averageSale->ventaMensual($tipo);
                if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                    $minVentaMensual = $ventaMensual;
                }
            }
            return $minVentaMensual;
        }

        if ($this->form == "Produccion") {
            foreach ($this->averageSales as $averageSale){
                $tipo = 'mensual';
                $ventaMensual = $averageSale->ventaMensual($tipo);
                if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                    $minVentaMensual = $ventaMensual;
                }
            }
            return $minVentaMensual;
        }

        if ($this->form == "Transporte" ) {
            foreach ($this->vehicles as $vehicle)  {
                foreach ($vehicle->averageSales as $averageSale) {
                    $tipo = 'mensual';
                    $ventaMensual = $averageSale->ventaMensual($tipo);
                    if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                        $minVentaMensual = $ventaMensual;
                    }
                }
            }
            return $minVentaMensual;
        }
    }

    public function costoVenta()
    {
        $minVentaMensual = null;
        $mbp = 0;
        $costoVenta = 0;

        if ($this->form == "Comercio" || $this->form == "Servicio") {
            foreach ($this->averageSales as $averageSale) {
                $tipo = 'mensual';
                $ventaMensual = $averageSale->ventaMensual($tipo);

                if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                    $minVentaMensual = $ventaMensual;
                    $mbp = $this->mbpTotal() / 100;
                }
            }
            return ($minVentaMensual * (1 - ($mbp)));
        }

        if ($this->form == "Produccion") {
            foreach ($this->averageSales as $averageSale) {
                $tipo = 'mensual';
                $ventaMensual = $averageSale->ventaMensual($tipo);

                if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                    $minVentaMensual = $ventaMensual;
                    $mbp = $this->mbpTotal() / 100;
                }
            }
            return ($minVentaMensual * (1 - ($mbp * 100)));
        }

        if ($this->form == "Transporte") {
            foreach ($this->vehicles as $vehicle){
                $costoVenta = $this->vehicles->flatMap->maintenances->sum('month');
            }
            return ($costoVenta);
        }
    }

    public function utilidadBruta()
    {
        $minVentaMensual = null;
        $mbp = 0;

        if ($this->form == "Comercio" || $this->form == "Servicio" || $this->form == "Produccion") {
            foreach ($this->averageSales as $averageSale) {
                $tipo = 'mensual';
                $ventaMensual = $averageSale->ventaMensual($tipo);

                if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                    $minVentaMensual = $ventaMensual;
                    $mbp = $this->mbpTotal() / 100;
                }
            }
            return $minVentaMensual - ($minVentaMensual * (1 - ($mbp * 100)));
        }

        if ($this->form == "Transporte") {
            $minVentaMensual = null;

            foreach ($this->vehicles as $vehicle) {
                foreach ($vehicle->averageSales as $averageSale) {
                    $tipo = 'mensual';
                    $ventaMensual = $averageSale->ventaMensual($tipo);
                    if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                        $minVentaMensual = $ventaMensual;
                    }
                }
            }
            return $minVentaMensual - $this->vehicles->flatMap->maintenances->sum('month');
        }
    }

    public function utilidadOperativa()
    {
        $totalGastoOpe = $this->businessExpenses->sum('amount');
        if ($this->form == "Comercio" || $this->form == "Servicio") {
            return ($this->utilidadBruta()) - ($totalGastoOpe * 100);
        }
        if ($this->form == "Produccion" || $this->form == "Transporte") {
            return ($this->utilidadBruta()) - $totalGastoOpe;
        }
    }

    public function utilidadNeta()
    {
        $minVentaMensual = null;
        $mbp = 0;
        $otrosIngresos = $this->otrosIngresos();
        $TGOF = $this->evaluation->familyExpenses->sum('amount') + $this->evaluation->familyPassives->sum('share');
        $pagoDeudas = $this->businessPassives->sum('share');
        $TGON = $this->businessExpenses->sum('amount');
        $totalGastoOpe = $this->businessExpenses->sum('amount');

        if ($this->form == "Comercio" || $this->form == "Servicio") {
            foreach ($this->averageSales as $averageSale) {
                $tipo = 'mensual';
                $ventaMensual = $averageSale->ventaMensual($tipo);

                if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                    $minVentaMensual = $ventaMensual;
                    $mbp = $this->mbpTotal() / 100;
                }
            }
            return ($minVentaMensual - ($minVentaMensual * (1 - ($mbp)))) - $TGON - $TGOF + $otrosIngresos - $pagoDeudas;
        }
        if ($this->form == "Produccion" || $this->form == "Transporte" ) {
            return (($this->utilidadBruta()) - $totalGastoOpe) - $TGOF + $otrosIngresos - $pagoDeudas;
        }
    }

    public function otrosIngresos()
    {
        $minVentaMensual = null;

        $activity = $this;
        $evaluation = $activity->evaluation;
        $activities = $evaluation->activities->where('id', '!=', $activity->id);

        $otrosIngresos = 0;

        foreach ($activities as $activity) {
            $otrosIngresos += $activity->utilidadNeta2();
        }
        return $otrosIngresos;
    }

    public function utilidadNeta2()
    {
        $minVentaMensual = null;
        $mbp = 0;
        $TGOF = $this->evaluation->familyExpenses->sum('amount') + $this->evaluation->familyPassives->sum('share');
        $pagoDeudas = $this->businessPassives->sum('share');
        $TGON = $this->businessExpenses->sum('amount');

        foreach ($this->averageSales as $averageSale) {
            $tipo = 'mensual';
            $ventaMensual = $averageSale->ventaMensual($tipo);

            if ($minVentaMensual === null || $ventaMensual < $minVentaMensual) {
                $minVentaMensual = $ventaMensual;
                $mbp = $this->mbpTotal() / 100;
            }
        }
        return ($minVentaMensual - ($minVentaMensual * (1 - $mbp))) - $TGON - $pagoDeudas;
    }

    public function CapacidadPagoMensual()
    {
        return ($this->utilidadNeta() * 0.8 );
    }

    public function patrimonio()
    {
        return (($this->inventories->sum('vipt') + ($this->businessCurrentAssets->sum('amount'))) + ($this->businessFixedAssets->sum('amount')) + $this->evaluation->familyFixedAssets->sum('amount')) - ($this->businessPassives->sum('balace') + $this->evaluation->familyPassives->sum('balace'));
    }

    public function Solvencia()
    {
        return $this->patrimonio() / $this->evaluation->participant->application->amount;
    }

    public function CapacidadPago()
    {
        if ($this->form == "Comercio" || $this->form == "Servicio" || $this->form == "Produccion" || $this->form == "Transporte") {
            return $this->CapacidadPagoMensual() / $this->evaluation->participant->application->choose;
        }
        if ($this->form == "Dependiente") {
            return $this->companies->sum('salary') * 0.6;
        }
    }

    public function Liquidez()
    {
        if ($this->debt) {
            if ($this->debt->shortTerm > 0) {
                return (($this->inventories->sum('vipt')) + ($this->businessCurrentAssets->sum('amount'))) / $this->debt->shortTerm;
            } else {
                return 0;
            }
        }
    }

    public function pruebaAcida()
    {
        if ($this->debt) {
            if ($this->debt->shortTerm > 0) {
                return (($this->inventories->sum('vipt')) - $this->inventories->sum('vipt')) + ($this->businessCurrentAssets->sum('amount')) / $this->debt->shortTerm;
            } else {
                return 0;
            }
        }
    }

    public function eNegocio()
    {
        $totalActNegocio = (($this->inventories->sum('vipt') + ($this->businessCurrentAssets->sum('amount'))) + ($this->businessFixedAssets->sum('amount')));
        if ($totalActNegocio > 0) {
            return ($this->businessPassives->sum('balace')) / $totalActNegocio;
        } else {
            return 0;
        }
    }

    public function eCortoPlazo()
    {
        if ($this->debt) {
            return $this->debt->shortTerm / (($this->inventories->sum('vipt')) + ($this->businessCurrentAssets->sum('amount')));
        }
    }

    public function eLargoPlazo()
    {
        if ($this->debt) {
            $totalActNegocio = (($this->inventories->sum('vipt') + ($this->businessCurrentAssets->sum('amount'))) + ($this->businessFixedAssets->sum('amount')));
            if ($totalActNegocio > 0) {
                return $this->debt->longTerm / $totalActNegocio;
            } else {
                return 0;
            }
        }
    }

    public function MUO()
    {
        if ($this->Venta() > 0) {
            return (($this->Venta() - $this->costoVenta() - ($this->businessExpenses->sum('amount'))) / $this->Venta()) * 100;
        } else {
            return 0;
        }
    }

    public function MUN()
    {
        $activity = $this;
        $evaluation = $activity->evaluation;
        $activities = $evaluation->activities->where('id', '!=', $activity->id);
        $otrosIngresos = 0;

        foreach ($activities as $activity) {
            $otrosIngresos += $activity->utilidadNeta2();
        }
        if ($this->Venta() > 0) {
            return (($this->Venta() - $this->costoVenta() - ($this->businessExpenses->sum('amount')) + $otrosIngresos - ($this->evaluation->familyExpenses->sum('amount') + $this->evaluation->familyPassives->sum('share')) - ($this->businessPassives->sum('share'))) / $this->Venta()) * 100;
        } else {
            return 0;
        }
    }

    public function RelUO()
    {
        if ($this->Venta() > 0) {
            return (($this->evaluation->familyExpenses->sum('amount') + $this->evaluation->familyPassives->sum('share')) / ($this->Venta() - $this->costoVenta() - ($this->businessExpenses->sum('amount')))) * 100;
        } else {
            return 0;
        }
    }

    public function RelUN()
    {
        $activity = $this;
        $evaluation = $activity->evaluation;
        $activities = $evaluation->activities->where('id', '!=', $activity->id);
        $otrosIngresos = 0;

        foreach ($activities as $activity) {
            $otrosIngresos += $activity->utilidadNeta2();
        }

        if ($this->Venta() > 0) {
            return ($otrosIngresos / ($this->Venta() - $this->costoVenta() - ($this->businessExpenses->sum('amount')) + $otrosIngresos - ($this->evaluation->familyExpenses->sum('amount') + $this->evaluation->familyPassives->sum('share')) - ($this->businessPassives->sum('share')))) * 100;
        } else {
            return 0;
        }
    }

    public function ROA()
    {
        $totalActNegocio = (($this->inventories->sum('vipt') + ($this->businessCurrentAssets->sum('amount'))) + ($this->businessFixedAssets->sum('amount')));

        if ($totalActNegocio > 0) {
            return (($this->utilidadNeta()) / $totalActNegocio) * 100;
        } else {
            return 0;
        }
    }

    public function ROE()
    {
        if ($this->patrimonio() > 0) {
            return (($this->utilidadNeta()) / $this->patrimonio()) * 100;
        } else {
            return 0;
        }
    }

    public function RIM()
    {
        if ($this->costoVenta() > 0) {
            return ($this->inventories->sum('vipt') / $this->costoVenta()) * 30;
        } else {
            return 0;
        }
    }
}
