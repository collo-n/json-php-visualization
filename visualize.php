<?php
//initializing the json url
$jsonUrl = 'https://www.thebrand.ai/i/prompt/seo-strategy?mode=categoryView';
//fetching json data from the URL
$jsonData = file_get_contents($jsonUrl);
//checking if the data was fetched successfully
if ($jsonData === false) {
    echo "Failed to fetch JSON data from the URL.";
} else {
    //decoding the json data into php
    $data = json_decode($jsonData, true);
    //visualizing category information
    echo "Category ID: " . $data['category']['id'] . "<br>";
    echo "Category Name: " . $data['category']['name'] . "<br>";
    echo "Category Slug: " . $data['category']['slug'] . "<br>";
    echo "Category Description: " . $data['category']['description'] . "<br>";
    //visualizing the posts information in a table
    echo "<h2>Posts</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Title</th><th>Keywords</th><th>Image</th><th>Created At</th><th>Category ID</th><th>Category Name</th><th>Category Slug</th></tr>";
    foreach ($data['posts'] as $post) {
        echo "<tr>";
        echo "<td>" . $post['id'] . "</td>";
        echo "<td>" . $post['title'] . "</td>";
        echo "<td>" . $post['keywords'] . "</td>";
        //checking if it's available the image before fetching it using the image url
        if (!empty($post['image_default'])) {
            $imageUrl = 'https://www.thebrand.ai/i/' . $post['image_default'];
            echo "<td><img src='$imageUrl' alt='Post Image' width='100'></td>";
        } else {
            echo "<td></td>";
        }
        echo "<td>" . $post['created_at'] . "</td>";
        echo "<td>" . $post['category_id'] . "</td>";
        echo "<td>" . $post['category_name'] . "</td>";
        echo "<td>" . $post['category_slug'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
