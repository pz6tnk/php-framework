<?php

foreach ($articles as $article) {
    echo "<h2>" . $article->title . "</h2>";
    echo "<p>" . $article->body . "</p>";
}
