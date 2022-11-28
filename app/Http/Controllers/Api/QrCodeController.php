<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\QrCode\GenerateRequest;
use App\Repositories\QrCodeRepository;
use App\Services\QrCodeService;

class QrCodeController extends Controller
{
    public function __construct(QrCodeRepository $qrCodeRepository, QrCodeService $qrCodeService)
    {
        $this->qrCodeRepository = $qrCodeRepository;
        $this->qrCodeService = $qrCodeService;
    }

    public function generate(GenerateRequest $request)
    {
        $inputs = $this->qrCodeService->prepareInputsForDB($request->validated());

        $path = $this->qrCodeService->generate(
            $request->validated()['content'],
            $request->validated()['size'],
            $request->validated()['fill_color'],
            $request->validated()['background_color'],
        );

        $this->qrCodeRepository->storeQrCode($inputs, $path);

        return view('qrcode.image', compact('path'));
    }
}
