<?php
defined('ABSPATH') or die('No script kiddies please!');
if (isset($_REQUEST['command'])) {
if ($_REQUEST['command'] === 're-create') {
check_admin_referer('ti-recreate');
$pluginManagerInstance->uninstall();
$pluginManagerInstance->activate();
if (isset($_GET['page'])) {
header('Location: admin.php?page=' . sanitize_text_field(wp_unslash($_GET['page'])));
}
exit;
}
else if ($_REQUEST['command'] === 'toggle-css-inline') {
check_admin_referer('ti-toggle-css');
$v = isset($_GET['value']) ? (int) sanitize_text_field(wp_unslash($_GET['value'])) : 0;
update_option($pluginManagerInstance->getOptionName('load-css-inline'), $v, false);
if ($v && is_file($pluginManagerInstance->getCssFile())) {
wp_delete_file($pluginManagerInstance->getCssFile());
}
$pluginManagerInstance->handleCssFile();
if (isset($_GET['page'])) {
header('Location: admin.php?page=' . sanitize_text_field(wp_unslash($_GET['page'])) . '&tab=advanced');
}
exit;
}
else if ($_REQUEST['command'] === 'delete-css-file') {
check_admin_referer('ti-delete-css');
if (is_file($pluginManagerInstance->getCssFile())) {
wp_delete_file($pluginManagerInstance->getCssFile());
}
$pluginManagerInstance->handleCssFile();
if (isset($_GET['page'])) {
header('Location: admin.php?page=' . sanitize_text_field(wp_unslash($_GET['page'])) . '&tab=advanced');
}
exit;
}
}
$yesIcon = '<span class="dashicons dashicons-yes-alt"></span>';
$noIcon = '<span class="dashicons dashicons-dismiss"></span>';
$pluginUpdated = ($pluginManagerInstance->getPluginCurrentVersion() <= "1.7.5");
$cssInline = get_option($pluginManagerInstance->getOptionName('load-css-inline'), 0);
$css = get_option($pluginManagerInstance->getOptionName('css-content'));
?>
<h1 class="ti-header-title"><?php echo esc_html(__('Advanced', 'widgets-for-social-post-feed')); ?></h1>
<div class="ti-box">
<div class="ti-box-header"><?php echo esc_html(__('Troubleshooting', 'widgets-for-social-post-feed')); ?></div>
<p class="ti-bold"><?php echo esc_html(__('If you have any problem, you should try these steps:', 'widgets-for-social-post-feed')); ?></p>
<ul class="ti-troubleshooting-checklist">
<li>
<?php echo esc_html(__('Trustindex plugin', 'widgets-for-social-post-feed')); ?>
<ul>
<li>
<?php echo wp_kses_post(__('Use the latest version:', 'widgets-for-social-post-feed') .' '. ($pluginUpdated ? $yesIcon : $noIcon)); ?>
<?php if (!$pluginUpdated): ?>
<a href="/wp-admin/plugins.php?s=<?php echo esc_attr($pluginManagerInstance->getPluginSlug()); ?>" class="ti-btn ti-btn-loading-on-click"><?php echo esc_html(__('Update', 'widgets-for-social-post-feed')); ?></a>
<?php endif; ?>
</li>
<li>
<?php echo wp_kses_post(__('Use automatic plugin update:', 'widgets-for-social-post-feed')); ?>
<a href="/wp-admin/plugins.php?s=<?php echo esc_attr($pluginManagerInstance->getPluginSlug()); ?>" class="ti-btn ti-btn-loading-on-click"><?php echo esc_html(__('Check', 'widgets-for-social-post-feed')); ?></a>
<div class="ti-notice ti-notice-warning">
<p><?php echo esc_html(__('You should enable it, to get new features and fixes automatically, right after they published!', 'widgets-for-social-post-feed')); ?></p>
</div>
</li>
</ul>
</li>
<?php if ($css): ?>
<li>
CSS
<ul>
<li><?php
echo wp_kses_post(__('writing permission', 'widgets-for-social-post-feed') .' (<strong>'. dirname($pluginManagerInstance->getCssFile()) .'</strong>): '. ($pluginManagerInstance->isCssWriteable() ? $yesIcon : $noIcon)); ?>
</li>
<li>
<?php echo esc_html(__('CSS content:', 'widgets-for-social-post-feed')); ?>
<?php
if (is_file($pluginManagerInstance->getCssFile())) {
$content = $pluginManagerInstance->getCssFileContent();
if ($content === $css) {
echo wp_kses_post($yesIcon);
}
elseif (isset($_GET['page'])) {
echo wp_kses_post($noIcon .' '. __('corrupted', 'widgets-for-social-post-feed')) .'
<div class="ti-notice ti-notice-warning">
<p><a href="'. esc_url(wp_nonce_url('?page=' . sanitize_text_field(wp_unslash($_GET['page'])) . '&tab=advanced&command=delete-css-file', 'ti-delete-css')) .'">'.
/* translators: %s: file absolute path */
wp_kses_post(sprintf(__('Delete the CSS file at <strong>%s</strong>.', 'widgets-for-social-post-feed'), $pluginManagerInstance->getCssFile()))
.'</a></p>
</div>';
}
}
else {
echo wp_kses_post($noIcon);
}
?>
<?php if (isset($_GET['page'])): ?>
<span class="ti-checkbox ti-checkbox-row" style="margin-top: 5px">
<input type="checkbox" value="1" <?php if ($cssInline): ?>checked<?php endif;?> onchange="window.location.href = '?page=<?php echo esc_attr(sanitize_text_field(wp_unslash($_GET['page']))); ?>&tab=advanced&_wpnonce=<?php echo esc_attr(wp_create_nonce('ti-toggle-css')); ?>&command=toggle-css-inline&value=' + (this.checked ? 1 : 0)">
<label><?php echo esc_html(__('Enable CSS internal loading', 'widgets-for-social-post-feed')); ?></label>
</span>
<?php endif; ?>
</li>
</ul>
</li>
<?php endif; ?>
<li>
<?php echo esc_html(__('If you are using cacher plugin, you should:', 'widgets-for-social-post-feed')); ?>
<ul>
<li><?php echo esc_html(__('clear the cache', 'widgets-for-social-post-feed')); ?></li>
<li><?php echo esc_html(__("exclude Trustindex's JS file:", 'widgets-for-social-post-feed')); ?> <strong>https://cdn.trustindex.io/loader-feed.js</strong>
<ul>
<li><a href="#" onclick="jQuery('#list-w3-total-cache').toggle(); return false;">W3 Total Cache</a>
<ol id="list-w3-total-cache" style="display: none;">
<li><?php echo esc_html(__('Navigate to', 'widgets-for-social-post-feed')); ?> "Performance" > "Minify"</li>
<li><?php echo esc_html(__('Scroll to', 'widgets-for-social-post-feed')); ?> "Never minify the following JS files"</li>
<li><?php echo esc_html(__('In a new line, add', 'widgets-for-social-post-feed')); ?> https://cdn.trustindex.io/*</li>
<li><?php echo esc_html(__('Save', 'widgets-for-social-post-feed')); ?></li>
</ol>
</li>
</ul>
</li>
</ul>
</li>
<li>
<?php
$pluginUrl = 'https://wordpress.org/support/plugin/' . $pluginManagerInstance->getPluginSlug();
$screenshotUrl = 'https://snipboard.io';
$screencastUrl = 'https://streamable.com/upload-video';
$pastebinUrl = 'https://pastebin.com';
/* translators: %s: URL of the plugin's support */
echo wp_kses_post(sprintf(__("If the problem/question still exists, please create an issue here: %s", 'widgets-for-social-post-feed'), '<a href="'. $pluginUrl .'" target="_blank">'. $pluginUrl .'</a>'));
?>
<br />
<?php echo esc_html(__('Please help us with some information:', 'widgets-for-social-post-feed')); ?>
<ul>
<li><?php echo esc_html(__('Describe your problem', 'widgets-for-social-post-feed')); ?></li>
<li><?php
/* translators: %s: URL of a screenshot service provider */
echo wp_kses_post(sprintf(__('You can share a screenshot with %s', 'widgets-for-social-post-feed'), '<a href="'. $screenshotUrl .'" target="_blank">'. $screenshotUrl .'</a>'));
?></li>
<li><?php
/* translators: %s: URL of a screencast service provider */
echo wp_kses_post(sprintf(__('You can share a screencast video with %s', 'widgets-for-social-post-feed'), '<a href="'. $screencastUrl .'" target="_blank">'. $screencastUrl .'</a>'));
?></li>
<li><?php
/* translators: %s: pastebin URL */
echo wp_kses_post(sprintf(__('If you have an (webserver) error log, you can copy it to the issue, or link it with %s', 'widgets-for-social-post-feed'), '<a href="'. $pastebinUrl .'" target="_blank">'. $pastebinUrl .'</a>'));
?></li>
<li><?php echo esc_html(__('And include the information below:', 'widgets-for-social-post-feed')); ?></li>
</ul>
</li>
</ul>
<textarea class="ti-troubleshooting-info" readonly><?php include $pluginManagerInstance->getPluginDir() . 'include' . DIRECTORY_SEPARATOR . 'troubleshooting.php'; ?></textarea>
<a href=".ti-troubleshooting-info" class="ti-btn ti-pull-right ti-tooltip toggle-tooltip btn-copy2clipboard">
<?php echo esc_html(__('Copy to clipboard', 'widgets-for-social-post-feed')); ?>
<span class="ti-tooltip-message">
<span style="color: #00ff00; margin-right: 2px">✓</span>
<?php echo esc_html(__('Copied', 'widgets-for-social-post-feed')); ?>
</span>
</a>
<div class="clear"></div>
</div>
<div class="ti-box">
<div class="ti-box-header"><?php echo esc_html(__('Re-create plugin', 'widgets-for-social-post-feed')); ?></div>
<p><?php echo wp_kses_post(__('Re-create the database tables of the plugin.<br />Please note: this removes all settings and reviews.', 'widgets-for-social-post-feed')); ?></p>
<?php if (isset($_GET['page'])): ?>
<a href="<?php echo esc_url(wp_nonce_url('?page='. sanitize_text_field(wp_unslash($_GET['page'])) .'&tab=advanced&command=re-create', 'ti-recreate')); ?>" class="ti-btn ti-btn-loading-on-click ti-pull-right"><?php echo esc_html(__('Re-create plugin', 'widgets-for-social-post-feed')); ?></a>
<?php endif; ?>
<div class="clear"></div>
</div>
<div class="ti-box">
<div class="ti-box-header"><?php echo esc_html(__('Translation', 'widgets-for-social-post-feed')); ?></div>
<p>
<?php echo esc_html(__('If you notice an incorrect translation in the plugin text, please report it here:', 'widgets-for-social-post-feed')); ?>
 <a href="mailto:support@trustindex.io">support@trustindex.io</a>
</p>
</div>
