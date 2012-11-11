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
 * Analysis contains file and line info.
 *
 * @author Yuya Takeyama
 */
class Yuyat_CodePathAnalyzer_Analysis implements IteratorAggregate
{
    public function __construct($filePath, array $lineInfos)
    {
        $this->filePath  = $filePath;
        $this->lineInfos = $lineInfos;
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->lineInfos);
    }
}
