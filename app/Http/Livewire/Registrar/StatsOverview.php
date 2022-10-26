<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class StatsOverview extends Component
{
    public function loadData()
    {
        $pending_request =  DB::table('request_applications')
            ->where('status_id', 1)
            ->select([
            DB::raw('"pending_request" as label'),
            DB::raw('count(*) as value'),
        ]);

        $to_claim_today = DB::table('request_applications')
            ->where('retrieval_date', date('Y-m-d'))
            ->select([
            DB::raw('"to_claim_today" as label'),
            DB::raw('count(*) as value'),
        ]);

        $total_claim = DB::table('request_applications')
            ->where('status_id', 5)
            ->select([
            DB::raw('"total_claim" as label'),
            DB::raw('count(*) as value'),
        ]);

        $waiting_for_payment = DB::table('request_applications')
            ->where('status_id', 2)
            ->select([
            DB::raw('"waiting_for_payment" as label'),
            DB::raw('count(*) as value'),
        ]);


        return  $pending_request
            ->union($to_claim_today)
            ->union($total_claim)
            ->union($waiting_for_payment)
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->label => $item->value];
            })->toArray();
    }
    
    public function render()
    {
        return view('livewire.registrar.stats-overview',[
            'stats' => $this->loadData(),
        ]);
    }
}
