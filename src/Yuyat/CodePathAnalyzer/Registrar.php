<?php
/**
 * This file is part of CodePathAnalyzer.
 *
 * (c) Yuya Takeyama
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once dirname(__FILE__) . '/Analyzer.php';
require_once dirname(__FILE__) . '/AnalysisFactory.php';
require_once dirname(__FILE__) . '/Analysis.php';
require_once dirname(__FILE__) . '/Analysis/LineInfo.php';
require_once dirname(__FILE__) . '/FileFilterInterface.php';
require_once dirname(__FILE__) . '/FileFilter/AcceptAllFilter.php';
require_once dirname(__FILE__) . '/FileFilter/ArrayFilter.php';
require_once dirname(__FILE__) . '/AnalysisHandlerInterface.php';
require_once dirname(__FILE__) . '/AnalysisHandler/WritingPlainTextHandler.php';

/**
 * Registrar of CodePathAnalyzer.
 *
 * @author Yuya Takeyama
 */
class Yuyat_CodePathAnalyzer_Registrar
{
    /**
     * @var Yuyat_CodePathAnalyzer_Analyzer
     */
    private $analyzer;

    public function register(
        Yuyat_CodePathAnalyzer_FileFilterInterface $fileFilter,
        Yuyat_CodePathAnalyzer_AnalysisHandlerInterface $analysisHandler
    )
    {
        xdebug_start_code_coverage();

        $this->analyzer = new Yuyat_CodePathAnalyzer_Analyzer($fileFilter, $analysisHandler);

        register_shutdown_function(array($this, 'analyze'));
    }

    public function analyze()
    {
        $this->analyzer->analyze(xdebug_get_code_coverage());
    }

    public static function registerDefault($files, $savePath)
    {
        if (is_string($files)) {
            $files = array($files);
        }

        if (is_array($files)) {
            $fileFilter = new Yuyat_CodePathAnalyzer_FileFilter_ArrayFilter($files);
        } else {
            $fileFilter = new Yuyat_CodePathAnalyzer_FileFilter_AcceptAllFilter($files);
        }

        $analysisHandler = new Yuyat_CodePathAnalyzer_AnalysisHandler_WritingPlainTextHandler($savePath);

        $self = new self;

        $self->register($fileFilter, $analysisHandler);
    }
}
