<?php
/**
 * Invoice Ninja (https://invoiceninja.com)
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2019. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/AAL
 */

namespace App\Jobs\Payment;

use App\Models\Payment;
use App\Repositories\InvoiceRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PaymentNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $payment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {

        $this->payment = $payment;

    }

    /**
     * Execute the job.
     *
     * 
     * @return void
     */
    public function handle()
    {

        //notification for the payment.
        //
        //could mean a email, sms, slack, push

    }
}
