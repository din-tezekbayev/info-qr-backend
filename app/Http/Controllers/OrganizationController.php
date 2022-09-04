<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchResource;
use App\Http\Resources\DoctorResource;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Organization;

// TRAITS
use App\Http\Traits\Shared;
use App\Models\OrganizationFeedback;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    use Shared;

    public function index($organizationId, $branchId)
    {
        $organization = Organization::find($organizationId);
        $branch = Branch::find($branchId);

        if (!$organization || !$branch) {
            return $this->notFound('Организация с таким ID не был найден!');
        }

        $sales = $branch->sales()->get();
        $serviceTypes = $branch->serviceTypes()->get();
        $services = $branch->services()->get();
        $doctors = Doctor::where('branch_id', $branch->id)
            ->withCount('feedbacks')
            ->withAvg('feedbacks', 'rating')
            ->with(['speciality'])
            ->get();
        $departments = $branch->departments()->get();
        $surveys = $organization->surveys()->get();

        return $this->formatResponse([
            'organization' => $organization,
            'branch' => new BranchResource($branch),
            'sales' => $sales,
            'serviceTypes' => $serviceTypes,
            'services' => $services,
            'doctors' => DoctorResource::collection($doctors),
            'departments' => $departments,
            'surveys' => $surveys,
        ]);
    }

    public function addFeedback($organizationId, $branchId, Request $request)
    {
        $branch = Branch::firstWhere('id', $branchId);

        if (!$branch) {
            $this->notFound('Организация не найдена!');
        }

        try {
            $feedBack = new OrganizationFeedback();
            $feedBack->organization_id = $organizationId;
            $feedBack->branch_id = $branch->id;
            $feedBack->comment = $request->comment;
            $feedBack->save();

        } catch (\Exception $e) {
            return $this->formatResponse([
                'status' => false,
                'message' => $e
            ], 500);
        }

        return $this->formatResponse([
            'message' => 'Ваш отзыв был успешно добавлен!',
        ]);
    }

    public function getSurvey($organizationId, $surveyId, Request $request)
    {
        $branch = Organization::firstWhere('id', $organizationId);

        if (!$branch) {
            $this->notFound('Организация не найдена!');
        }

        $survey = Survey::firstWhere('id', $surveyId)->with(['survey.questions','survey.questions.answers']);

        if (!$survey) {
            $this->notFound('Опрос по данному ID не найдена!');
        }

        return $this->formatResponse([
            'survey' => $survey,
        ]);
    }


}
