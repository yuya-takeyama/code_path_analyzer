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
 * Filter accepts all files.
 *
 * @author Yuya Takeyama
 */
class Yuyat_CodePathAnalyzer_FileFilter_AcceptAllFilter
    implements Yuyat_CodePathAnalyzer_FileFilterInterface
{
    public function match($filePath)
    {
        return true;
    }
}
