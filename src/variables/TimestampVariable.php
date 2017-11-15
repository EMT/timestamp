<?php
/**
 * Timestamp plugin for Craft CMS 3.x
 *
 * Add timestamps to asset URLs.
 *
 * @link      http://madebyfieldwork.com
 * @copyright Copyright (c) 2017 Fieldwork
 */

namespace fieldwork\timestamp\variables;

use fieldwork\timestamp\Timestamp;

use Craft;

/**
 * Timestamp Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.timestamp }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Fieldwork
 * @package   Timestamp
 * @since     1.0.0
 */
class TimestampVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.timestamp.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.timestamp.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    
    
    public function it($fileName) {
        $documentRoot = $_SERVER['DOCUMENT_ROOT'];
        $filePath = $documentRoot . $fileName;

        if ($fileName != '' && file_exists($filePath)) {
            $path_parts = pathinfo($fileName);

            if ($path_parts['dirname'] === '/') {
                $path_parts['dirname'] = '';
            }

            return $path_parts['dirname'] . '/' . $path_parts['filename'] . '.' . filemtime($filePath) . '.' . $path_parts['extension'];
        } 
        else {
          return '';
        }
    }
}
