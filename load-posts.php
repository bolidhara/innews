<?php
// Sample code to simulate fetching posts from a database
$posts = [
    ["title" => "पहली खबर", "content" => "यह पहली खबर का विवरण है।"],
    ["title" => "दूसरी खबर", "content" => "यह दूसरी खबर का विवरण है।"],
    ["title" => "तीसरी खबर", "content" => "यह तीसरी खबर का विवरण है।"],
    // Add more posts here for demonstration
];

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$postsPerPage = 2; // Number of posts to load per page

// Calculate the offset
$offset = ($page - 1) * $postsPerPage;
$postsToDisplay = array_slice($posts, $offset, $postsPerPage);

// Output posts as HTML
foreach ($postsToDisplay as $post) {
    echo '<div class="post">';
    echo '<h2>' . $post['title'] . '</h2>';
    echo '<p>' . $post['content'] . '</p>';
    echo '</div>';
}
?>







$.ajax({
    url: 'http://example.com/load-posts.php',  // सही पथ का उपयोग करें
    type: 'GET',
    data: { page: page },
    beforeSend: function() {
        $(".load-more").text('खबरें लोड हो रही हैं...');
    },
    success: function(response) {
        if (response) {
            $(".main-content").append(response); // Append new posts to the page
            page++; // Increment the page number for the next request
        } else {
            $(".load-more").text('कोई और खबरें नहीं हैं!');
        }
    }
});