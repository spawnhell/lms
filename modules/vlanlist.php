<?php

/**
 * Procedury składowe
 * 
 * @author Adam Bugajewski
 * @version 1.0
 */

function vlanShow(){
    
    $obj = new xajaxResponse();
    $obj->script("document.getElementById('vlan_form').style.display='';");
    return $obj;
    
}

function vlanSave($inputData){
    
    global $DB;
    $vlanId = $inputData['vlan_id'];
    $obj = new xajaxResponse();
    $error = false;
    
    if(empty($vlanId)){
        $error = true;
        $message = "VLAN ID Can not be empty.";
        
    } else if (intval($vlanId > VLAN_MAX || $vlanId < VLAN_MIN )){
    
        $error = true;
        $message = "Wrong value for VLAN. VLAN ID should be from ".VLAN_MIN."to ".VLAN_MAX.".\n Get to know IEEE 802.1q";
        
    }else if(!$error) {
        
        $DB->Execute("INSERT INTO vlan (value) VALUES(?)", array( $vlanId ));
        $obj->script("xajax_vlanCancel();");
        $obj->script("self.location.href='?m=vlanlist'");
        
    }
    
    return $obj;
    
}

function vlanCancel(){
    
    $obj = new xajaxResponse();
    $obj->script("document.getElementById('vlan_form').style.display='none';");
    $obj->assign("vlan_id","value");
    return $obj;
    
}

$LMS->InitXajax();

$LMS->RegisterXajaxFunction(
        
        array(
            'vlanShow',
            'vlanCancel',
            'vlanSave',
        )
    );

$layout['pagetitle'] = trans('Lista VLAN obsługiwanych w sieci operatora.');

$vlanList = $DB->getAll('SELECT id,value FROM vlan;');

if ($error) {
    $SMARTY->assign('error_message', $message);
}
$SMARTY->assign('xajax',$LMS->RunXajax());
$SMARTY->assign('vlanList',$vlanList);
$SMARTY->display('vlanlist.html');

?>