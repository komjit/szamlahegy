# Számlahegy Laravel

Számlahegy Laravel is a simple package for Laravel whics is using the Számlahegy PHP API.

## Installation

1. Install the package using composer:

```
composer require komjit/szamlahegy
```
2. Register the service provider in the ```app.php``` config file:

```
KomjIT\Szamlahegy\SzamlahegyServiceProvider::class,
```

## Usage

### Important

You have to paste this 3 rows after Controller's namespace:

```
use KomjIT\Szamlahegy\SzamlahegyApi;
use KomjIT\Szamlahegy\Enums\Invoice;
use KomjIT\Szamlahegy\Enums\InvoiceRow; 

```

In the function you have to define your API key:

```
$api_key = 'your-api-key';
```

Make an invoice:

```
$invoice = new Invoice();
$invoice->customer_name = 'XYZ Inc.';
$invoice->customer_detail = 'You can write here anything, for example: bank account number';
$invoice->customer_city = 'Budapest';
$invoice->customer_address = 'Main street 1-3.';
$invoice->customer_zip = '1115';
$invoice->customer_country = 'HU';
$invoice->customer_vatnr = '12345678-1-12';
$invoice->customer_contact_name = 'John Doe';
$invoice->customer_email = 'mailto@example.com';
$invoice->payment_method = 'B';
$invoice->payment_date = '2019.02.15';
$invoice->perform_date = '2019.03.01';
$invoice->kind = 'T'; // change this row if you want to use it in live environment (N: normal, S: storno, D: proforma invoice, T: test)
$invoice->tag = 'example';
$invoice->paid_at = '2019.01.01'; // use this row, if the invoice is paid
$invoice->foreign_id = rand(0,9999999); // it must be unique
$invoice->signed = 'Y'; // Y - yes, N - no
$invoice->currency = 'HUF';
```

Add rows to the invoice (minimum 1 row):

```
$invoice_row_1 = new InvoiceRow();
$invoice_row_1->productnr = 'SKU0001';
$invoice_row_1->name = 'Test product 1';
$invoice_row_1->detail = 'Test 1 description';
$invoice_row_1->quantity = '2';
$invoice_row_1->quantity_type = 'pcs';
$invoice_row_1->price_brutto = '1200';
$invoice_row_1->tax = '27';
$invoice_row_1->brutto_priority = 'N';
$invoice_row_1->foreign_id = '1234';
```

Send the invoice:

```
$invoice_rows = array();
$invoice_rows[] = $invoice_row_1;

$invoice->invoice_rows_attributes = $invoice_rows;

$api = new SzamlahegyApi();
$api->openHTTPConnection();
$response = $api->sendNewInvoice($invoice, $api_key);
$api->closeHTTPConnection();
```

Check the status:

```
if($response['error'] == false){
  echo "Success.";
}else{
  echo "There are some errors:";
  var_dump($response);
}
```

## License
Számlahegy Barion is open source software licensed under the MIT License.
