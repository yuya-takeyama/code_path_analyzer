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
 * Analyzer itself.
 *
 * @author Yuya Takeyama
 */
class Yuyat_CodePathAnalyzer_Analyzer
{
    /**
     * @var Yuyat_CodePathAnalyzer_FileFilterInterface
     */
    private $fileFilter;

    /**
     * @var Yuyat_CodePathAnalyzer_AnalysisHandlerInterface
     */
    private $analysisHandler;

    /**
     * @var Yuyat_CodePathAnalyzer_AnalysisFactory
     */
    private $analysisFactory;

    public function __construct(
        Yuyat_CodePathAnalyzer_FileFilterInterface      $fileFilter,
        Yuyat_CodePathAnalyzer_AnalysisHandlerInterface $analysisHandler,
        Yuyat_CodePathAnalyzer_AnalysisFactory          $analysisFactory = null
    )
    {
        $this->fileFilter      = $fileFilter;
        $this->analysisHandler = $analysisHandler;

        if ($analysisFactory) {
            $this->analysisFactory = $analysisFactory;
        } else {
            $this->analysisFactory = new Yuyat_CodePathAnalyzer_AnalysisFactory;
        }
    }

    public function analyze($coverageInfo)
    {
        foreach ($coverageInfo as $filePath => $executedFlags)
        {
            if ($this->fileFilter->match($filePath)) {
                $analysis = $this->analysisFactory->createAnalysis(
                    $filePath,
                    $executedFlags
                );

                $this->analysisHandler->handle($analysis);
            }
        }
    }
}
