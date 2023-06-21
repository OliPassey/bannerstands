<!DOCTYPE html>
<html>
<head>
  <title>Do We Have Banner Stands?</title>
  <style>
    body {
      text-align: center;
      font-family: Arial, sans-serif;
    }

    h1 {
      margin-top: 50px;
      font-size: 28px;
    }

    p {
      margin-top: 20px;
      font-size: 18px;
    }

    .counter {
      margin-top: 40px;
      font-size: 24px;
      color: #888;
    }
  </style>
  <?php
    // Function to update the visitor count
    function updateVisitorCount() {
      $countFile = 'visitor_count.txt';
      $count = 0;
      
      if (file_exists($countFile)) {
        $count = (int) file_get_contents($countFile);
      }
      
      $count++;
      file_put_contents($countFile, $count);
      
      return $count;
    }

    // Get the visitor count
    $visitorCount = updateVisitorCount();

    // Get image files from the evidence folder
    $imageFolder = 'evidence/';
    $imageFiles = glob($imageFolder . '*.png');

    // Function to extract name and date from the image file name
    function extractNameAndDate($fileName) {
      $baseName = basename($fileName, '.png');
      $parts = explode(' - ', $baseName);
      $name = $parts[0];
      $date = $parts[1];

      // Reformat the date to DD/MM/YYYY format
      $day = substr($date, 0, 2);
      $month = substr($date, 2, 2);
      $year = substr($date, 4, 4);
      $formattedDate = $day . '/' . $month . '/' . $year;

      return array('name' => $name, 'date' => $formattedDate);
    }
  ?>
</head>
<body>
  <h1>No, We Don't Have Any Banner Stands!</h1>
  <p>Many people ask us about banner stands, but we don't have any.</p>
  <div class="counter">So far, <?php echo $visitorCount; ?> people did not believe we have no banner stands.</div>
  <br><br>
  <p>Before you continue...</p>
  <p>They are broken.</p>
  <p>They use old branding.</p>
  <p>They send people to campaigns that aren't running anymore.</p>
  <p>They are not hiding somewhere in the basement.</p>
  <br><br>
  <h1>Still not convinced?</h1><br>
  <!-- Display image files and captions -->
  <div class="images">
    <?php foreach ($imageFiles as $imageFile) {
      $info = extractNameAndDate($imageFile);
      $name = $info['name'];
      $date = $info['date'];
      $caption = "On $date, $name did not believe there were no banner stands";
    ?>
    <div>
      <img src="<?php echo $imageFile; ?>" alt="<?php echo $caption; ?>">
      <p><?php echo $caption; ?></p>
    </div>
    <?php } ?>
  </div>
</body>
</html>
