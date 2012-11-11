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
 * Array-based FileFilter.
 *
 * @author Yuya Takeyama
 */
class Yuyat_CodePathAnalyzer_FileFilter_ArrayFilter
    implements Yuyat_CodePathAnalyzer_FileFilterInterface
{
    /**
     * @var array
     */
    private $acceptedFiles;

    public function __construct(array $acceptedFiles)
    {
        $this->acceptedFiles = $acceptedFiles;
    }

    public function match($filePath)
    {
        return in_array($filePath, $this->acceptedFiles, true);
    }
}
