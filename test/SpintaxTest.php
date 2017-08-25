<?php

include_once ("../Spintax.php");

print '<h1>Test Spintax class</h1>';

// Spintax test
$text = '{Writing|Creating} {articles|stories} is a {lot of fun|rewarding experience}.' . "\n";

print '<p><strong>Test spintax:</strong> ' . $text . '</p>';
print '<p style="color: green"><strong>Result:</strong> ' . Spintax::Parse($text) . '</p>';

// Nested spintax test
$text = 'Article directories are {an important {element|component|aspect} of SEO|useful for {getting|gaining} backlinks}.';

print '<p><strong>Test nested spintax:</strong> ' . $text . '</p>';
print '<p style="color: green"><strong>Result:</strong> ' . Spintax::Parse($text) . '</p>';