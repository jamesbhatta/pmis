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
          <label> संगठन</label>
          <select class="custom-select" v-model="form.organization_id">
            <option value="">कृपया संगठन चयन गर्नुहोस्</option>
            <option v-for="organization in organizations" :value="organization.id" :key="organization.id">{{ organization.name }}</option>
          </select>
          <small class="text-danger">{{ form.errors.first('organization_id') }}</small>
        </div>
        <div class="form-group col-lg-6">
          <label>परियोजना प्रकार</label>
          <select class="custom-select" v-model="form.project_type">
            <option value="">परियोजना प्रकार चयन गर्नुहोस्</option>
            <option value="सिचाई">सिचाई</option>
            <option value="खाने पानी">खाने पानी</option>
            <option value="पूर्वधार">पूर्वधार</option>
            <option value="सहरी विकास">सहरी विकास</option>
            <option value="यातायात">यातायात</option>
          </select>
          <small class="text-danger">{{ form.errors.first('project_type') }}</small>
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
          <input type="text" v-model="form.budget_source" class="form-control" />
          <small class="text-danger">{{ form.errors.first('budget_source') }}</small>
        </div>
 <div class="form-group col-lg-6">
          <label>खर्च किसिम छान्नुहोस्</label>
          <input type="text" v-model="form.budget_source" class="form-control" />
          <small class="text-danger">{{ form.errors.first('budget_source') }}</small>
        </div>

        <div class="form-group col-lg-6">
          <label>विवरण</label>
          <input type="text" v-model="form.description" class="form-control" />
          <small class="text-danger">{{ form.errors.first('description') }}</small>
        </div>
      </div>
      <button class="btn btn-primary z-depth-0">Submit</button>
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