<?php

namespace App\Http\Livewire\Registrar\Request;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\RequestApplication;
use Illuminate\Support\Facades\DB;

class View extends Component
{
    use Actions;

    public $request_application = null;

    public $request_application_id;

    public $document_amount;
    
    public $additional_charge;

    public $remarks;

    public $retrieval_date;

    public $from;

    public $queryString = ['from'];

    public $showPaymentValidationModal = false;

    public function updatedRetrievalDate()
    {
        $this->validate([
            'retrieval_date' => 'required|date|after_or_equal:today',
        ]);
    }

    public function approvePayment()
    {
        $this->validate([
            'retrieval_date' => 'required|date|after_or_equal:today',
            'remarks' => 'required',
        ]);
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'This will approve the payment of this request.',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, approve it',
                'method' => 'confirmApprovePayment',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmApprovePayment()
    {
        
        DB::beginTransaction();

        $this->request_application->update([
            'status_id' => 5, // Payment Approved | For Release
            'retrieval_date' => $this->retrieval_date,
        ]);

        $this->request_application->payment->update([
            'paid_at' => now(),
        ]);

        $this->request_application->transaction_logs()->create([
            'description' => 'Your payment has been approved. Kindly check the retrieval date.',
            'remarks' => $this->remarks,
        ]);

        $this->request_application->refresh();
        
        DB::commit();

        $this->dialog()->success(
            $title = 'Payment Approved',
            $description = 'The payment of this request has been approved.',
        );
    }
    

    public function approved()
    {
        $this->validate([
            'document_amount' => 'required|numeric',
            'additional_charge' => 'nullable|numeric',
            'remarks' => 'required|string',
        ]);
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'This will approve the request',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, approve it',
                'method' => 'confirmApproved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmApproved()
    {
        $this->request_application->update([
            'status_id' => 2,
        ]);
        DB::beginTransaction();
        $total_document = $this->request_application->request_document->with_authentication ? $this->document_amount + 15  : $this->document_amount;
        $this->request_application->request_document()->update([
            'amount' => $this->document_amount,
        ]);
        $this->request_application->payment()->create([
            'amount' => $total_document * $this->request_application->request_document->copy,
            'additional_fee' => $this->additional_charge,
            'total_amount'=> ($total_document * $this->request_application->request_document->copy) + $this->additional_charge,
        ]);
        $this->request_application->transaction_logs()->create([
            'description' => 'Your request has been approved. Please proceed to payment.',
            'remarks' => $this->remarks,
        ]);
        $this->request_application->refresh();
        DB::commit();
        $this->dialog()->success(
            $title = 'Request Approved',
            $description = 'The request has been approved.',
        );
    }

    public function markAsClaimed()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'This will mark the request as claimed',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, mark it',
                'method' => 'confirmMarkAsClaimed',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmMarkAsClaimed()
    {
        $this->request_application->update([
            'status_id' => 7,
        ]);
        $this->request_application->transaction_logs()->create([
            'description' => 'Request has been claimed.',
            'remarks' => 'N/A',
        ]);
        $this->request_application->refresh();
        $this->dialog()->success(
            $title = 'Request Claimed',
            $description = 'The request has been claimed.',
        );
    }

    public function denyRequest()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'This will deny the request',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, deny it',
                'method' => 'confirmDenyRequest',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmDenyRequest()
    {
        $this->request_application->update([
            'status_id' => 3,
        ]);
        $this->request_application->transaction_logs()->create([
            'description' => 'Request has been denied.',
            'remarks' => 'N/A',
        ]);
        $this->request_application->refresh();
        $this->dialog()->success(
            $title = 'Request Denied',
            $description = 'The request has been denied.',
        );
    }

    public function denyPayment()
    {
        $this->validate([
            'remarks' => 'required',
        ]);
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'This will deny the payment of this request',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, deny it',
                'method' => 'confirmDenyPayment',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmDenyPayment()
    {
        $this->request_application->update([
            'status_id' => 6,
        ]);
        $this->request_application->transaction_logs()->create([
            'description' => 'Payment has been denied.',
            'remarks' => $this->remarks,
        ]);
        $this->request_application->refresh();
        $this->dialog()->success(
            $title = 'Payment Denied',
            $description = 'The payment of this request has been denied.',
        );
    }

    public function markAsCleared()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'This means the students clearance is cleared',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Confirm',
                'method' => 'confirmMarkAsCleared',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function confirmMarkAsCleared()
    {
        $this->request_application->update([
            'status_id' => 1,
            'destination_campus_id' => 1, // ACCESS campus
        ]);
        $this->request_application->transaction_logs()->create([
            'description' => 'Request has been cleared.',
            'remarks' => 'N/A',
        ]);
        $this->request_application->refresh();
        $this->dialog()->success(
            $title = 'Request Cleared',
            $description = 'The request has been cleared.',
        );
    }
    public function render()
    {
        return view('livewire.registrar.request.view');
    }
    public function mount()
    {
        if ($this->from) {
            auth()->user()->unreadNotifications->where('id', $this->from)->markAsRead();
        }
        $this->request_application = RequestApplication::where('id',$this->request_application_id)
            ->with(['request_document.document','campus','program','student_status','status','purpose','transaction_logs'=>function($query){
                return  $query->orderBy('created_at','desc');
            }])->first();
       abort_if(!$this->request_application, 404);
       $this->document_amount = $this->request_application->request_document->document->amount;
      
    }

    public function contentMounted()
    {
        if ($this->from) {
           $this->emit('refreshNotification');
        }
    }

}
