<?php
auth_reauthenticate( );
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

html_page_top( plugin_lang_get( 'title' ) );

print_manage_menu();

require_once( plugin_config_get( 'path_erp', NULL, TRUE ) . 'core/config_api.php' );

$t_this_page = 'manage_config';
ERP_print_menu( $t_this_page );

?>

<br />
<table align="center" class="width75" cellspacing="1">

<tr>
	<td class="left">
<?php
	$t_link1 = helper_mantis_url( 'plugins/' . plugin_get_current() . '/scripts/bug_report_mail.php' );
	$t_link2 = plugin_page( 'bug_report_mail' );
	echo plugin_lang_get( 'jobsetup' ) . '<hr />' .
		plugin_lang_get( 'jobsetup_nocron' ) . '<hr />' .
		plugin_lang_get( 'job1' ) . '<a href="' . $t_link1 . '">' . $t_link1 . '</a><br />' .
		plugin_lang_get( 'job2' ) . '<a href="' . $t_link2 . '">' . $t_link2 . '</a>';
?>
	</td>
</tr>

</table>
<br />

<form action="<?php echo plugin_page( $t_this_page . '_edit' )?>" method="post">
<table align="center" class="width75" cellspacing="1">

<?php
ERP_output_config_option( 'problems', 'header' );

ERP_output_config_option( NULL, 'empty' );
ERP_output_config_option( 'security_options', 'header', 'manage_mailbox' );
ERP_output_config_option( 'mail_secured_script', 'boolean', -2 );

ERP_output_config_option( NULL, 'empty' );
ERP_output_config_option( 'cron_options', 'header' );
ERP_output_config_option( 'mail_cronjob_present', 'boolean', -2 );
ERP_output_config_option( 'mail_check_timer', 'integer', -2 );

ERP_output_config_option( NULL, 'empty' );
ERP_output_config_option( 'runtime_options', 'header' );
ERP_output_config_option( 'mail_fetch_max', 'integer', -2 );
ERP_output_config_option( 'mail_delete', 'boolean', -2 );
ERP_output_config_option( 'mail_tmp_directory', 'directory_string', -2 );
ERP_output_config_option( 'mail_encoding', 'dropdown_mbstring_encodings', -2 );

ERP_output_config_option( NULL, 'empty' );
ERP_output_config_option( 'reporter_options', 'header' );
ERP_output_config_option( 'mail_use_reporter', 'boolean', -2 );
ERP_output_config_option( 'mail_reporter_id', 'dropdown_list_reporters', -2 );
ERP_output_config_option( 'mail_auto_signup', 'boolean', -2 );

ERP_output_config_option( NULL, 'empty' );
ERP_output_config_option( 'feature_options', 'header' );
ERP_output_config_option( 'mail_save_from', 'boolean', -2 );
ERP_output_config_option( 'mail_parse_html', 'boolean', -2 );
ERP_output_config_option( 'mail_parse_mime', 'boolean', -2 );
ERP_output_config_option( 'mail_identify_reply', 'boolean', -2 );

ERP_output_config_option( NULL, 'empty' );
ERP_output_config_option( 'priority_feature_options', 'header' );
ERP_output_config_option( 'mail_use_bug_priority', 'boolean', -2 );
ERP_output_config_option( 'mail_bug_priority', 'array', -2 );

ERP_output_config_option( NULL, 'empty' );
ERP_output_config_option( 'default_options', 'header' );
ERP_output_config_option( 'mail_nosubject', 'string', -2 );
ERP_output_config_option( 'mail_nodescription', 'string', -2 );
ERP_output_config_option( 'mail_removed_reply_text', 'string', -2 );

ERP_output_config_option( NULL, 'empty' );
ERP_output_config_option( 'debug_options', 'header' );
ERP_output_config_option( 'mail_debug', 'boolean', -2 );
ERP_output_config_option( 'mail_debug_directory', 'directory_string', -2 );
ERP_output_config_option( 'mail_add_complete_email', 'boolean', -2 );

ERP_output_config_option( 'update_configuration', 'submit' );

?>

</table>
</form>

<?php
html_page_bottom( __FILE__ );
?>