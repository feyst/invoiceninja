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

namespace App\Listeners;

use App\Libraries\MultiDB;
use App\Mail\VerifyUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendVerificationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {//todo handle the change of DB locaiton to Company Token table
        /*send confirmation email using $event->user*/

        MultiDB::setDB($event->company->db);

        Mail::to($event->user->email)
            //->cc('')
            //->bcc('')
            ->queue(new VerifyUser($event->user));
            
    }
}
