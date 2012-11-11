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
 * Interface of FileFilter.
 *
 * @author Yuya Takeyama
 */
interface Yuyat_CodePathAnalyzer_FileFilterInterface
{
    /**
     * @param  string $file
     * @return bool
     */
    public function match($file);
}
