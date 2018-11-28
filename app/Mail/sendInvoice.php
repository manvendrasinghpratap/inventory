<?php

namespace App\Mail;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerEmailId,$userInvoiceId,$pdfName)
    {
        $this->mail_id = $customerEmailId;
		$this->userInvoiceId = $userInvoiceId;
		$this->pdfName = $pdfName.'.pdf';
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$invoicePath = base_path() . '/public/invoice';
		$companyBioDataPath = base_path() . '/public/bouchers/CompanyBioData.pdf';
		$companybrochurePath = base_path() . '/public/bouchers/CompanyBrochure.pdf';
		$companyProfilePath = base_path() . '/public/bouchers/CompanyProfile.pdf';
		$brochureZipPath = base_path() . '/public/bouchers/CompanyBioData.zip';

		$attachedFileName = $invoicePath.'/'.$this->pdfName;
		return $this->view('mail.sendinvoice')
			->attach($attachedFileName)
			->attach($companyBioDataPath)
			->attach($companyProfilePath)
			->to($this->mail_id)->subject('Quotation')
			->from('manvendra@ssak.co.in','R.k Associate');			
		exit();
    
    }
}
