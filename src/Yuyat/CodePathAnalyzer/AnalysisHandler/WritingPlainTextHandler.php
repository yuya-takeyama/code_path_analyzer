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
 * Handler writes analysis as plain-text file.
 *
 * @author Yuya Takeyama
 */
class Yuyat_CodePathAnalyzer_AnalysisHandler_WritingPlainTextHandler
    implements Yuyat_CodePathAnalyzer_AnalysisHandlerInterface
{
    /**
     * @var savePath
     */
    private $savePath;

    public function __construct($savePath)
    {
        $this->savePath = $savePath;
    }

    public function handle(Yuyat_CodePathAnalyzer_Analysis $analysis)
    {
        $outputFile = $this->convertAsOutputFilePath($analysis->getFilePath());

        $fp = fopen($outputFile, 'w');

        foreach ($analysis as $lineInfo) {
            if ($lineInfo->isExecuted()) {
                $output = '+   ';
            } else {
                $output = '    ';
            }

            fputs($fp, $output . $lineInfo->getContent());
        }

        fclose($fp);
    }

    private function convertAsOutputFilePath($filePath)
    {
        return $this->savePath . '/' . str_replace('/', '_-_', $filePath) . '.txt';
    }
}
