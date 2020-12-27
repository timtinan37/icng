<?php 

namespace App\Services;

use App\Models\CoverNote;

class CoverNoteGeneratorService
{
	private $docxCoverNoteGeneratorService;

	function __construct(DocxCoverNoteGeneratorService $docxCoverNoteGeneratorService)
	{
		$this->docxCoverNoteGeneratorService = $docxCoverNoteGeneratorService;
	}
	public function generate(CoverNote $coverNote, $fileType)
	{
		switch ($fileType) {
			case 'docx':
				$file = $this->docxCoverNoteGeneratorService->generate($coverNote);
				break;
		}
	}
}