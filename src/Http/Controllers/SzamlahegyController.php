<?php 

namespace KomjIT\Szamlahegy\Http\Controllers;

use App\Http\Controllers\Controller;
use KomjIT\Szamlahegy\SzamlahegyApi;
use KomjIT\Szamlahegy\Enums\Invoice;
use KomjIT\Szamlahegy\Enums\InvoiceRow;

class SzamlahegyController extends Controller
{
	public function index(){
		$api_key = '64c359ec-de8c-11e8-b0e5-02420aff0003';
		
		$invoice = new Invoice();
		$invoice->customer_name = 'Trab Antal';
		$invoice->customer_detail = 'Ide lehet bármit írni, pl. bankszámlát';
		$invoice->customer_city = 'Budapest';
		$invoice->customer_address = 'Keveháza u. 1-3.';
		$invoice->customer_zip = '1115';
		$invoice->customer_country = 'HU';
		$invoice->customer_vatnr = '12345678-1-12';
		$invoice->customer_contact_name = 'Mici Mackó';
		$invoice->customer_email = 'mailto@example.com';
		$invoice->payment_method = 'B';
		$invoice->payment_date = '2019.02.15';
		$invoice->perform_date = '2019.03.01';
		$invoice->kind = 'T';
		$invoice->tag = 'example';
		$invoice->paid_at = '2019.01.01';
		$invoice->foreign_id = rand(0,9999999);
		$invoice->signed = 'Y';
		$invoice->currency = 'HUF';

		$invoice_row_1 = new InvoiceRow();
		$invoice_row_1->productnr = 'SKU0001';
		$invoice_row_1->name = 'Teszt termék 1';
		$invoice_row_1->detail = 'Teszt 1 leírása';
		$invoice_row_1->quantity = '2';
		$invoice_row_1->quantity_type = 'db';
		$invoice_row_1->price_brutto = '1200';
		$invoice_row_1->tax = '27';
		$invoice_row_1->brutto_priority = 'N';
		$invoice_row_1->foreign_id = '1234';

		$invoice_rows = array();
		$invoice_rows[] = $invoice_row_1;

		$invoice->invoice_rows_attributes = $invoice_rows;

		$api = new SzamlahegyApi();
		$api->openHTTPConnection();
		$response = $api->sendNewInvoice($invoice, $api_key);
		$api->closeHTTPConnection();

		if($response['error'] == false){
			echo "A számlád sikeresen elkészült.";
		}else{
			echo "A számlát sajnos nem sikerült kiállítani.";
		}
		
	}
}
