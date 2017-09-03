# Aviate PHP

Implementation of Aviate for PHP. Provided as base abstract class to extend for specific frameworks.

## Installation

```
composer require weprovide/aviate
```

## Example

```php
<?php
namespace WeProvide\Aviate\CustomImplementation;

use WeProvide\Aviate\Aviate;

class Bridge extends Aviate {
    // Required function for you to implement. This should return the directory that has the aviate.config.js
    public function getProjectRoot(): string {
        return '/your-directory'
    }

    // Used for convience / demonstration. This is not required
    public function isDevelopment(): bool {
        return true;
    }

    // Return a nested array with Javascript and CSS files to be included into the page
    public function getFiles(): array {
        $types = parent::getFiles();

        if($this->isDevelopment()) {
            // In development css is injected from Javascript to provide hot reloading.
            $types['js'][] = $this->getDevServerUrl('css-file.js');
            return $types;
        }
        
        // In production we load an actual CSS file
        $types['css'][] = 'css-file.css';
        return $types;
    }
}

```
