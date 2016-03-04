<?php

/*
 * LMS version 1.11-git
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

function chkconfig($value, $default = false)
{
    if (is_bool($value)) {
        return $value;
    }

    if ($value == '') {
        return $default;
    }

    if (preg_match('/^(1|y|on|yes|true|tak|t|enabled)$/i', $value)) {
        return true;
    }

    if (preg_match('/^(0|n|no|off|false|nie|disabled)$/i', $value)) {
        return false;
    }

    trigger_error('Incorrect option value: '.$value);
}

function check_conf($name)
{
    global $CONFIG;

    list($section, $name) = explode('.', $name, 2);
    $section = strtolower($section);
    $name = strtolower($name);

    if (empty($name)) {
        return false;
    }

    if ($section == 'privileges' && !empty($CONFIG['privileges']['superuser'])) {
        return preg_match('/^hide/', $name) ? false : true;
    }

    if (!array_key_exists($section, $CONFIG)) {
        return false;
    }

    if (!array_key_exists($name, $CONFIG[$section])) {
        return false;
    }

    return chkconfig($CONFIG[$section][$name]);
}

function get_conf($name, $default = null)
{
    global $CONFIG;

    list($section, $name) = explode('.', $name, 2);
    $section = strtolower($section);
    $name = strtolower($name);

    if (empty($name)) {
        return $default;
    }

    if (!array_key_exists($section, $CONFIG)) {
        return $default;
    }

    if (!array_key_exists($name, $CONFIG[$section])) {
        return $default;
    }

    $value = $CONFIG[$section][$name];

    return $value == '' ? $default : $value;
}

/*
  Default values of some configuration options.

  Warning! Do not change nothing here or LMS will stop working properly!
*/

$DEFAULTS = array(
	'jambox' => array(
	    'cache'				=> '1',
	    'cache_lifetime' 			=> '472000',
	    'enabled'				=> '0',
	    'haslo'				=> 'haslodosms',
	    'login'				=> 'Imie i nazwisko',
	    'serwer'				=> 'https://sms.sgtsa.pl/test/xmlrpc',
	    'numberplanid' 			=> '1',
	),
	'radius' => array(
		'coa_port'			=> '3799',
		'auth_login'			=> 'id',
		'page_view'			=> '50',
	),
	'homepage' => array(
		'box_lms'			=> '1',
		'box_system'			=> '1',
		'box_customer'			=> '1',
		'box_nodes'			=> '1',
		'box_helpdesk'			=> '1',
		'box_links'			=> '1',
		'box_totd'			=> '0',
		'box_board'			=> '1',
		'box_callcenter'		=> '1',
	),
	'netdevices'	=> array(
//		'shift_port'			=> '0',
//		'def_nameport'			=> 'eth',
//		'def_pnameport'			=> 'port',
//		'link_networknode' 		=> '1',
//		'link_tosame' 			=> '1',
//		'link_tosame_active' 		=> '0',
//		'delinfoservice' 		=> '0',
		'force_connection' 		=> '1',
		'force_network_to_host' 	=> '0',
		'force_network_gateway' 	=> '1',
		'force_network_dns'		=> '1',
	),
	'database' => array(
		'type' 				=> 'mysql',
		'host' 				=> 'localhost',
		'user' 				=> 'mysql',
		'database' 			=> 'lms'
	),
	'autobackup' => array(
		'ftphost'			=> '',
		'ftpuser'			=> '',
		'ftppass'			=> '',
		'ftpssl'			=> '0',
		'db_backup'			=> '1',
		'db_gz'				=> '1',
		'db_stats'			=> '0',
		'db_ftpsend'			=> '0',
		'db_ftppath'			=> '/iNET_LMS_DB_DUMP',
		'dir_ftpsend'			=> '0',
		'dir_ftpaction'			=> 'update',
		'dir_local'			=> '',
		'dir_ftp'			=> '',
	),
	'registryequipment' => array(
		'enabled' 			=> '1', // włączenie modułu
		'car_eventdic' 			=> '1',// zdarzenia tylko ze słownika dla pojazdów
	),
	'phpui' => array(
		'viewtip'			=> '1',
		'viewtiptime'			=> '5',
		'networknode_pagelimit'		=> '50',
		'gethostbyaddr'			=> '1',
		'default_division' 		=> '0',
		'lang' 				=> '',
		'iphistory' 			=> '1',
		'iphistory_pagelimit' 		=> '50',
		'allow_from' 			=> '',
		'default_module' 		=> 'welcome',
		'timeout' 			=> '1800',
		'customerlist_pagelimit' 	=> '100',
		'nodelist_pagelimit' 		=> '100',
		'balancelist_pagelimit' 	=> '100',
		'invoicelist_pagelimit' 	=> '100',
		'debitnotelist_pagelimit' 	=> '100',
		'ticketlist_pagelimit' 		=> '100',
		'accountlist_pagelimit' 	=> '100',
		'domainlist_pagelimit' 		=> '100',
		'aliaslist_pagelimit' 		=> '100',
		'configlist_pagelimit' 		=> '100',
		'receiptlist_pagelimit' 	=> '100',
		'taxratelist_pagelimit' 	=> '100',
		'numberplanlist_pagelimit' 	=> '100',
		'divisionlist_pagelimit' 	=> '100',
		'documentlist_pagelimit' 	=> '100',
		'voipaccountlist_pagelimit' 	=> '100',
		'networkhosts_pagelimit' 	=> '256',
		'messagelist_pagelimit' 	=> '100',
		'recordlist_pagelimit' 		=> '100',
		'cashreglog_pagelimit' 		=> '100',
		'reload_type' 			=> 'sql',
		'reload_execcmd' 		=> '/bin/true',
		'reload_sqlquery' 		=> '',
		'lastonline_limit' 		=> '600',
		'timetable_days_forward' 	=> '7',
		'installation_name' 		=> '',
		'gd_translate_to' 		=> 'ISO-8859-2',
		'check_for_updates_period' 	=> '86400',
		'homedir_prefix' 		=> '/home/',
		'default_taxrate' 		=> '23.00',
		'default_zip' 			=> '',
		'default_city' 			=> '',
		'default_address' 		=> '',
		'smarty_debug' 			=> false,
		'force_ssl' 			=> false,
		'allow_mac_sharing' 		=> false,
		'big_networks' 			=> false,
		'helpdesk_stats' 		=> true,
		'helpdesk_customerinfo' 	=> true,
		'helpdesk_backend_mode' 	=> false,
		'helpdesk_sender_name' 		=> '',
		'helpdesk_reply_body' 		=> false,
		'use_invoices' 			=> false,
		'ticket_template_file' 		=> 'rtticketprint.html',
		'use_current_payday' 		=> false,
		'default_monthly_payday' 	=> '',
		'newticket_notify' 		=> false,
		'to_words_short_version' 	=> false,
		'ticketlist_status' 		=> '',
		'ewx_support' 			=> false,
		'invoice_check_payment' 	=> false,
		'note_check_payment' 		=> false,
		'radius' 			=> '1',
		'default_assignment_period' 	=> '3',
		'default_assignment_invoice' 	=> '0',
		'syslog_level' 			=> '1',
		'syslog_pagelimit' 		=> '50',
		'syslog_maxrecord'		=> '150000',
		'callcenter_pagelimit' 		=> '50',
		'netlist_pagelimit'		=> '50',
	),
	
	'invoices' => array(
		'template_file' 		=> 'FT-0100',
		'content_type' 			=> 'text/html',
		'cnote_template_file' 		=> 'standard',
		'print_balance_info'		=> '1',
		'print_balance_history' 	=> false,
		'print_balance_history_limit' 	=> '10',
		'default_printpage' 		=> 'original,copy',
		'type' 				=> 'pdf',
		'attachment_name' 		=> '',
		'paytime' 			=> '14',
		'paytype' 			=> '1', // cash
		'default_type_of_documents' 	=> 'invoice',
		'template_version'		=> '1',
		'sdateview'			=> '1',
		'urllogofile'			=> '',
		'set_protection'		=> '1',
		'template_file_proforma'	=> 'FT-0100',
		'create_pdf_file'		=> '0',
		'create_pdf_file_proforma'	=> '0',
		'edit_closed'			=> '0',
		'deleted_closed'		=> '0',
	),
	
	'finances' => array(
		'suspension_percentage' 	=> '0',
	),
	
	'receipts' => array(
		'template_file' 		=> 'receipt.html',
		'content_type' 			=> 'text/html',
		'type' 				=> 'html',
		'attachment_name' 		=> '',
	),
	'notes' => array(
		'template_file' 		=> 'note.html',
		'content_type' 			=> 'text/html',
		'type' 				=> 'html',
		'attachment_name' 		=> '',
		'paytime' 			=> '14',
	),
	'mail' => array(
		'debug_email' 			=> '',
		'smtp_host' 			=> '127.0.0.1',
		'smtp_port' 			=> '25',
		'smtp_auth_type' 		=> 'LOGIN',
		'smtp_username' 		=> '',
		'smtp_password' 		=> '',
	),
	'zones' => array(
		'hostmaster_mail' 		=> 'hostmaster.localhost',
		'master_dns' 			=> 'localhost',
		'slave_dns' 			=> 'localhost',
		'default_ttl' 			=> '3600',
		'ttl_refresh' 			=> '28800',
		'ttl_retry' 			=> '7200',
		'ttl_expire' 			=> '604800',
		'ttl_minimum' 			=> '86400',
		'default_webserver_ip' 		=> '127.0.0.1',
		'default_mailserver_ip' 	=> '127.0.0.1',
		'default_mx' 			=> 'localhost'
	),
	'gadugadu' => array(
		'gg_number' 			=> '',
		'gg_passwd' 			=> '',
		'gg_signature_statuson' 	=> '',
		'gg_signature_statusoff' 	=> '',
		'gg_header' 			=> '',
		'gg_footer' 			=> '',
	),
	'sms'	=> array(
		'from'				=> '',
		'password'			=> '',
		'prefix'			=> '48',
		'service'			=> 'smscenter',
		'smscenter_type' 		=> 'static',
		'username'			=> '',
		'smsapi_eco'			=> '1',
		'smsapi_fast'			=> '0',
		'smsapi_nounicode'		=> '1',
		'smsapi_normalize'		=> '1',
		'smsapi_max_parts'		=> '3',
		'smsapi_skip_foreign'		=> '1',
		'mt_debug'			=> '0',
		'mt_host'			=> '',
		'mt_partreverse'		=> '0',
		'mt_password'			=> '',
		'mt_port'			=> '8728',
		'mt_usb'			=> 'usb1',
		'mt_username'			=> '',
		'encoding'			=> '',
	),
	'hiperus_c5' => array(
		'numberplanid'			=> '',		// numer planu numeracyjnego
		'taxrate'			=> '',		// wartość stawki VAT , wartość liczbowa bez znaku %
		'prodid'			=> '',		// pkwiu
		'content'			=> 'szt', 	// jednostka miary
		'leftmonth'			=> '1',
		'wlr'				=> '0',		// usługa hurtowego dostępu do sieci telekomunikacyjnej - WLR SERVICES
		'accountlist_pagelimit'		=> '50',		// ilość pozycji w liście kont VoIP
		'terminallist_pagelimit'	=> '50',		// ilość wyświetlanych terminali
		'force_relationship'		=> '1',		// wymuś powiązanie konta VoIP z klientem z LMS przy dodawaniu/edycji konta VoIP
		'number_manually'		=> '0',		// pozwól na ręczne wprowadzanie numerów
		'lms_login'			=> '',
		'lms_pass'			=> '',
		'lms_url'			=> 'http://localhost/lms',
	),

	'monit' => array(
		'active_monitoring'		=> '1',
		'autocreate_chart'		=> '0',
//		'lms_password'			=> '',				// hasło dla użytkownika,
//		'lms_url'			=> 'http://localhost/lms',		// domyślny adres URL LMS'a
//		'lms_user'			=> '',				// nazwa użytkownika LMS,
//		'netdev_clear'			=> '90',
		'netdev_test'			=> '1',
//		'netdev_test_port'		=> '80',
		'netdev_test_type'		=> 'icmp',
		'netdev_time_max'		=> '100',
//		'netdev_time_send'		=> '1',
//		'netdev_timeout_level'		=> 'low',
//		'netdev_timeout_send'		=> '1',
//		'nodes_clear'			=> '90',
		'nodes_test'			=> '1',
//		'nodes_test_port'		=> '80',
		'nodes_test_type'		=> 'icmp',
//		'nodes_time_max'		=> '100',
//		'nodes_time_send'		=> '1',
//		'nodesv_timeout_level'		=> 'low',
//		'nodes_timeout_send'		=> '1',
//		'owner_clear'			=> '90',
		'owner_test'			=> '1',
//		'owner_test_port'		=> '80',
		'owner_test_type'		=> 'icmp',
//		'owner_time_max'		=> '100',
//		'owner_time_send'		=> '1',
//		'owner_timeout_level'		=> 'low',
//		'owner_timeout_send'		=> '1',
		'packetsize'			=> '32',				// waga pakietu przy pingu
//		'send_to_email'			=> '1',
//		'send_to_gg'			=> '1',
//		'send_to_sms'			=> '1',
//		'smtp_auth'			=> 'LOGIN',			// sposób autoryzacji: LOGIN, PLAIN, CRAM_MD5, NTLM
//		'smtp_host'			=> 'localhost',			// alternatywny konfig skrzynki pocztowej
//		'smtp_pass'			=> '',				// hasło do skrzynki
//		'smtp_port'			=> '25',				// port serwera smtp
//		'smtp_user'			=> 'root',				// login do skrzynki, najlepiej podać cały adres
		'step_test_netdev'		=> '5',				// czas w minutach, co ile jest robiony test
		'step_test_nodes'		=> '10',				// czas w minutach, co ile jest robiony test
		'step_test_own'			=> '10',				// czas w minutach, co ile jest robiony test
		'test_script_dir'		=>'/usr/local/sbin/lms-monitoring.pl', //scieżka do skryptu perl
		'live_ping'			=> '1',
		'step_test_signal'		=> '15',
		'signal_test'			=> '1',
		'rrdtool_dir'			=> '/usr/bin/rrdtool', 		//scieżka do skryptu rrdtool
		'display_chart_in_node_box' 	=> '1',
//		'tmp_dir'			=> '/tmp',
//		'rrd_dir'			=> '/var/www/lms/rrd',		// ścieżka bazy dla rrdttool
//		'img_gen'			=> '0',				// automatyczne generowanie wykresów
//		'img_dir'			=> '/var/www/lms/img/monit',	// ścieżka gdzie mają być generowane "automatyczne" wykresy
//		'img_time'			=> '1d',				// przedział czasowy dla wykresu
//		'image_width'			=> '530',				// szerokosc w px obrazka
//		'image_height'			=> '320',				// wysokosc 
//		'grep_dir'			=> '/bin/grep',			// scieżka do binarki grepa
//		'awk_dir'			=> '/usr/bin/awk',			// ścieżka do binarki awk
	),
	
	'voip' => array(
		'enabled' 			=> '0',
		'taxid' 			=> '1',
		'pg_pass' 			=> '',
		'pg_host' 			=> '',
		'voip_as_host' 			=> '127.0.0.1',
		'voip_as_login' 		=> 'asterisk',
		'voip_as_pass' 			=> '',
		'voip_timeswitch' 		=> '1',
		'voip_set_remb' 		=> '1',
		'jpgraph' 			=> '/usr/share/jpgraph',
		'mondir' 			=> '/var/spool/asterisk/monitor/',
		'fax_outgoingdir' 		=> '/var/spool/asterisk/fax/outgoing/',
		'fax_incomingdir' 		=> '/var/spool/asterisk/fax/incoming/',
		'fax_statusdir' 		=> '/var/spool/asterisk/outgoing_done/',
		'mailboxdir' 			=> '/var/spool/asterisk/voicemail/default/',
		'dialplan_file' 		=> '/var/spool/asterisk/virtualpbx/dialplan.conf',
		'incvoipdir' 			=> '/var/spool/asterisk/incvoip/',
		'ivrdir' 			=> '/var/spool/asterisk/ivr/',
		'wsdlurl' 			=> 'https://soap.nettelekom.pl/voip.wsdl',
		'wsdllogin' 			=> '',
		'wsdlpassword' 			=> '',
		'cdrperpage' 			=> '20'
	),
);


foreach ($DEFAULTS as $section => $values)
    foreach ($values as $key => $val)
        if (!isset($CONFIG[$section][$key]))
            $CONFIG[$section][$key] = $val;
unset($DEFAULTS);

/*
0 - nie wyświetlaj pola i nie wymagaj
1 - wyświetlaj pole w formularzu
2 - wyświetlaj i wymagaj
*/
$DEFAULTFORM = array(

    'nodes'	=> array(
		'node_autoname' => array(0,'tworzenie automatycznej nazwy komputera jeżeli nie wpiszemy jej sami, TYKO PRZY NOWYM KOMPUTERZE, format: C_{idklienta}_N_{idkompa}'),
		'public_ip'	=> array(0,'publiczny adres IP'),
		'macaddress'	=> array(1,'adres MAC'),
		'automac'	=> array(0,'automatyczne wstawienie adresu MAC 00:00:00:00:00:00 jeżeli włączone mamy pole Adres MAC a nie uzupełnimy danych'),
		'pppoe_login'	=> array(0,'dodatkowe pole login dla pppoe'),
		'password'	=> array(1,'hasło'),
		'location'	=> array(1,'lokalizacja'),
		'group'		=> array(1,'grupa komputera'),
		'netlinks'	=> array(1,'połączenie sieciowe'),
		'project'	=> array(1,'informacja o projekcie'),
		'checkmac'	=> array(1,'sprawdzanie adresu MAC'),
		'halfduplex'	=> array(1,'half Duplex'),
		'monitoring'	=> array(1,'monitoring'),
		'devicestype'	=> array(1,'rodzaj urządzenia'),
		'producer'	=> array(1,'producent i model'), // dla producenta i modelu
		'sn'		=> array(1,'numer seryjny'), // numer seryjny
		'gps'		=> array(1,'współrzędne GPS'),
		'auth'		=> array(1,'autoryzacja czasowa komputera'),
		'info'		=> array(1,'okno na dodatkową informację'),
		'info_visual'	=> array(0,'edytor wizualny dla okna z dodatkową informacją'),
		'pppoe'		=> array(1,'klient PPPoE'),
		'dhcp'		=> array(1,'klient DHCP'),
		'eap'		=> array(1,'klient EAP'),
		'nas'		=> array(1,'informacja do którego NAS jest przypisany komputer'),
    ),
    'customers'	=> array(
		'origin'	=> array(1,'źródło pochodzenia klienta'),
		'inv_address'	=> array(1,'box z odbiorcą faktury'),
		'post_address'	=> array(1,'box z adresem do wysyłki'),
		'state'		=> array(1,'województwo'),
		'country'	=> array(1,'kraj'),
		'contacts'	=> array(1,'numery telefoniczne'),
		'gadugadu'	=> array(1,'gadu-gadu'),
		'yahoo'		=> array(1,'yahoo'),
		'skype'		=> array(1,'skype'),
		'email'		=> array(1,'e-mail'),
		'pin'		=> array(1,'numer PIN'),
		'regon'		=> array(1,'regon'),
		'rbe'		=> array(1,'KRS'),
		'payment'	=> array(1,'termin i typ płatności, jak ukryjemy pola to wartości będą równe : domyślny'),
		'cutoff'	=> array(1,'zawieszenie blokowania'),
		'info'		=> array(1,'pole na dodatkową informację'),
		'info_visual'	=> array(0,'edytor wizualny dla pola z dodatkową informacją'),
		'warning'	=> array(1,'pole z informacją na powiadomienie'),
		'warning_visual'=> array(1,'edytor wizualny dla pola powiadomienie'),
		'notes'		=> array(1,'notes'),
		'notes_visual' 	=> array(0,'edytor wizualny dla pola notes'),
		'agreement'	=> array(1,'zgody na przetwarzanie osobowych, faktury elektroniczne, wysyłkę faktur i powiadomień'),
		'consentdate'	=> array(0,'zaznaczaj zgodę na przetwarzanie danych (nowy klient), nawet jak box jest ukryty'),
		'einvoice'	=> array(0,'zaznaczaj zgodę na faktury elektroniczne (nowy klient), nawet jak box jest ukryty'),
		'invoicenotice' => array(0,'zaznaczaj zgodę na dostarczanie faktur pocztą elektroniczną (nowy klient), nawet jak box jest ukryty'),
		'mailingnotice' => array(0,'zaznaczaj zgodę na dostarczanie informacji pocztą elekt. lub smsem (nowy klient), nawet jak box jest ukryty'),
    ),
    'netdev' => array(
		'producer'	=> array(1,'producent i model urządzenia'),
		'sn'		=> array(1,'numer serycjny'),
		'gps'		=> array(1,'położenie GPS'),
		'monitoring'	=> array(1,'monitoring'),
		'typeofdevice'	=> array(1,'rodzaj urządzenia'),
		'purchasedate'	=> array(1,'data zakupu'),
		'guaranteeperiod'=>array(1,'okres gwarancji'),
		'desc'		=> array(1,'opis'),
		'project'	=> array(1,'projekt inwestycyjny'),
		'status'	=> array(1,'status urządzenia'),
		'login'		=> array(1,'login i hasło do urządzenia'),
		'replace'	=> array(0,'wymiana urządzenia na inne, pole select "Wynień na:"'),
		'ibgp'		=> array(0,'pole iBGP AS - identyfikator AS routera'),
		'ebgp'		=> array(0,'pole eBGP AS - identyfikator AS routera'),
                'vlan_id'       => array(0,'pole VLAN - Identyfikator ramki ethernetowej'),
    ),
    'quicksearch' => array(
		'qscustomer'	=> array(1,'szybkie wyszukiwanie klienta'),
		'qsnodes'	=> array(1,'szybkie wyszukiwanie komputerów'),
		'qsnetdev'	=> array(1,'szybkie wyszukiwanie interfejsów sieciowych'),
		'qsticket'	=> array(1,'szybkie wyszukiwanie zgłoszeń'),
		'qsaccount'	=> array(1,'szybkie wyszukiwanie konta, aliasu'),
		'qsdocument'	=> array(1,'szybkie wyszukiwanie dokumentów'),
    ),
);

foreach ($DEFAULTFORM as $section => $values)
    foreach ($values as $key => $val)
        if (!isset($CONFIGFORM[$section][$key]))
            $CONFIGFORM[$section][$key] = $val[0];
//unset($DEFAULTFORM);

function get_form($name, $default = 1)
{
    global $CONFIGFORM;

    list($section, $name) = explode('.', $name, 2);
    $section = strtolower($section);
    $name = strtolower($name);

    if (empty($name)) {
        return $default;
    }

    if (!array_key_exists($section, $CONFIGFORM)) {
        return $default;
    }

    if (!array_key_exists($name, $CONFIGFORM[$section])) {
        return $default;
    }

    $value = $CONFIGFORM[$section][$name];
    
    return ($value ? $value : 0);
}

function check_form($name, $default = 1)
{
    global $CONFIGFORM;

    list($section, $name) = explode('.', $name, 2);
    $section = strtolower($section);
    $name = strtolower($name);

    if (empty($name)) {
        return $default;
    }

    if (!array_key_exists($section, $CONFIGFORM)) {
        return $default;
    }

    if (!array_key_exists($name, $CONFIGFORM[$section])) {
        return $default;
    }

    $value = $CONFIGFORM[$section][$name];
    
    if ($value == '1' || $value == '2')
	return TRUE;
    else
	return FALSE;

}

function required_form($name, $default = 1)
{
    global $CONFIGFORM;

    list($section, $name) = explode('.', $name, 2);
    $section = strtolower($section);
    $name = strtolower($name);

    if (empty($name)) {
        return $default;
    }

    if (!array_key_exists($section, $CONFIGFORM)) {
        return $default;
    }

    if (!array_key_exists($name, $CONFIGFORM[$section])) {
        return $default;
    }

    $value = $CONFIGFORM[$section][$name];
    
    if ($value == '2')
	return TRUE;
    else
	return FALSE;

}

function check_xajax() {
    global $LMS;
    if ($LMS->loadxajax == TRUE)
	return TRUE;
    else
	return FALSE;
}


?>
