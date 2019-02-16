<?php

namespace KomjIT\Szamlahegy\Enums;

class Product
{
	public $productnr;          // SZJ, vámtarifa szám vagy SKU
	public $product_number;          // WTF?
	public $name;               // Termék neve
	public $detail;             // Termék részletes leírása
	public $stock_management;   // Raktározzuk-e. True esetén quantity-t meg kell adni, false esetén végtelen eladható
	public $totalquantity;      // Mennyiség raktáron
	public $quantity_type;      // Mennyiségi egység
	public $currency;           // Pénznem
	public $price_slab;         // Egységár
	public $tax;                // Adókulcs, például 27
	public $foreign_id;         // Szabad szöveges azonosító, a terméket azonosítja
	public $link;               // A termég url-je
	public $visible;            // Publikusan látható termék?
	public $on_sale;            // Akciós a termék?
	public $price_sale;         // Akciós ár
	public $has_dimensions;     // Méreteit nyilvántartjuk?
	public $dimension_unit;     // Méret mértékegysége (m, cm, mm stb.)
	public $length;
	public $width;
	public $height;
	public $has_weight;         // Súlyát nyilvántartjuk?
	public $weight_unit;        // Súly mértékegység (g, kg stb.)
	public $weight;
}
