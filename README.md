# Spintax
Parser spintax

Support Spintax
  - Standart spintax
  - Nested spintax
  - Block spintax

### Installation
Download and extract the [latest release](https://github.com/viamarvin/spintax/releases).

### How to use
```php
/** 
 * Method for parsing text
 * @param String $text
 * @param Array $count start processing the blocks "start" and "end" for example [1, 3]
 * @return String 
 */
Spintax::Parse($text, $count = []);
```

### Examples
#### Standart Spintax
```php
$text = '{Writing|Creating} {articles|stories} is a {lot of fun|rewarding experience}.';
print Spintax::Parse($text);

// Example output: 
// Writing articles is a rewarding experience. 
```
#### Nested Spintax
```php
$text = 'Article directories are {an important {element|component|aspect} of SEO|useful for {getting|gaining} backlinks}.';
print Spintax::Parse($text);

// Example output:
// Article directories are useful for gaining backlinks.
```

#### Block Spintax
What is a block of spintax? http://autofillmagic.com/tutorials/block-spinning-step-by-step/

```php
$text = file_get_contents('block-spintax.txt');
print Spintax::Parse($text, [2, 5]);

// Example output:
/* Among the most frustrating and annoying things about multilevel bracket spintax is that is quite hard to read.
   The traditional approach to writing spintax on both paragraph, sentence and phrase level is a real chaos to look at and edit.
   It's a well-known fact by authors that the old spinning syntax with many levels are close unbearable to read.
   
   In contrast to regular bracket spintax, the block spinning syntax is extremely easy-to modify and update.
   
   It is well know that classic spinning syntax is tough to read. Block rewriting is nothing like that and are extremely easy-to read and generate.
   The first thing you may find is the fact that the block spinning format is much simpler to read and revise.
*/
```