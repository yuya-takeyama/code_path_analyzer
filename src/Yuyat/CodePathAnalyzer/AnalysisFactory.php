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
 * Factory of Analysis.
 *
 * @author Yuya Takeyama
 */
class Yuyat_CodePathAnalyzer_AnalysisFactory
{
    public function createAnalysis($filePath, $executedFlags)
    {
        $lineInfos = array();

        $line = 1;
        foreach (file($filePath) as $content) {
            $lineInfos[] = new Yuyat_CodePathAnalyzer_Analysis_LineInfo(
                $line,
                $content,
                isset($executedFlags[$line])
            );

            $line++;
        }

        return new Yuyat_CodePathAnalyzer_Analysis($filePath, $lineInfos);
    }
}
