<?php
/**
 * This file is part of CodePathAnalyzer.
 *
 * (c) Yuya Takeyama
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Line info knows its content and whether it's executed.
 *
 * @author Yuya Takeyama
 */
class Yuyat_CodePathAnalyzer_Analysis_LineInfo
{
    /**
     * @var int
     */
    private $line;

    /**
     * @var string
     */
    private $content;

    /**
     * @var bool
     */
    private $executed;

    /**
     * @param  int    $line     Line-number.
     * @param  string $content  Content of the line.
     * @param  bool   $executed Whether the line is executed.
     */
    public function __construct($line, $content, $executed)
    {
        $this->line     = $line;
        $this->content  = $content;
        $this->executed = $executed;
    }

    public function getLine()
    {
        return $this->line;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function isExecuted()
    {
        return $this->executed;
    }
}
