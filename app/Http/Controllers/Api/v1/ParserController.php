<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\XmlParseRequest;
use App\Http\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function parseXml(XmlParseRequest $request, ParserService $parserService){

        return response()->json(
            $parserService->convertXmlToJson($request->url)
        ,200);
    }
}
