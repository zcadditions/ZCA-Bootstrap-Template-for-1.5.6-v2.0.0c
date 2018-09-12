<?php
// -----
// Loop through the to-be-displayed productArray, changing any submit-type image in
// its 'buttonUpdate' elements to contain a font-awesome glyph instead.
//
// That regex "magic" says find the first '<input type="image"{...}/>', replace it with the
// button and then copy anything else (like the 'hidden' input that follows).
//
for ($i = 0, $n = count($productArray); $i < $n; $i++) {
    $productArray[$i]['buttonUpdate'] = preg_replace('/(<input type="image".*?\/>)(.*)/', '<button type="submit" class="btn"><i class="fas fa-sync-alt"></i></button>$2', $productArray[$i]['buttonUpdate']);
}
