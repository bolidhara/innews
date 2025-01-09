error_reporting(E_ALL);
ini_set('display_errors', 1);

<?php
// Sample data (replace with real database query in production)
$posts = [
    ["title" => "पहली खबर", "content" => "यह पहली खबर का विवरण है।"],
    ["title" => "दूसरी खबर", "content" => "यह दूसरी खबर का विवरण है।"],
    ["title" => "तीसरी खबर", "content" => "यह तीसरी खबर का विवरण है।"],
    ["title" => "चौथी खबर", "content" => "यह चौथी खबर का विवरण है।"],
    ["title" => "पाँचवीं खबर", "content" => "यह पाँचवीं खबर का विवरण है।"],
    // Add more posts here for demonstration
];

// Get the page number from the AJAX request (default to 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Ensure this is an integer

// Number of posts to load per page
$postsPerPage = 2;

// Calculate the offset based on the page number
$offset = ($page - 1) * $postsPerPage;

// Slice the posts array to get the posts for the current page
$postsToDisplay = array_slice($posts, $offset, $postsPerPage);

// Output posts as HTML
if (!empty($postsToDisplay)) {
    foreach ($postsToDisplay as $post) {
        echo '<div class="post">';
        echo '<h2>' . htmlspecialchars($post['title']) . '</h2>'; // Ensure title is displayed safely
        echo '<p>' . htmlspecialchars($post['content']) . '</p>'; // Ensure content is displayed safely
        echo '</div>';
    }
} else {
    // If no posts are found, send an empty response
    echo '';
}
?>


