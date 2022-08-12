<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Image;
use App\Models\HasilSurvei;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    static function uploadOrDeleteFile(Request $request, HasilSurvei $hSurvei)
    {
        try {
            if ($request->photo_depan) {
                if ($request->file('photo_depan')) {
                    $file = $request->photo_depan->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'depan' => true,

                    ]);
                }
            }
            if ($request->photo_belakang) {
                if ($request->file('photo_belakang')) {
                    $file = $request->photo_belakang->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'belakang' => true,

                    ]);
                }
            }
            if ($request->photo_kanan) {
                if ($request->file('photo_kanan')) {
                    $file = $request->photo_kanan->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'kanan' => true,

                    ]);
                }
            }
            if ($request->photo_kiri) {
                if ($request->file('photo_kiri')) {
                    $file = $request->photo_kiri->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'kiri' => true,

                    ]);
                }
            }
            if ($request->photo_ruang_tamu) {
                if ($request->file('photo_ruang_tamu')) {
                    $file = $request->photo_ruang_tamu->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'ruang_tamu' => true,
                    ]);
                }
            }
            if ($request->photo_ruang_tidur) {
                if ($request->file('photo_ruang_tidur')) {
                    $file = $request->photo_ruang_tidur->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'ruang_tidur' => true,

                    ]);
                }
            }
            if ($request->photo_kamar_mandi) {
                if ($request->file('photo_kamar_mandi')) {
                    $file = $request->photo_kamar_mandi->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'kamar_mandi' => true,

                    ]);
                }
            }
            if ($request->photo_dapur) {
                if ($request->file('photo_dapur')) {
                    $file = $request->photo_dapur->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'dapur' => true,

                    ]);
                }
            }
            if ($request->photo_kks) {
                if ($request->file('photo_kks')) {
                    $file = $request->photo_kks->store("assets/survei/$hSurvei->id/photos", 'public');

                    Image::create([
                        'url' => $file,
                        'hasil_survey_id' => $hSurvei->id,
                        'kks' => true,
                    ]);
                }
            }
        } catch (Exception $e) {
            throw new Exception("Error Add Photo Product : " . $e->getMessage(), 1);

            return ResponseFormatter::error(
                [
                    'message' => $e
                ],
                'Upload Photo Failed',
            );
        }
    }
}
