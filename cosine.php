<?php
/**
 * Euclidean norm
 * ||x|| = sqrt(x・x) // ・ is a dot product
 *
 * @param array $vector
 * @return mixed
 */
 function norm(array $vector) {
    return sqrt(dotProduct($vector, $vector));
}

/**
 * Dot product
 * a・b = summation{i=1,n}(a[i] * b[i])
 *
 * @param array $a
 * @param array $b
 * @return mixed
 */
function dotProduct(array $a, array $b) {
    $dotProduct = 0;
    // to speed up the process, use keys with non-empty values
    $keysA = array_keys(array_filter($a));
    $keysB = array_keys(array_filter($b));
    $uniqueKeys = array_unique(array_merge($keysA, $keysB));
    foreach ($uniqueKeys as $key) {
        if (!empty($a[$key]) && !empty($b[$key]))
            $dotProduct += ($a[$key] * $b[$key]);
    }
    return $dotProduct;
}

/**
 * Cosine similarity for non-normalised vectors
 * sim(a, b) = (a・b) / (||a|| * ||b||)
 *
 * @param array $a
 * @param array $b
 * @return mixed
 */
function cosinus(array $a, array $b) {
    $normA = norm($a);
    $normB = norm($b);
    return (($normA * $normB) != 0)
           ? dotProduct($a, $b) / ($normA * $normB)
           : 0;
}


?>