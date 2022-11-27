<?php

namespace App\Repositories;

use App\Models\QrCode;

class QrCodeRepository
{
    public function getLatestQrCodes()
    {
        return QrCode::latest()->paginate(30);
    }

    public function storeQrCode($request)
    {
        return QrCode::create($request);
    }

    public function deleteQrCode($id)
    {
        return QrCode::where('id', $id)
            ->where('created_by', auth()->user()->id)
            ->delete();
    }
}
