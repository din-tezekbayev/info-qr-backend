<?php

namespace App\Http\Controllers;

use App\Http\Traits\Shared;
use App\Models\Doctor;
use App\Models\Feedback;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use Shared;

    public function addFeedback($doctorId, Request $request)
    {
        $doctor = Doctor::firstWhere('id', $doctorId);

        if (!$doctor) {
            $this->notFound('Доктор не найден!');
        }

        try {
            $feedBack = new Feedback();
            $feedBack->branch_id = $doctor->branch_id;
            $feedBack->doctor_id = $doctor->id;
            $feedBack->rating = $request->rating;
            $feedBack->comment = $request->comment;
            $feedBack->save();

        } catch (\Exception $e) {
            return $this->formatResponse([
                'status' => false,
                'message' => $e
            ], 500);
        }

        $doctor = Doctor::where('id', $doctorId)
            ->withCount('feedbacks')
            ->withAvg('feedbacks', 'rating')
            ->with(['speciality'])
            ->first();

        return $this->formatResponse([
            'message' => 'Ваш отзыв был успешно добавлен!',
            'doctor' => $doctor,
        ]);
    }
}
