<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Abdurrahman Murad"/>
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <header >
        <ul class="header">
          <li class="nav"><a href="#">Home</a></li>
          <li class="nav"><a href="#gallery">Gallery</a></li>
        <li class="nav"><a href="#files-with-ext">Files With Extensions</a></li>
        <li class="nav"><a href="#files-without-ext">Files Without Extensions</a></li>
        <li class="nav"><a href="#files-sorted">All Files Sorted</a></li>
        <li class="nav"><a href="#all-images">All Images</a></li>
        <li class="nav"><a href="#png-image">PNG Images</a></li>
        </ul>
      </header>
      <div class="margin"></div>
      <div class="body-content">

        <!-- Text part  -->
        <div class="text">
          <?php // Open file 'content.txt'
            $content_file_name = "content.txt";
            $content = fopen($content_file_name, "r");
            // Create title text
            $main_header = fgets($content, filesize($content_file_name));
            echo "<h1>$main_header</h1>";
            // Create body text
            $body_content = fread($content, filesize($content_file_name));
            echo "<p class='paragraph'>$body_content</p>";
            // Close file 'content.txt'
            fclose($content);
          ?>
        </div>

        <!-- Gallery -->
        <h2 class="section-title">Gallery</h2>
        <div id="gallery">
          <?php
          // Display images
            $images = array_diff(scandir('images'), array('..', '.'));
            foreach ($images as $image) {
              $image_name = substr($image, 0, strpos($image, '.'));
              $alt = $title = $image_name;
              echo "<img title=$image_name alt=$image_name src='./images/$image' class='image'/>";
            }
          ?>
        </div>

          <!-- Files With Extension -->
          <h2 class="section-title">Files With Extension</h2>
          <div id="files-with-ext" class="card">
            <?php 
              echo "<h3>List of all files(with extension)</h3>";
              $all_file_names = array_diff(scandir('../Assignment-215185123'), array('.', '..'));
              foreach($all_file_names as $name) {
                  if(is_file($name)) {
                      echo "<li>$name</li>";
                  }
              }
            ?>
          </div>

          <!-- Files Without Extension -->
          <h2 class="section-title">Files Without Extension</h2>
          <div id="files-without-ext" class="card">
            <?php
            echo "<h3>List of all files(without extension)</h3>";
            $all_file_names = array_diff(scandir('../Assignment-215185123'), array('.', '..'));
            foreach($all_file_names as $name) {
                if(is_file($name)) {
                $ext_start = strpos($name, '.');
                $ext = substr($name, $ext_start);
                $new_name = substr($name,0, $ext_start);
                echo "<li>$new_name</li>";
                }
            }
            ?>
          </div>

          <!-- All Files Sorted -->
          <h2 class="section-title">All Files (sorted)</h2>
          <div id="files-sorted" class="card">
            <?php
            echo "<h3>List of all files(sorted)</h3>";
            $all_file_names = array_diff(scandir('../Assignment-215185123'), array('.', '..'));
            sort($all_file_names);
            foreach($all_file_names as $name) {
                if(is_file($name)) {
                $ext_start = strpos($name, '.');
                $ext = substr($name, $ext_start);
                $new_name = substr($name,0, $ext_start);
                echo "<li>$new_name</li>";
                }
            }
            ?>
          </div>

          <!-- All Images -->
          <h2 class="section-title">All Images (clickable)</h2>
          <div id="all-images" class="card">
            <?php 
            $all_file_names = array_diff(scandir('images'), array('.', '..'));
            $images_count = sizeof($all_file_names);
            echo "<h3>There are $images_count images below</h3>";
            foreach($all_file_names as $name) {
                echo "<li><a href='./images/$name'>$name</a></li>";
            }
            ?>
          </div>

          <!-- PNG Image -->
          <h2 class="section-title">The One And Only PNG Image</h2>
          <div id="png-image" class="card">
            <?php 
              echo "<h3>List of the only image with 'png' extension</h3>";
              $all_file_names = array_diff(scandir('images'), array('.', '..'));
              foreach($all_file_names as $name) {
                  $ext_start = strpos($name, '.');
                  $ext = substr($name, $ext_start);
                  if($ext == ".PNG") {
                      echo "<li>$name</li>";
                  }
              }
            ?>
          </div>

          <div id="footer">
            <?php
              $counter_file_name = "counter.txt";
              $counter = fopen($counter_file_name, "r+");
              $counter_content = fread($counter, filesize("counter.txt"));
              // Locate where visitors number of count is kept
              $count_pos =  strpos($counter_content, ':') + 2;
              $num_of_visitors = (int)substr($counter_content, $count_pos);
              $new_counter_content = str_replace($num_of_visitors, $num_of_visitors+1, $counter_content);
              file_put_contents($counter_file_name, $new_counter_content);
              echo "<p class='counter'>$new_counter_content</p>";
              fclose($counter);

              // Display date and time
              $date = date('D, d M Y H:i:s');
              echo "<p class='date'>$date</p>";
            ?>
            <p class="copyrite">Author: Abdurrahman Murad &copy;</p>
          </div>
      </div>
    </div>
  </body>
</html>
