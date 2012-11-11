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
 * Interface of AnalysisHandler.
 *
 * @author Yuya Takeyama
 */
interface Yuyat_CodePathAnalyzer_AnalysisHandlerInterface
{
    /**
     * @param  Yuyat_CodePathAnalyzer_Analysis $analysis
     * @return void
     */
    public function handle(Yuyat_CodePathAnalyzer_Analysis $analysis);
}
