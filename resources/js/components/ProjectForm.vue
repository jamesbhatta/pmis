<template>
  <div class="bg-white p-3 p-md-4 rounded border">
    <form @submit.prevent="submit" method="POST">
      <div class="row">
        <div class="form-group col-lg-6">
          <label>शीर्षक</label>
          <input type="text" v-model="form.title" class="form-control" name="title" />
          <small class="text-danger">{{ form.errors.first('title') }}</small>
        </div>

      <div class="form-group col-lg-6">
        <label>संस्था</label>
        <select class="custom-select" v-model="form.organization_id">
          <option value="">कृपया संस्था चयन गर्नुहोस्</option>
          <option value="सिचाई">जलस्रोत तथा सिचाई विकास डिविजन कार्यालय</option>
          <option value="खाने पानी">खानेपानी तथा सरसफाई डिविजन कार्यालय</option>
          <option value="पूर्वधार">भौतिक पूर्वाधार तथा यातायात मन्त्रालय</option>
          <option value="सहरी विकास">सहरी विकास तथा भवन निर्माण कार्यालय</option>
          <option value="यातायात">यातायात व्यवस्था कार्यालय</option>
          <option v-for="organization in organizations" :value="organization.id" :key="organization.id">{{
              organization.name
          }}</option>
        </select>
        <small class="text-danger">{{ form.errors.first('organization_id') }}</small>
      </div>
      <div class="form-group col-lg-6">
        <label>पालिका को नाम</label>
        <input type="text" class="form-control" name="title" />
        <small class="text-danger">{{ form.errors.first('title') }}</small>
      </div>
      <div class="form-group col-lg-6">
        <label>परियोजना प्रकार</label>
        <select class="custom-select" v-model="form.project_type">
          <option value="">परियोजना प्रकार चयन गर्नुहोस्</option>
          <option value="सिचाई">जलस्रोत तथा सिचाई</option>
          <option value="खाने पानी">खानेपानी तथा सरसफाई</option>
          <option value="पूर्वधार">भौतिक पूर्वाधार तथा यातायात</option>
          <option value="सहरी विकास">सहरी विकास तथा भवन निर्माण</option>
          <option value="यातायात">यातायात व्यवस्था</option>
        </select>
        <small class="text-danger">{{ form.errors.first('project_type') }}</small>
      </div>
      <div class="form-group col-lg-6">
        <label>सुरु मिति</label>
        <input type="text" v-model="form.budget_source" class="form-control" />
        <small class="text-danger">{{ form.errors.first('budget_source') }}</small>
      </div>
      <div class="col-lg-6">
        <label class="" for="inlineFormInputGroup">बजेट</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">रु.</div>
          </div>
          <input type="number" v-model="form.budget" class="form-control" id="inlineFormInputGroup" />
        </div>
        <small class="text-danger">{{ form.errors.first('budget') }}</small>
      </div>
      <div class="form-group col-lg-6">
        <label>बजेट स्रोत</label>
        <input type="text" class="form-control"  placeholder="" />
        <small class="text-danger">{{ form.errors.first('budget_source') }}</small>
      </div>
      <div class="form-group col-lg-6">
        <label>लागत अनुमान</label>
        <input type="text" class="form-control" />
        <small class="text-danger"></small>
      </div>

      <div class="form-group col-lg-6">
        <label>हाल सम्म को वित्तिय प्रगति</label>
        <input type="text" class="form-control" />
        <small class="text-danger">{{ form.errors.first('budget_source') }}</small>
      </div>

      <div class="form-group col-lg-6">
        <label>हाल सम्म को भौतिक प्रगति</label>
        <input type="text" class="form-control" />
        <small class="text-danger">{{ form.errors.first('budget_source') }}</small>
      </div>
      <div class="form-group col-lg-6">
        <label>खर्च किसिम छान्नुहोस्</label>
        <input type="text" class="form-control" />
        <small class="text-danger">{{ form.errors.first('budget_source') }}</small>
      </div>
      <div class="col-lg-6">
        <label class="" for="inlineFormInputGroup">गत आर्थिक वर्षको खर्च हजारमा</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">रु.</div>
          </div>
          <input type="number" class="form-control" id="inlineFormInputGroup" />
        </div>
        <small class="text-danger">{{ form.errors.first('budget') }}</small>
      </div>
      <div class="col-lg-6">
        <label class="" for="inlineFormInputGroup">गत आर्थिक वर्षको भौतिक प्रगति(%) </label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">%</div>
          </div>
          <input type="number" class="form-control" id="inlineFormInputGroup" />
        </div>
        <small class="text-danger">{{ form.errors.first('budget') }}</small>
      </div>
      <div class="form-group col-lg-6">
        <label>लाभाम्वित हुने जनसंख्या</label>
        <input type="text" class="form-control" />
        <small class="text-danger">{{ form.errors.first('budget_source') }}</small>
      </div>

      <div class="form-group col-lg-12">
        <label>विवरण</label>
        <textarea v-model="form.description" cols="30" rows="10" class="form-control"></textarea>
        <small class="text-danger">{{ form.errors.first('description') }}</small>
      </div>
      <button class="btn btn-primary z-depth-0">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import Form from "form-backend-validation";

export default {
  props: {
    organizations: {
      type: Object,
      default: () => ({}),
    },
  },

  data() {
    return {
      updateMode: false,
      form: new Form({
        title: null,
        organization_id: null,
        project_type: null,
        budget: null,
        budget_source: null,
        description: null,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post("/project")
        .then(response => alert('Project created'));
    },
  },
};
</script>