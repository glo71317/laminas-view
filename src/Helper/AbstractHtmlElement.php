<?php

/**
 * @see       https://github.com/laminas/laminas-view for the canonical source repository
 * @copyright https://github.com/laminas/laminas-view/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-view/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\View\Helper;

abstract class AbstractHtmlElement extends AbstractHelper
{
    /**
     * EOL character
     *
     * @deprecated just use PHP_EOL
     */
    const EOL = PHP_EOL;

    /**
     * The tag closing bracket
     *
     * @var string
     */
    protected $closingBracket = null;

    /**
     * Get the tag closing bracket
     *
     * @return string
     */
    public function getClosingBracket()
    {
        if (! $this->closingBracket) {
            if ($this->isXhtml()) {
                $this->closingBracket = ' />';
            } else {
                $this->closingBracket = '>';
            }
        }

        return $this->closingBracket;
    }

    /**
     * Is doctype XHTML?
     *
     * @return bool
     */
    protected function isXhtml()
    {
        return $this->getView()->plugin('doctype')->isXhtml();
    }

    /**
     * Converts an associative array to a string of tag attributes.
     *
     * @access public
     *
     * @param array $attribs From this array, each key-value pair is
     * converted to an attribute name and value.
     *
     * @return string The XHTML for the attributes.
     */
    protected function htmlAttribs($attribs)
    {
        return $this->getView()->plugin('attributes')->htmlAttribs($attribs);
    }

    /**
     * Normalize an ID
     *
     * @param  string $value
     * @return string
     */
    protected function normalizeId($value)
    {
        return $this->getView()->plugin('attributes')->normalizeId($value);
    }
}
