<?php

namespace App\Mail;

use App\User;
use App\Service;
use App\Lead;
use Illuminate\Support\Facades\Hash;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendDocumentList extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$customerEmailId)
    {
        $this->id = $id;
		$this->customerEmailId = $customerEmailId;

		
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data= Lead::select('*')->where('id',$this->id)->first();		
		$serviceData= Service::select('id','name')->get();
		return $this->view('admin.lead.documentlist',compact('data','serviceData','invoiceNo'))
			->to($this->customerEmailId)->subject('Document List')
			->from('manvendra@ssak.co.in','R.k Associate');			
		    
    }
}
