@extends('layouts.app')

@section('content')
<div class="bg-white p-3 p-md-4 rounded border">
    <form method="POST" action="{{route('DrinkingWaterOffice.create')}}">
        <div class="row">
            <div class="form-group col-lg-6">
                <label>कार्यक्रम तथा परियोजनाको नाम</label>
                <input type="text" v-model="form.title" class="form-control" name="ProjectName" />

            </div>
            <div class="form-group col-lg-6">
                <label>जिल्ला</label>
                <select class="custom-select" name="district" v-model="form.organization_id">
                    <option value="">कृपया जिल्ला चयन गर्नुहोस्</option>
                    </select>
                <small class="text-danger"></small>
            </div>
            <div class="form-group col-lg-6">
                <label>पालिकाको नाम </label>
                <input type="text"  class="form-control" name="municipality" />
                <small class="text-danger"></small>
            </div>

            <div class="form-group col-lg-6">
                <label>सुरु बर्ष</label>
                <input type="date"  class="form-control" name="starting_date" />
                <small class="text-danger"></small>
            </div>
            <div class="form-group col-lg-6">
                <label>आधार वर्षमा लाभाम्वित हुने जनसंख्या</label>
                <input type="text"  class="form-control" name="Population to_be_benefited" />
                <small class="text-danger"></small>
            </div>
            <div class="form-group col-lg-6">
                <label>लागत अनुमान</label>
                <input type="text" class="form-control" name="CostEstimate" />
                <small class="text-danger"></small>
            </div>
            <div class="form-group col-lg-6">
                <label>गत आर्थिक वर्षको खर्च रू. हजार मा</label>
                <input type="text" v-model="form.budget_source" class="form-control" name="lastYearExpenses"/>
                <small class="text-danger"><small>
            </div>
            <div class="form-group col-lg-6">
                <label>गत आर्थिक वर्षको भौतिक प्रगाति(%)</label>
                <input type="text" v-model="form.budget_source" class="form-control" class="lastYearProgress" />
                <small class="text-danger"><small>
            </div>

            <div class="form-group col-lg-6">
                <label>चालु आ.व को बजेट</label>
                <input type="text" v-model="form.description" class="form-control" name="chaluArthikBarshaBudget" />
                <small class="text-danger"></small>
            </div>
            <div class="form-group col-lg-6">
                <label>उपभोक्ता समितिको अध्यक्षको नाम </label>
                <input type="text" v-model="form.description" class="form-control" name="ChairmanName"/>
                <small class="text-danger"></small>
            </div>
            <div class="form-group col-lg-6">
                <label>उपभोक्ता समितिको अध्यक्षको सम्पर्क न.</label>
                <input type="text" v-model="form.description" class="form-control" name="ChairmanContact"/>
                <small class="text-danger"></small>
            </div>
            <div class="form-group col-lg-6">
                <label>कैफियत</label>
                <input type="text" v-model="form.description" class="form-control" name="Remarks"/>
                <small class="text-danger"></small>
            </div>
        </div>
        <button class="btn btn-primary z-depth-0">Submit</button>
    </form>
</div>
@endsection