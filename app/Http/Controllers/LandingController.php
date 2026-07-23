<?php

namespace App\Http\Controllers;

use App\Models\BackgroundImage;
use App\Models\DrawResult;
use App\Models\PreviousDraw;
use App\Models\SiteText;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(Request $request): View
    {
        $backgrounds = collect(BackgroundImage::SLOTS)
            ->keys()
            ->mapWithKeys(fn ($slot) => [$slot => BackgroundImage::urlFor($slot)]);

        $texts = collect(SiteText::SLOTS)
            ->keys()
            ->mapWithKeys(fn ($slot) => [$slot => SiteText::for($slot)]);

        $years = PreviousDraw::availableYears();

        $selectedYear = $request->query('anio', $years->first());

        if (! $years->contains($selectedYear)) {
            $selectedYear = $years->first();
        }

        $previousDraws = PreviousDraw::whereYear('draw_date', $selectedYear)
            ->orderBy('draw_date')
            ->get()
            ->groupBy(fn ($draw) => $draw->draw_date->format('Y-m'))
            ->reverse();

        return view('welcome', [
            'draw' => DrawResult::current(),
            'years' => $years,
            'selectedYear' => $selectedYear,
            'previousDraws' => $previousDraws,
            'backgrounds' => $backgrounds,
            'texts' => $texts,
        ]);
    }
}
