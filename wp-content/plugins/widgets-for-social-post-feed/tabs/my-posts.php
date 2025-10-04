<?php
defined('ABSPATH') or die('No script kiddies please!');
$feedData = $pluginManagerInstance->getFeedData();
$hiddenPosts = $feedData['style']['settings']['hidden_posts'];
$downloadAvailableTimestamp = $pluginManagerInstance->getDownloadAvailableTimestamp();
if (isset($_GET['toggle-hide'])) {
check_admin_referer('ti-toggle-hide');
$id = sanitize_text_field(wp_unslash($_GET['toggle-hide']));
$key = array_search($id, $hiddenPosts);
if (false !== $key) {
unset($hiddenPosts[$key]);
} else {
$hiddenPosts[] = $id;
}
$feedData['style']['settings']['hidden_posts'] = $hiddenPosts;
$pluginManagerInstance->saveFeedData($feedData, false);
if (isset($_GET['page']) && isset($_GET['tab'])) {
header('Location: admin.php?page=' . sanitize_text_field(wp_unslash($_GET['page'])) . '&tab=' . sanitize_text_field(wp_unslash($_GET['tab'])));
}
exit;
} elseif (isset($_GET['download'])) {
if ('posts' === $_GET['download']) {
check_admin_referer('ti-download-posts');

header('Location: admin.php?page=' . sanitize_text_field(wp_unslash($_GET['page'])) . '&tab=' . sanitize_text_field(wp_unslash($_GET['tab'])));
}
}
$pluginManagerInstance->registerLoaderScript();
$posts = $feedData['posts'];
$pluginManagerInstance->setNotificationParam('post-download-finished', 'active', false);
$pluginManagerInstance->setNotificationParam('post-download-finished', 'do-check', true);
?>
<div class="ti-header-title"><?php echo esc_html(__('My Posts', 'widgets-for-social-post-feed')); ?></div>
<div class="ti-box">

<div class="ti-upgrade-notice">
<strong><?php echo esc_html(__('UPGRADE to PRO Features', 'widgets-for-social-post-feed')); ?></strong>
<?php if ($pluginManagerInstance->isDownloadManual()): ?>
<p><?php echo esc_html(__('No more manual refresh! With PRO your feed updates automatically – plus get unlimited posts, multiple feed widgets with custom style settings, widget popups, and access to 9 social platforms. Showcase your content like a pro!', 'widgets-for-social-post-feed')); ?></p>
<?php else: ?>
<p><?php echo esc_html(__('Get unlimited posts, multiple feed widgets with custom style settings, widget popups, and access to 9 social platforms – everything you need to showcase your content like a pro!', 'widgets-for-social-post-feed')); ?></p>
<?php endif; ?>
<a class="ti-btn" href="https://www.trustindex.io?a=sys&c=wp-facebook-feed-pro" target="_blank"><?php echo esc_html(__('Create a Free Account for More Features', 'widgets-for-social-post-feed')); ?></a>
</div>
<?php if (!count($posts)): ?>
<div class="ti-notice ti-notice-warning">
<p><?php echo esc_html(__('You had no posts!', 'widgets-for-social-post-feed')); ?></p>
</div>
<?php else: ?>
<table class="wp-list-table widefat fixed striped table-view-list ti-my-posts ti-widget">
<thead>
<tr>
<th class="ti-text-center"><?php echo esc_html(__('Media', 'widgets-for-social-post-feed')); ?></th>
<th class="ti-text-center"><?php echo esc_html(__('Date', 'widgets-for-social-post-feed')); ?></th>
<th class="ti-text-left"><?php echo esc_html(__('Text', 'widgets-for-social-post-feed')); ?></th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach ($posts as $post):
$isHidden = in_array($post['id'], $hiddenPosts);
$imgUrl = '';
if (isset($post['media_content'][0]['image_urls']['small'])) {
$imgUrl = 'https://cdn.trustindex.io/' . $post['media_content'][0]['image_urls']['small'];
} elseif (isset($post['media_content'][0]['image_url'])) {
$imgUrl = $post['media_content'][0]['image_url'];
}
?>
<tr data-id="<?php echo esc_attr($post['id']); ?>"<?php if ($isHidden): ?> class="ti-hidden-post"<?php endif; ?>>
<td class="ti-text-center">
<a href="<?php echo esc_url($post['url']); ?>" target="_blank">
<?php if ($imgUrl): ?>
<?php echo wp_kses_post($pluginManagerInstance->displayImg($imgUrl, array('class' => 'ti-post-preview'))); ?>
<?php else: ?>
[<?php echo esc_html(__('Redirect to the post', 'widgets-for-social-post-feed')); ?>]
<?php endif; ?>
</a>
</td>
<td class="ti-text-center">
<span><?php echo esc_html($post['created_at']); ?></span>
</td>
<td class="ti-text-left">
<?php
$text = '-';
if (isset($post['text'])) {
$text = $post['text'];
if (strlen($text) > 120) {
$text = substr($text,0,120) . '...';
}
}
?>
<div class="ti-review-content"><?php echo esc_html($text); ?></div>
</td>
<?php if (isset($_GET['page'])): ?>
<td>
<a href="<?php echo esc_url(wp_nonce_url('?page='. sanitize_text_field(wp_unslash($_GET['page'])) .'&tab=my-posts&toggle-hide='. esc_attr($post['id']), 'ti-toggle-hide')); ?>"
 class="ti-btn ti-btn-sm ti-btn-default btn-toggle-hide <?php if ($pluginManagerInstance->isDownloadInProgress()): ?>ti-btn-disabled<?php endif; ?>">
<?php if ($isHidden): ?>
<?php echo esc_html(__('Show post', 'widgets-for-social-post-feed')); ?>
<?php else: ?>
<?php echo esc_html(__('Hide post', 'widgets-for-social-post-feed')); ?>
<?php endif; ?>
</a>
</td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</div>
<?php
$tiCampaign1 = 'wp-feed-facebook-4';
$tiCampaign2 = 'wp-feed-facebook-5';
include(plugin_dir_path(__FILE__) . '../include/get-more-customers-box.php');
?>
