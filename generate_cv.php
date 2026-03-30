<?php

$firstname = htmlspecialchars(trim($_POST['firstname']));
$lastname = htmlspecialchars(trim($_POST['lastname']));
$fullname = $firstname . " " . $lastname;
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$location = htmlspecialchars(trim($_POST['location']));
$linkedin = htmlspecialchars(trim($_POST['linkedin']));
$summary = htmlspecialchars(trim($_POST['summary']));
$school = htmlspecialchars(trim($_POST['school']));
$degree = htmlspecialchars(trim($_POST['degree']));
$grad_year = htmlspecialchars(trim($_POST['grad_year']));
$job_title = htmlspecialchars(trim($_POST['job_title']));
$company = htmlspecialchars(trim($_POST['company']));
$job_period = htmlspecialchars(trim($_POST['job_period']));
$job_desc = htmlspecialchars(trim($_POST['job_desc']));
$skills_raw = htmlspecialchars(trim($_POST['skills']));
$skills = explode(",", $skills_raw);

$photo_src = "";

if ($_FILES['photo']['error'] == 0) {
    $allowed = array("image/jpeg", "image/png", "image/gif", "image/webp");
    $mime = mime_content_type($_FILES['photo']['tmp_name']);

    if (in_array($mime, $allowed)) {
        $image_data = file_get_contents($_FILES['photo']['tmp_name']);
        $photo_src = "data:" . $mime . ";base64," . base64_encode($image_data);
    }
}

$initials = "";
$words = explode(" ", $fullname);
foreach ($words as $word) {
    if ($word != "") {
        $initials .= strtoupper($word[0]);
    }
}
$initials = substr($initials, 0, 2);

if ($fullname == " " || $fullname == "") {
    header("Location: index.html");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo $fullname; ?> - CV</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<div class="noise"></div>
<div class="blob blob-1"></div>
<div class="blob blob-2"></div>

<div class="cv-page">

  <a href="index.html" class="back-link">
    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
    back to form
  </a>

  <div class="cv-card">

    <div class="cv-top">
      <div class="cv-photo-wrap">
        <?php if ($photo_src != "") { ?>
          <img src="<?php echo $photo_src; ?>" alt="<?php echo $fullname; ?>">
        <?php } else { ?>
          <div class="cv-photo-placeholder"><?php echo $initials; ?></div>
        <?php } ?>
      </div>

      <div class="cv-name-block">
        <div class="cv-name">
          <?php echo $firstname; ?>
          <?php if ($lastname != "") { ?>
            <span> <?php echo $lastname; ?></span>
          <?php } ?>
        </div>

        <?php if ($job_title != "") { ?>
          <div class="cv-role">// <?php echo $job_title; ?></div>
        <?php } ?>

        <div class="cv-contacts">
          <?php if ($email != "") { ?>
            <div class="cv-contact-item">
              <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            </div>
          <?php } ?>

          <?php if ($phone != "") { ?>
            <div class="cv-contact-item">
              <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 .99h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 15.92z"/></svg>
              <?php echo $phone; ?>
            </div>
          <?php } ?>

          <?php if ($location != "") { ?>
            <div class="cv-contact-item">
              <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <?php echo $location; ?>
            </div>
          <?php } ?>

          <?php if ($linkedin != "") { ?>
            <div class="cv-contact-item">
              <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>
              <a href="<?php echo $linkedin; ?>" target="_blank"><?php echo $linkedin; ?></a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="cv-body">

      <div class="cv-main">

        <?php if ($summary != "") { ?>
        <div class="cv-section">
          <div class="cv-section-title">
            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
            About
          </div>
          <p class="cv-summary"><?php echo nl2br($summary); ?></p>
        </div>
        <?php } ?>

        <?php if ($company != "" || $job_desc != "") { ?>
        <div class="cv-section">
          <div class="cv-section-title">
            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg>
            Experience
          </div>
          <?php if ($job_title != "") { ?>
            <div class="exp-title"><?php echo $job_title; ?></div>
          <?php } ?>
          <div class="exp-meta">
            <span><?php echo $company; ?></span>
            <span><?php echo $job_period; ?></span>
          </div>
          <?php if ($job_desc != "") { ?>
            <div class="exp-desc"><?php echo nl2br($job_desc); ?></div>
          <?php } ?>
        </div>
        <?php } ?>

        <?php if ($school != "") { ?>
        <div class="cv-section">
          <div class="cv-section-title">
            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            Education
          </div>
          <div class="edu-school"><?php echo $school; ?></div>
          <?php if ($degree != "") { ?>
            <div class="edu-degree"><?php echo $degree; ?></div>
          <?php } ?>
          <?php if ($grad_year != "") { ?>
            <div class="edu-year"><?php echo $grad_year; ?></div>
          <?php } ?>
        </div>
        <?php } ?>

      </div>

      <div class="cv-sidebar">

        <?php if ($skills_raw != "") { ?>
        <div class="cv-section">
          <div class="cv-section-title">
            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            Skills
          </div>
          <div class="skills-list">
            <?php foreach ($skills as $skill) { ?>
              <span class="skill-tag"><?php echo htmlspecialchars(trim($skill)); ?></span>
            <?php } ?>
          </div>
        </div>
        <?php } ?>

      </div>

    </div>
  </div>

  <div class="cv-actions">
    <a href="index.html" class="btn-cv-back">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
      Edit
    </a>
    <button class="btn-pink" onclick="window.print()" style="border-radius:8px; padding:12px 28px;">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
      Print / PDF
    </button>
  </div>

</div>

</body>
</html>
