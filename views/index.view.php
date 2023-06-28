<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gästebuch</title>

    <link
      rel="stylesheet"
      type="text/css"
      href="./styles/lib/montserrat/webfonts/Montserrat.css"
    />
    <link rel="stylesheet" type="text/css" href="./styles/main.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="guestbook-heading">Gästebuch</h1>

      <form method="POST" action="submit.php">
        <?php if(isset($errorMessage)): ?>
          <p><?php echo e($errorMessage); ?></p>
        <?php endif; ?>
        
        <label class="guestbook-entry-label" for="name">Dein Name:</label>
        <input
          required
          class="guestbook-entry-input"
          type="text"
          id="name"
          name="name"
        />

        <label class="guestbook-entry-label" for="title"
          >Titel des Eintrags:</label
        >
        <input
          required
          class="guestbook-entry-input"
          type="text"
          id="title"
          name="title"
        />

        <label class="guestbook-entry-label" for="content"
          >Inhalt des Eintrags:</label
        >
        <textarea
          required
          rows="4"
          class="guestbook-entry-input"
          type="text"
          id="content"
          name="content"
        ></textarea>

        <div class="guestbook-form-btns">
          <input class="btn" type="reset" value="Zurücksetzen" />
          <input class="btn" type="submit" value="Absenden" />
        </div>
      </form>

      <hr class="guestbook-seperator" />

      <?php foreach($entries AS $p_entry): ?>
        <?php
          $paragraphs = explode("\n", $p_entry['content']);
          $filteredParagraphs = [];

          foreach ($paragraphs AS $p_paragraph) {
            //? Einzelner Leerzeichen String entfärnen
            $p_paragraph = trim($p_paragraph);

            if (strlen($p_paragraph) !== 0) {
              $filteredParagraphs[] = $p_paragraph;
            }
          }
        ?>
        <div class="guestbook-entry">
          <div class="guestbook-entry-header">
            <h3 class="guestbook-entry-title">
              <?php echo e($p_entry['title']); ?>
            </h3>
            <span class="guestbook-entry-author">
              <?php echo e($p_entry['name']); ?>
            </span>
          </div>
          <div class="guestbook-entry-content">
            <p>
              <?php foreach($filteredParagraphs AS $p): ?>
                  <p><?php echo e($p); ?></p>
              <?php endforeach; ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>

      <?php
        $numPages = ceil($countTotal / $perPage);
      ?>

      <?php if($numPages > 1): ?>
        <ul class="guestbook-pagination">
          <?php for($x = 1; $x <= $numPages; $x++): ?>
            <li class="guestbook-pagination-li">
              <a 
              class="guestbook-pagination-a<?php if($x === $currentPage): ?> guestbook-pagination-active<?php endif; ?>" 
              href="index.php?<?php echo http_build_query(['page' => $x]); ?>"
              >
                <?php echo e($x); ?>
              </a>
            </li>
          <?php endfor; ?>        
        </ul>
      <?php endif; ?>

      <hr class="guestbook-seperator" />

      <footer class="guestbook-footer">
        <p>PHP Projekt Gästebuch</p>
      </footer>
    </div>
  </body>
</html>
