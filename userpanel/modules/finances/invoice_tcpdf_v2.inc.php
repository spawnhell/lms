<?php

/*
 *  iNET LMS
 *
 *  (C) Copyright 2001-2012 LMS Developers
 *
 *  Please, see the doc/AUTHORS for more information about authors!
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License Version 2 as
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307,
 *  USA.
 *
 *  $Id$
 */

function invoice_simple_form_draw_v2() {
	global $pdf;
	
	/* set line styles */
	$line_thin = array('width' => 0.15, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
	$line_dash = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '3, 3', 'phase' => 10, 'color' => array(255, 0, 0));
	$line_light = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '3, 5', 'phase' => 10, 'color' => array(245, 200, 200));
	
	$pdf->setColor('text', 255, 0, 0);
	$pdf->SetFont('arial', '', 8);
	$pdf->setFontStretching(120);
	
	$pdf->StartTransform();
	$pdf->Rotate(90, 135, 135);
	$pdf->Text(1, 1, 'Pokwitowanie dla zleceniodawcy');
	$pdf->StopTransform();
	
	$pdf->SetFont('arial', '', 6);
	$pdf->setFontStretching(100);
	
	/* draw simple form */
	$pdf->Line(0, 190, 210, 190, $line_light);
	$pdf->Line(60, 190, 60, 297, $line_light);
	$pdf->Rect(6, 192, 54, 105, 'F', '', array(245, 200, 200));
	
	/* division name */
	$pdf->Rect(7, 193, 17, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(7, 193, 'nazwa odbiorcy');
	$pdf->Rect(7, 196, 52, 5, 'F', '', array(255, 255, 255));
	$pdf->Rect(7, 202, 52, 5, 'F', '', array(255, 255, 255));
	$pdf->Rect(7, 208, 52, 5, 'F', '', array(255, 255, 255));
	
	/* account */
	$pdf->Rect(7, 215, 22, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(7, 215, 'nr rachunku odbiorcy');
	$pdf->Rect(7, 218, 52, 5, 'F', '', array(255, 255, 255));
	
	/* customer name */
	$pdf->Rect(7, 224, 22, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(7, 224, 'nazwa zleceniodawcy');
	$pdf->Rect(7, 227, 52, 5, 'F', '', array(255, 255, 255));
	$pdf->Rect(7, 233, 52, 5, 'F', '', array(255, 255, 255));
	$pdf->Rect(7, 239, 52, 5, 'F', '', array(255, 255, 255));
	
	/* title */
	$pdf->Rect(7, 245, 11, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(7, 245, 'tytułem');
	$pdf->Rect(7, 248, 52, 10, 'F', '', array(255, 255, 255));
	
	/* amount */
	$pdf->Rect(7, 259, 9, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(7, 259, 'kwota');
	$pdf->Rect(7, 262, 52, 5, 'F', '', array(255, 255, 255));
	
	/* stamp */
	$pdf->Rect(8, 269, 9, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(8, 269, 'stempel');
	$pdf->Rect(8, 272, 22, 25, 'F', '', array(255, 255, 255));
	$pdf->Line(8, 272, 8, 297, $line_thin);
	$pdf->Line(17, 272, 30, 272, $line_thin);
	$pdf->Line(30, 272, 30, 297, $line_thin);
	$pdf->SetLineStyle($line_dash);
	$pdf->Circle(19, 283, 8);
	
	/* payment */
	$pdf->Rect(34, 269, 9, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(34, 269, 'opłata');
	$pdf->Rect(34, 272, 26, 25, 'F', '', array(255, 255, 255));
	$pdf->Line(34, 272, 34, 297, $line_thin);
	$pdf->Line(43, 272, 60, 272, $line_thin);
	$pdf->Line(60, 272, 60, 297, $line_thin);
}

function invoice_main_form_draw_v2() {
	global $pdf;
	
	/* set line styles */
	$line_thin = array('width' => 0.15, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
	$line_bold = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
	$line_dash = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '3, 3', 'phase' => 10, 'color' => array(255, 0, 0));
	
	$pdf->setColor('text', 255, 0, 0);
	$pdf->SetFont('arial', '', 8);
	$pdf->setFontStretching(120);
	
	$pdf->StartTransform();
	$pdf->Rotate(90, 135, 135);
	$pdf->Text(1, 61, 'Polecenie przelewu / wpłata gotówkowa');
	$pdf->StopTransform();
	
	$pdf->StartTransform();
	$pdf->Rotate(90, 135, 135);
	$pdf->Text(10, 202, 'odcinek dla banku zleceniodawcy');
	$pdf->StopTransform();
	
	$pdf->SetFont('arial', '', 6);
	$pdf->setFontStretching(100);
	
	/* draw main form */
	$pdf->Rect(66, 192, 135, 88, 'F', '', array(245, 200, 200));
	
	/* division name */
	$pdf->Rect(68, 193, 17, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(68, 193, 'nazwa odbiorcy');
	$pdf->Rect(66.25, 196, 135, 5, 'F', '', array(255, 255, 255));
	$pdf->Rect(68, 202, 20, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(68, 202, 'nazwa odbiorcy cd.');
	$pdf->Rect(66.25, 205, 135, 5, 'F', '', array(255, 255, 255));
	
	/* account */
	$pdf->Rect(66.5, 210.5, 131, 9, 'D', array('all' => $line_bold));
	$pdf->Rect(68, 211, 22, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(68, 211, 'nr rachunku odbiorcy');
	$pdf->Rect(67, 214, 130, 5, 'F', '', array(255, 255, 255));
	
	/* payment/transfer */
	for ($i = 0; $i < 2; $i++)
		$pdf->Rect(105 + ($i * 5.5), 223, 5, 5, 'DF', array('all' => $line_thin));
	$pdf->SetFont('arial', '', 12);
	$pdf->Text(104.5, 223, 'W');
	$pdf->Text(110.5, 223, 'P');
	
	/* currency */
	$pdf->SetFont('arial', '', 6);
	$pdf->Rect(121, 220, 10, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(121, 220, 'waluta');
	for ($i = 0; $i < 3; $i++)
		$pdf->Rect(120 + ($i * 4.5), 223, 4, 5, 'F', '', array(255, 255, 255));
	
	/* amount */
	$pdf->Rect(139.5, 219.5, 61.25, 9, 'D', array('all' => $line_bold));
	$pdf->Rect(141, 220, 10, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(141, 220, 'kwota');
	$pdf->Rect(140, 223, 60.25, 5, 'F', '', array(255, 255, 255));
	
	/* account/amount */
	$pdf->Rect(68, 230, 60, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(68, 230, 'nr rachunku zleceniodawcy (przelew) / kwota słownie (wpłata)');
	for ($i = 0; $i < 26; $i++)
		$pdf->Rect(66 + ($i * 4.5), 233, 4.5, 5, 'DF', array('all' => $line_thin));
	for ($i = 0; $i < 6; $i++)
		$pdf->Line(75 + ($i * 18), 236, 75 + ($i * 18), 238, $line_bold);
	
	/* customer name */
	$pdf->Rect(68, 240, 22, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(68, 240, 'nazwa zleceniodawcy');
	$pdf->Rect(66.25, 243, 135, 5, 'F', '', array(255, 255, 255));
	$pdf->Rect(68, 249, 25, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(68, 249, 'nazwa zleceniodawcy cd.');
	$pdf->Rect(66.25, 252, 135, 5, 'F', '', array(255, 255, 255));
	
	/* title */
	$pdf->Rect(68, 258, 11, 3, 'F', '', array(255, 255, 255));
	$pdf->Text(68, 258, 'tytułem');
	$pdf->Rect(66.25, 261, 135, 10, 'F', '', array(255, 255, 255));
	
	/* stamps */
	$pdf->Rect(191, 272, 10, 6, 'F', '', array(255, 255, 255));
	$pdf->Line(201, 270, 201, 280, $line_thin);
	$pdf->Rect(66, 192, 135, 80, 'D', array('all' => $line_thin));
	$pdf->Rect(66, 273, 68, 20, 'DF', array('all' => $line_thin));
	$pdf->StartTransform();
	$pdf->Translate(0, 23);
	$pdf->Text(80, 265, 'pieczęć, data i podpis(y) zleceniodawcy');
	$pdf->StopTransform();
	$pdf->Line(134, 280, 210, 280, $line);
	$pdf->Rect(155, 273, 20, 20, 'DF', array('all' => $line_thin));
	$pdf->SetLineStyle($line_dash);
	$pdf->Circle(165, 283, 8);
	for ($i = 0; $i < 4; $i++)
		$pdf->Rect(135.5 + ($i * 4.5), 285, 4.5, 4.5, 'DF', array('all' => $line_thin));
	$pdf->Line(144.5, 285, 144.5, 289.5, $line_bold);
	$pdf->StartTransform();
	$pdf->Translate(0, 16);
	$pdf->Text(135, 265, 'opłata');
	$pdf->StopTransform();
}


function invoice_simple_form_fill_v2() {
	global $pdf, $invoice;
	
	/* set font style & color */
	//$pdf->SetFont('courier', '', 9);
	$pdf->SetFont('arial', '', 9);
	
	$pdf->setColor('text', 0, 0, 0);
	
	/* division name */
	$pdf->Text(7, 197, $invoice['division_shortnames']);
	$pdf->Text(7, 203, $invoice['division_address']);
	$pdf->Text(7, 209, $invoice['division_zip'] . ' ' . $invoice['division_city']);
	
	/* account */
//	$pdf->SetFont('courier', 'B', 9);
	$pdf->SetFont('arial', 'B', 9);
	$pdf->Text(7, 219, bankaccount($invoice['customerid'], $invoice['account']));
	
	/* customer name */
	//$pdf->SetFont('courier', '', 9);
	$pdf->SetFont('arial', '', 9);
	/* if customer name lenght > 26 chars then cut string */
	if (mb_strlen($invoice['name']) > 26)
		$pdf->Text(7, 228, mb_substr($invoice['name'], 0, 26));
	else
		$pdf->Text(7, 228, $invoice['name']);
	$pdf->Text(7, 234, $invoice['address']);
	$pdf->Text(7, 240, $invoice['zip'] . ' ' . $invoice['city']);
	
	/* title */
	$pdf->Text(7, 249, 'Zapłata za fakturę numer:');
	//$pdf->SetFont('courier', 'B', 10);
	$pdf->SetFont('arial', 'B', 10);
	if (!$invoice['fullnumber'])
	    $tmp = docnumber($invoice['number'], $invoice['template'], $invoice['cdate']);
	else
	    $tmp = $invoice['fullnumber'];
	$pdf->Text(7, 253, $tmp);
	
	/* amount */
	//$pdf->SetFont('courier', 'B', 10);
	$pdf->SetFont('arial', 'B', 10);
	$pdf->Text(7, 263, moneyf($invoice['value']));
}


function invoice_main_form_fill_v2() {
	global $pdf, $invoice;

	/* set font style & color */
	//$pdf->SetFont('courier', '', 9);
	$pdf->SetFont('arial', '', 9);
	$pdf->setColor('text', 0, 0, 0);

	/* division name */
	$pdf->Text(67, 197, $invoice['division_name']);
	$pdf->Text(67, 206, $invoice['division_address'] . ', ' . $invoice['division_zip'] . ' ' . $invoice['division_city']);

	/* account */
	//$pdf->SetFont('courier', 'B', 9);
	$pdf->SetFont('arial', 'B', 9);
	$pdf->Text(67, 215, format_bankaccount(bankaccount($invoice['customerid'], $invoice['account'])));

	/* currency */
	//$pdf->SetFont('courier', 'B', 10);
	$pdf->SetFont('arial', 'B', 10);
	$pdf->setFontSpacing(2.5);
	$pdf->Text(120, 224, 'PLN');
	$pdf->setFontSpacing(0);

	/* amount */
	$pdf->Text(142, 224, moneyf($invoice['value']));
	$pdf->Text(67, 233, trans('$a dollars $b cents', to_words(floor($invoice['value'])), to_words(round(($invoice['value'] - floor($invoice['value'])) * 100))));

	/* customer name */
	//$pdf->SetFont('courier', '', 9);
	$pdf->SetFont('arial', '', 9);
	/* if customer name lenght > 70 chars then stretch font */
	if (mb_strlen($invoice['name']) > 70)
		$pdf->setFontStretching(85);
	$pdf->Text(67, 243.5, $invoice['name']);
	$pdf->setFontStretching(100);
	$pdf->Text(67, 252.5, $invoice['address'] . ', ' . $invoice['zip'] . ' ' . $invoice['city']);

	/* barcode */
	if (!$invoice['fullnumber'])
	    $barcode = docnumber($invoice['number'], $invoice['template'], $invoice['cdate']);
	else
	    $barcode = $invoice['fullnumber'];
	
	if (!empty($barcode)) {
		$style = array(
				'position' => 'L',
				'align' => 'L',
				'stretch' => false,
				'fitwidth' => true,
				'cellfitalign' => '',
				'border' => false,
				'padding' => 0,
				'fgcolor' => array(0, 0, 0),
				'bgcolor' => false,
				'text' => false,
		);
		$pdf->StartTransform();
		$pdf->TranslateX(55);
		$pdf->write1DBarcode($barcode, 'C128', '', 263, 60, 5, 0.3, $style, '');
		$pdf->StopTransform();
	}

	/* title */
	$pdf->Text(127, 262, 'Zapłata za fakturę numer:');
	//$pdf->SetFont('courier', 'B', 10);
	$pdf->SetFont('arial', 'B', 10);
	if (!$invoice['fullnumber'])
	    $tmp = docnumber($invoice['number'], $invoice['template'], $invoice['cdate']);
	else
	    $tmp = $invoice['fullnumber'];
	$pdf->Text(127, 266, $tmp);

	/* deadline */
	$paytype = $invoice['paytype'];
	$pdf->SetFont('arial', '', 6);
	if ($paytype != 8) {
		$pdf->StartTransform();
		$pdf->Translate(0, 13);
		$pdf->Text(135, 260, trans('Deadline:'));
		$pdf->Text(135, 263, date("d.m.Y", $invoice['pdate']) . ' r.');
		$pdf->StopTransform();
	}
}

// data wystawienia, miejsce oraz data wykonania usługi
// prawy górny róg
function invoice_date_v2() {
	global $pdf, $invoice, $type;

	$pdf->SetFont('arial', '', 8);
	
	$pdf->writeHTMLCell(0, 0, '',8, 'Data Wystawienia : ' . ' <b>' . date("d.m.Y", $invoice['cdate']) . '</b>', 0, 1, 0, true, 'R');
	
	if ($invoice['division_cplace'])
	    $pdf->writeHTMLCell(0, 0, '', '', 'Miejsce wystawienia : ' . '<b>'.$invoice['division_cplace'].'</b>',0,1,0,true,'R');
	
	if ($invoice['sdateview'] == '1')
	    $pdf->writeHTMLCell(0, 0, '', '', 'Data dost./wyk.usł. : ' .' <b>' . date("d.m.Y", $invoice['sdate']) . '</b>', 0, 1, 0, true, 'R');
	
	if ($type == trans('DUPLICATE')) {
		$pdf->writeHTMLCell(0, 0, '', '', trans('Duplicate draw-up date:') .' <b>' . date('d.m.Y') . '</b>', 0, 1, 0, true, 'R');
	}
}

function invoice_logo_v2() {
	global $pdf,$invoice;
	
	if($invoice['urllogofile'])
	$pdf->Image($invoice['urllogofile'],12,8,'',10,'','','L',true,150,'',false,false,0,true,false,true);
}

function invoice_title_v2() {
	global $pdf, $invoice, $type;

	$pdf->SetY(30);
	$pdf->SetFont('arial', 'B', 16);
	if (!$invoice['fullnumber'])
	    $docnumber = docnumber($invoice['number'], $invoice['template'], $invoice['cdate']);
	else
	    $docnumber = $invoice['fullnumber'];
	
	if (isset($invoice['invoice']))
		$title = 'Faktura Korygująca nr '.$docnumber;
	else {
		if ($invoice['type'] == DOC_INVOICE_PRO)
		    $title = 'Faktura Proforma nr '.$docnumber;
		else
		    $title = 'Faktura nr '.$docnumber;
	}
	$pdf->Write(0, $title, '', 0, 'L', true, 0, false, false, 0);

	if (isset($invoice['invoice'])) {
		$pdf->SetFont('arial', 'B', 12);
		if (!$invoice['invoice']['fullnumber'])
		    $docnumber = docnumber($invoice['invoice']['number'], $invoice['invoice']['template'], $invoice['invoice']['cdate']);
		else
		    $docnumber = $invoice['invoice']['fullnumber'];
		
		if ($invoice['type'] == DOC_INVOICE_PRO)
		    
		    $title = 'do Faktury Proformy nr '.$docnumber;
		else
		    $title = 'do Faktury nr '.$docnumber;
		
		$pdf->Write(0, $title, '', 0, 'L', true, 0, false, false, 0);
	}
}


// sprzedawca 
function invoice_seller_v2() {
	global $pdf, $invoice;

	$pdf->SetFont('arial', '', 10);
	$seller = '<b>' . trans('Seller:') . '</b><br>';
	$tmp = $invoice['division_header'];

	$account = format_bankaccount(bankaccount($invoice['customerid'], $invoice['account']));
	$tmp = str_replace('%bankaccount', $account, $tmp);

	$tmp = preg_split('/\r?\n/', $tmp);
	foreach ($tmp as $line)
		$seller .= $line . '<br>';
	$pdf->Ln(0);
	$pdf->writeHTMLCell(80, '', '', 45, $seller, 0, 1, 0, true, 'L');
}

function invoice_buyer_v2() {
	global $pdf, $invoice;

	$oldy = $pdf->GetY();

	$buyer = '<b>' . trans('Purchaser:') . '</b><br>';
	
	$buyer .= $invoice['name'] . '<br>';
	$buyer .= $invoice['address'] . '<br>';
	$buyer .= $invoice['zip'] . ' ' . $invoice['city'] . '<br>';
	if ($invoice['ten']) $buyer .= trans('TEN') . ': ' . $invoice['ten'] . '<br>';
	else $buyer .= trans('SSN') . ': ' . $invoice['ssn'] . '<br>';

	$pdf->SetFont('arial', '', 10);
	$pdf->writeHTMLCell(80, '', '', '', $buyer, 0, 1, 0, true, 'L');

	$y = $pdf->GetY();

	$postbox = '';
	if ($invoice['post_name'] || $invoice['post_address']) {
		if ($invoice['post_name'])
			$postbox .= $invoice['post_name'] . '<br>';
		else
			$postbox .= $invoice['name'] . '<br>';
		$postbox .= $invoice['post_address'] . '<br>';
		$postbox .= $invoice['post_zip'] . ' ' . $invoice['post_city'] . '<br>';
	} else {
		$postbox .= $invoice['name'] . '<br>';
		$postbox .= $invoice['address'] . '<br>';
		$postbox .= $invoice['zip'] . ' ' . $invoice['city'] . '<br>';
	}

	if ($invoice['division_countryid'] && $invoice['countryid'] && $invoice['division_countryid'] != $invoice['countryid'])
		$postbox .= trans($invoice['country']) . '<br>';

	$pdf->SetFont('arial', 'B', 10);
	$pdf->writeHTMLCell(80, '', 125, 50, $postbox, 0, 1, 0, true, 'L');

	$pin = '<b>' . trans('Customer ID: $a', sprintf('%04d', $invoice['customerid'])) . '</b><br>';
//	$pin .= '<b>PIN: ' . sprintf('%04d', $invoice['customerpin']) . '</b><br>';

	$pdf->SetFont('arial', 'B', 8);
	$pdf->writeHTMLCell('', '', 125, $oldy + round(($y - $oldy) / 2), $pin, 0, 1, 0, true, 'L');

	$pdf->SetY($y);
}

function invoice_data_v2() {
	global $pdf, $invoice;

	/* print table */
	$pdf->writeHTMLCell('', '', '', '', '', 0, 1, 0, true, 'L');
	$pdf->Table2($header, $invoice);
}

function invoice_to_pay_v2() {
	global $pdf, $invoice;

	$pdf->Ln(-9);
	$pdf->SetFont('arial', 'B', 14);
	if (isset($invoice['rebate']))
		$pdf->writeHTMLCell(0, 0, '', '', trans('To repay:') . ' ' . moneyf($invoice['value']), 0, 1, 0, true, 'L');
	else
		$pdf->writeHTMLCell(0, 0, '', '', trans('To pay:') . ' ' . moneyf($invoice['value']), 0, 1, 0, true, 'L');

	$pdf->SetFont('arial', '', 10);
	$pdf->writeHTMLCell(0, 6, '', '', trans('In words:') . ' ' . trans('$a dollars $b cents', to_words(floor($invoice['value'])), to_words(round(($invoice['value'] - floor($invoice['value'])) * 100))), 0, 1, 0, true, 'L');
}

function invoice_balance_v2() {
	global $pdf, $invoice, $LMS;

	$pdf->SetFont('arial', '', 7);
	$kasa = $LMS->GetCustomerBalance($invoice['customerid'], $invoice['cdate']);
	$tekst = '';
	$pdf->writeHTMLCell(0, 0, '', '', 'Saldo przed wystawieniem dokumentu:' . ' ' . moneyf($kasa), 0, 1, 0, true, 'L');
	$pdf->setFont('arial','',6);
	$tekst = 'Informujemy, że saldo zostało wyliczone przed wystawieniem bieżącego dokumentu i może nie uwzględniać ostatnich wpłat ze względu na możliwe opóźnienia w realizacji przelewów bankowych. Dodatni stan salda oznacza nadpłatę. Jeżeli w wyniku wnoszenia opłat za pobrane towary lub wykonane usługi powstała nadpłata, podlega ona zaliczeniu na poczet płatności ustalonych na najbliższy okres rozliczenowy, o ile Odbiorca nie zarząda jej zwrotu. Dyspozycję zwrotu nadpłaty należy złożyć w Biurze Obsługi Klienta';
	$pdf->writeHTMLCell(0, 0, '', '', $tekst, 0, 1, 0, true, 'J');
}

function invoice_dates_v2() {
	global $pdf, $invoice;

	$paytype = $invoice['paytype'];
	$pdf->SetFont('arial', '', 8);
	$pdf->Ln();
	if ($paytype != 8) {
		$deadline = trans('Deadline:') . ' <b>' . date("d.m.Y", $invoice['pdate']) . '</b>';
		$pdf->writeHTMLCell(0, 0, '', '', $deadline, 0, 1, 0, true, 'L');
	}
	$payment = trans('Payment type:') . ' <b>' . $invoice['paytypename'] . '</b>';
	$pdf->writeHTMLCell(0, 0, '', '', $payment, 0, 1, 0, true, 'L');
}


function invoice_expositor_v2() {
	global $pdf, $invoice;
	
	$expositor = isset($invoice['division_author']) ? $invoice['division_author'] : $invoice['user'];
	$pdf->SetFont('arial', '', 8);
	$pdf->writeHTMLCell(0, 0, '', '', trans('Expositor:') . ' <b>' . $expositor . '</b>', 0, 1, 0, true, 'R');
}

function invoice_footnote_v2() {
	global $pdf, $invoice;
	
	if (!empty($invoice['division_footer'])) {
		$pdf->Ln(5);
		$tmp = $invoice['division_footer'];
		
		$account = format_bankaccount(bankaccount($invoice['customerid'], $invoice['account']));
		$tmp = str_replace('%bankaccount', $account, $tmp);

		$pdf->SetFont('arial', '', 7);
		$h = $pdf->getStringHeight(0, $tmp);
		$tmp = mb_ereg_replace('\r?\n', '<br>', $tmp);
		$pdf->writeHTMLCell(0, 0, '', 188 - $h, $tmp, 0, 1, 0, true, 'C');
	}
}

function invoice_body_standard_v2() {
	global $pdf, $invoice;
	
	invoice_logo_v2();
	invoice_date_v2();
	invoice_title_v2();
	invoice_seller_v2();
	invoice_buyer_v2();
	invoice_data_v2();
	invoice_to_pay_v2();
	invoice_balance_v2();
	invoice_dates_v2();
	invoice_expositor_v2();
	invoice_footnote_v2();
	
	
	if (!$invoice['fullnumber']) {
		
		$docnumber = docnumber($invoice['number'], $invoice['template'], $invoice['cdate']);
		
	} else {
		
		$docnumber = $invoice['fullnumber'];
		
	}
	
	
	if ($invoice['type'] == DOC_CNOTE) {
		
		$pdf->SetTitle('Faktura Korygująca nr '.$docnumber);
		
	} elseif ($invoice['type'] == DOC_INVOICE_PRO) {
		
		$pdf->SetTitle('Faktura Proforma nr '.$docnumber);
		
	} else {
		
		$pdf->SetTitle('Faktura nr '.$docnumber);
		
	}
	
	
	$pdf->SetAuthor($invoice['division_name']);
	$pdf->setBarcode($docnumber);
	
	
	/* setup signature additional information */
	$info = array(
		'Name' => $invoice['division_name'],
		'ContactInfo' => $invoice['division_author']
	);
	
	if ($invoice['type'] == DOC_CNOTE) {
		
		$info['Location']	= 'Faktura Korygująca';
		$info['Reason'] 	= 'Faktura Korygująca nr '.$docnumber;
		
	} elseif ($invoice['type'] == DOC_INVOICE_PRO) {
		
		$info['Location'] 	= 'Faktura Proforma';
		$info['Reason'] 	= 'Faktura Proforma nr '.$docnumber;
		
	} else {
		
		$info['Location'] 	= 'Faktura';
		$info['Reason'] 	= 'Faktura nr '. $docnumber;
		
	}

	if (get_conf('invoices.set_protection','1')) {
		
		/* setup your cert & key file */
		$cert = 'file://' . LIB_DIR . '/tcpdf/config/lms.cert';
		$key = 'file://' . LIB_DIR . '/tcpdf/config/lms.key';
		
		/* set document digital signature & protection */
		if (file_exists($cert) && file_exists($key)) {
			$pdf->setSignature($cert, $key, 'inetlms-invoices', '', 1, $info);
			$pdf->setSignatureAppearance(13, 10, 50, 20);
		}
		
		$pdf->SetProtection(array('modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble'), '', 'PASSWORD_CHANGEME', '1');
		
	}
}

function invoice_body_ft0100_v2() {
	global $pdf, $invoice;
	
	invoice_logo_v2();
	invoice_date_v2();
	invoice_title_v2();
	invoice_seller_v2();
	invoice_buyer_v2();
	invoice_data_v2();
	invoice_to_pay_v2();
	invoice_balance_v2();
	invoice_dates_v2();
	invoice_expositor_v2();
	invoice_footnote_v2();
	/* draw FT-0100 form */
	invoice_simple_form_draw_v2();
	invoice_main_form_draw_v2();
	/* fill FT-0100 form */
	invoice_simple_form_fill_v2();
	invoice_main_form_fill_v2();
	
	
	if (!$invoice['fullnumber']) {
		
		$docnumber = docnumber($invoice['number'], $invoice['template'], $invoice['cdate']);
		
	} else {
		
		$docnumber = $invoice['fullnumber'];
		
	}
	
	
	if ($invoice['type'] == DOC_CNOTE) {
		
		$pdf->SetTitle('Faktura Korygująca nr '.$docnumber);
		
	} elseif ($invoice['type'] == DOC_INVOICE_PRO) {
		
		$pdf->SetTitle('Faktura Proforma nr '.$docnumber);
		
	} else {
		
		$pdf->SetTitle('Faktura nr '.$docnumber);
		
	}
	
	
	$pdf->SetAuthor($invoice['division_name']);
	
	
	$info = array(
		'Name' => $invoice['division_name'],
		'ContactInfo' => $invoice['division_author']
	);
	
	/* setup signature additional information */
	if ($invoice['type'] == DOC_CNOTE) {
		
		$info['Location'] 	= 'Faktura Korygująca';
		$info['Reason'] 	= 'Faktura Korygująca nr '.$docnumber;
		
	} elseif ($invoice['type'] == DOC_INVOICE_PRO) {
		
		$info['Location'] 	= 'Faktura Proforma';
		$info['Reason'] 	= 'Faktura Proforma nr '.$docnumber;
		
	} else {
		
		$info['Location'] 	= 'Faktura';
		$info['Reason'] 	= 'Faktura nr '.$docnumber;
	}
	
	if (get_conf('invoices.set_protection','1')) {
		
		/* setup your cert & key file */
		$cert = 'file://' . LIB_DIR . '/tcpdf/config/lms.cert';
		$key = 'file://' . LIB_DIR . '/tcpdf/config/lms.key';
		
		/* set document digital signature & protection */
		if (file_exists($cert) && file_exists($key)) {
			$pdf->setSignature($cert, $key, 'inetlms-invoices', '', 1, $info);
			$pdf->setSignatureAppearance(13, 10, 50, 20);
		}
		
		$pdf->SetProtection(array('modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble'), '', 'PASSWORD_CHANGEME', '1');
	}
}

?>
