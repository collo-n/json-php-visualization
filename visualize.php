<?php

// URL to the JSON data
$jsonUrl = 'https://www.thebrand.ai/i/prompt/seo-strategy?mode=categoryView';

// Fetch JSON data from the URL
$jsonData = file_get_contents($jsonUrl);

// Check if data was fetched successfully
if ($jsonData === false) {
    echo "Failed to fetch JSON data from the URL.";
} else {
    // Decode JSON data into a PHP associative array
    $data = json_decode($jsonData, true);

    // Display category information
    echo "Category ID: " . $data['category']['id'] . "<br>";
    echo "Category Name: " . $data['category']['name'] . "<br>";
    echo "Category Slug: " . $data['category']['slug'] . "<br>";
    echo "Category Description: " . $data['category']['description'] . "<br>";

    // Display posts information
    echo "<h2>Posts</h2>";
    foreach ($data['posts'] as $post) {
        echo "Post ID: " . $post['id'] . "<br>";
        echo "Post Title: " . $post['title'] . "<br>";
        echo "Post Keywords: " . $post['keywords'] . "<br>";

        // Display the image if it's available
        if (!empty($post['image_default'])) {
            $imageUrl = 'https://www.thebrand.ai/i/' . $post['image_default'];
            echo "Post Image: <img src='$imageUrl' alt='Post Image'><br>";
        }

        echo "Created At: " . $post['created_at'] . "<br>";
        echo "Category ID: " . $post['category_id'] . "<br>";
        echo "Category Name: " . $post['category_name'] . "<br>";
        echo "Category Slug: " . $post['category_slug'] . "<br><br>";
    }
}

?>
