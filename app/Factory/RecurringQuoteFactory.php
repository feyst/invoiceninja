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

namespace App\Factory;

use App\DataMapper\ClientSettings;
use App\DataMapper\CompanySettings;
use App\Models\RecurringQuote;

class RecurringQuoteFactory
{
	public static function create(int $company_id, int $user_id) :RecurringQuote
	{
		$quote = new RecurringQuote();
		$quote->status_id = RecurringQuote::STATUS_DRAFT;
		$quote->discount = 0;
		$quote->is_amount_discount = true;
		$quote->po_number = '';
		$quote->footer = '';
		$quote->terms = '';
		$quote->public_notes = '';
		$quote->private_notes = '';
		$quote->quote_date = null;
		$quote->valid_until = null;
		$quote->partial_due_date = null;
		$quote->is_deleted = false;
		$quote->line_items = json_encode([]);
		$quote->settings = ClientSettings::buildClientSettings(new CompanySettings(CompanySettings::defaults()), new ClientSettings(ClientSettings::defaults())); //todo need to embed the settings here
		$quote->backup = json_encode([]);
		$quote->tax_name1 = '';
		$quote->tax_rate1 = 0;
		$quote->tax_name2 = '';
		$quote->tax_rate2 = 0;
		$quote->custom_value1 = 0;
		$quote->custom_value2 = 0;
		$quote->custom_value3 = 0;
		$quote->custom_value4 = 0;
		$quote->amount = 0;
		$quote->balance = 0;
		$quote->partial = 0;
		$quote->user_id = $user_id;
		$quote->company_id = $company_id;
		$quote->frequency_id = RecurringQuote::FREQUENCY_MONTHLY;
		$quote->start_date = null;
		$quote->last_sent_date = null;
		$quote->next_send_date = null;
		$quote->remaining_cycles = 0;

		return $quote;
	}

}
