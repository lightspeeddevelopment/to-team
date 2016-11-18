<div class="uix-field-wrapper">

	<ul class="ui-tab-nav">
		<li><a href="#ui-general" class="active"><?php esc_html_e('General','tour-operator'); ?></a></li>
		<li><a href="#ui-placeholders"><?php esc_html_e('Placeholders','tour-operator'); ?></a></li>
		<li><a href="#ui-archives"><?php esc_html_e('Archives','tour-operator'); ?></a></li>
		<li><a href="#ui-single"><?php esc_html_e('Single','tour-operator'); ?></a></li>
	</ul>

	<div id="ui-general" class="ui-tab active">
		<table class="form-table">
			<tbody>
			<?php do_action('to_framework_team_tab_content','team','general'); ?>
			</tbody>
		</table>
	</div>

	<div id="ui-placeholders" class="ui-tab">
		<table class="form-table">
			<tbody>
			<?php do_action('to_framework_team_tab_content','team','placeholders'); ?>
			</tbody>
		</table>
	</div>

	<div id="ui-archives" class="ui-tab">
		<table class="form-table">
			<tbody>
			<?php do_action('to_framework_team_tab_content','team','archives'); ?>
			</tbody>
		</table>
	</div>

	<div id="ui-single" class="ui-tab">
		<table class="form-table">
			<tbody>
			<?php do_action('to_framework_team_tab_content','team','single'); ?>
			</tbody>
		</table>
	</div>
	<?php do_action('to_framework_team_tab_bottom','team'); ?>
</div>