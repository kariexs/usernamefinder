<?php
function checkUsernameExists($url) {
    $headers = @get_headers($url);
    return $headers && strpos($headers[0], '200') !== false;
}

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $social_media_sites = [
        'User Site' => "https://$username.com",
        'GitHub' => "https://github.com/$username",
        'Twitter' => "https://twitter.com/$username",
        'Instagram' => "https://instagram.com/$username",
        'Facebook' => "https://www.facebook.com/$username",
        'TikTok' => "https://www.tiktok.com/@$username",
        'Reddit' => "https://www.reddit.com/user/$username",
        'YouTube' => "https://www.youtube.com/$username",
        'LinkedIn' => "https://www.linkedin.com/in/$username",
        'Pinterest' => "https://www.pinterest.com/$username",
        'Snapchat' => "https://www.snapchat.com/add/$username",
        'Discord' => "https://discord.com/users/$username",
        'Tumblr' => "https://$username.tumblr.com",
        'Spotify' => "https://open.spotify.com/user/$username",
        'Twitch' => "https://www.twitch.tv/$username",
        'Steam' => "https://steamcommunity.com/id/$username",
        'Behance' => "https://www.behance.net/$username",
        'Dribbble' => "https://dribbble.com/$username",
        'Medium' => "https://medium.com/@$username",
        'WordPress' => "https://$username.wordpress.com",
        'Flickr' => "https://www.flickr.com/photos/$username",
        'SoundCloud' => "https://soundcloud.com/$username",
        'Google+' => "https://plus.google.com/$username",
        'WeChat' => "https://www.wechat.com/$username",
        'VK' => "https://vk.com/$username",
    ];
    
    $results = [];
    foreach ($social_media_sites as $platform => $url) {
        $exists = checkUsernameExists($url);
        $results[$platform] = ['url' => $url, 'exists' => $exists];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Username Finder</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
    <div id="particles-js"></div>
    <div class="container">
        <h1>Check Username Across Social Media</h1>
        <form method="POST" action="">
            <label for="username">Enter Username:</label>
            <input type="text" id="username" name="username" required placeholder="Enter username">
            <button type="submit">Search</button>
        </form>

        <?php if (isset($username)): ?>
            <div class="result">
                <h2>Results for: <?php echo htmlspecialchars($username); ?></h2>
                <ul>
                    <?php foreach ($results as $platform => $data): ?>
                        <li>
                            <?php if ($data['exists']): ?>
                                <a href="<?php echo $data['url']; ?>" target="_blank">✅ <?php echo $platform; ?></a>
                            <?php else: ?>
                                ❌ <?php echo $platform; ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <script src="particles.js"></script>
</body>
</html>
