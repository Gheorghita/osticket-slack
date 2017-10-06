<?php

require_once INCLUDE_DIR . 'class.plugin.php';
require_once INCLUDE_DIR . 'class.dept.php';

class SlackPluginConfig extends PluginConfig {
    function getOptions() {        
	$depts = Dept::getDepartments();
	$a = array();
        foreach(array_keys($depts) as $deptId) {
	   $dept = pathinfo($depts[$deptId]);
	   $short_dept = $dept['basename'];
           $b = array(
                'slack'.$deptId => new SectionBreakField(array(
                    'label' => 'Slack notifier '.$short_dept,
                )),
                'slack-webhook-url'.$deptId => new TextboxField(array(
                    'label' => 'Webhook URL',
                    'configuration' => array('size'=>100, 'length'=>200),
                )),			            
           );
	   $a = array_merge($a, $b);
	}
	return $a;
    }	
}
