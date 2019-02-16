<?php

namespace KomjIT\Szamlahegy\Enums;

class InvoiceRow {
	public $productnr;          // SZJ, vámtarifa szám vagy SKU
	public $name;               // Termék neve
	public $detail;             // Termék részletes leírása
	public $quantity;           // Mennyiség
	public $quantity_type;      // Mennyiségi egység
	public $price_slab;         // Egységár
	public $tax;                // Adókulcs, például 27
	public $brutto_priority;    // Brutto vagy netto alapján megy a kalkuláció?
	public $foreign_id;         // Szabad szöveges azonosító, a terméket azonosítja
}
