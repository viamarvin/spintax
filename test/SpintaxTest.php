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

// Block spintax test
$text = file_get_contents('block-spintax.txt');

print '<p><strong>Test block spintax</strong></p>';
print '<pre>';
print $text;
print '</pre>';

print '<p style="color: green"><strong>Result:</strong></p>';

print '<pre>';
print '<div style="color: green">' . Spintax::Parse($text, [2, 5]) . '</div>';
print '</pre>';