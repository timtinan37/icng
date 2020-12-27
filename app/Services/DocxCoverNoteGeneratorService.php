<?php 

namespace App\Services;

use App\Models\CoverNote;
use PhpOffice\PhpWord\{PhpWord, Settings, IOFactory, TemplateProcessor};

class DocxCoverNoteGeneratorService
{
	private $phpWord;

	function __construct(PhpWord $phpWord)
	{
		$this->phpWord = $phpWord;
		
		Settings::setOutputEscapingEnabled(true);
		Settings::setZipClass(Settings::PCLZIP);

	}
	public function generate(CoverNote $coverNote)
	{
		$templateProcessor = new TemplateProcessor(public_path('/docs/template.docx'));

		$transitArray = $coverNote->transits->pluck('name')->toArray();
		$transits = array_reduce($transitArray, function($transit1, $transit2) {
			$transitString =  $transit1 . ' and/or ' . $transit2;
			return $transit1 ? $transitString : $transit2;
		});

		$riskArray = $coverNote->risks->pluck('name')->toArray();
		$risks = array_reduce($riskArray, function($risk1, $risk2) {
			$riskString = $risk1 . ' and/or ' . $risk2;
			return $risk1 ? $riskString : $risk2;
		});

		$templateProcessor->setValues([
			'issuingOfficeName' => $coverNote->branch->name,
			'issuingOfficeAddress' => $coverNote->branch->address,
			'issuingOfficePhoneNumber' => $coverNote->branch->phone_number,
			'issuingOfficeFaxNumber' => $coverNote->branch->fax_number,
			'issuingOfficeEmail' => $coverNote->branch->email,
			'tariff' => $coverNote->tariff,
			'netPremiumBDT' => $coverNote->net_premium_bdt,
			'vatRate' => $coverNote->vat_rate,
			'vatAmountBDT' => $coverNote->vat_amount_bdt,
			'stampDutyBDT' => $coverNote->stamp_duty_bdt,
			'totalPremiumBDT' => $coverNote->total_premium_bdt,
			'id' => $coverNote->id,
			'createdAt' => $coverNote->created_at,
			'insuredBankName' => $coverNote->insured_bank_name,
			'insuredBankAddress' => $coverNote->insured_bank_address,
			'insuredBankAccountName' => $coverNote->insured_bank_account_name,
			'insuredAddress' => $coverNote->insured_address,
			'interestCovered' => $coverNote->interest_covered,
			'transits' => $transits,
			'voyageFrom' => $coverNote->voyage_from,
			'voyageTo' => $coverNote->voyage_to,
			'voyageVia' => $coverNote->voyage_via,
			'carriage' => $coverNote->carriage->name,
			'amountInsuredUsd' => $coverNote->amount_insured_usd,
			'amountInsuredTolerance' => $coverNote->amount_insured_tolerance,
			'usdToBdtRate' => $coverNote->usd_to_bdt_rate,
			'amountInsuredBdt' => $coverNote->amount_insured_bdt,
			'tkInWord' => $coverNote->tkInWord($coverNote->amount_insured_bdt),
			'risks' => $risks,
			'periodStarts' => $coverNote->period_starts,
			'periodEnds' => $coverNote->period_ends,
			'mr_no' => $coverNote->mr_no,
		]);

		$properties = $this->phpWord->getDocInfo();
		$properties->setCreator(auth()->user()->name);

		$file = "cover-note-$coverNote->id.docx";
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $file . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');

		// Saving the document as OOXML file...
		$templateProcessor->saveAs("php://output");
	}
}