<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\QrCode\PreviewRequest;
use App\Http\Requests\QrCode\StoreRequest;
use App\Repositories\QrCodeRepository;
use App\Services\QrCodeService;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function __construct(QrCodeRepository $qrCodeRepository, QrCodeService $qrCodeService)
    {
        $this->qrCodeRepository = $qrCodeRepository;
        $this->qrCodeService = $qrCodeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrCodes = $this->qrCodeRepository->getLatestQrCodes();

        return view('qrcode.index', compact('qrCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qrcode.create');
    }

    /**
     * Preview the qr code for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function preview(PreviewRequest $request)
    {
        return view('qrcode.preview', ['inputs' => $request->validated()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $path = $this->qrCodeService->generate(
            $request->validated()['string'],
            $request->validated()['size'],
            $request->validated()['color'],
            $request->validated()['background'],
        );

        $this->qrCodeRepository->storeQrCode($request->validated(), $path);

        return redirect(route('qrcode.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->qrCodeRepository->deleteQrCode($id);

        return redirect(route('qrcode.index'));
    }
}
