<?php
/**
 * Created by PhpStorm.
 * User: a6y
 * Date: 19.08.15
 * Time: 11:08
 */
/**
 * Wrap regexp to filter content
 */
namespace Parser;

abstract class Filter implements \Parser\Interfaces\Filter {
    use Traits\Named;
    private $__regexp = '';

    public function __construct($regexp) {
        $this->__regexp = $regexp;
    }

    public function filter(\RollingCurl\Request $data) {
        //var_dump($data);
        preg_match($this->__regexp, $data->getResponseText(), $match);
        return (!empty($match[1])) ? $match[1] : NULL;
    }
}