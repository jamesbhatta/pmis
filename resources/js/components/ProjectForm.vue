<template>
  <div class="box">
    <div class="box__header">
      <div class="box__title">नयाँ परियोजना</div>
    </div>
    <div class="box__body">
      <form @submit.prevent="submit" method="POST">
        <div class="row">
          <div class="form-group col-lg-6">
            <label>आयोजना / कार्यक्रम </label>
            <input type="text" v-model="form.title" class="form-control" name="title" />
            <small class="text-danger">{{ form.errors.first("title") }}</small>
          </div>

          <div class="form-group col-lg-6">
            <label>संगठन</label>
            <select class="custom-select" v-model="form.organization_id">
              <option value="">कृपया संगठन चयन गर्नुहोस्</option>
              <option v-for="organization in organizations" :value="organization.id" :key="organization.id">{{
              organization.name
              }}</option>
            </select>
            <small class="text-danger">{{ form.errors.first("organization_id") }}</small>
          </div>

          <div class="form-group col-lg-6">
            <label>परियोजना प्रकार</label>
            <select class="custom-select" v-model="form.project_type_id">
              <option value="">परियोजना प्रकार चयन गर्नुहोस्</option>
              <option v-for="type in projectTypes" :value="type.id" v-bind:key="type.id">{{ type.name }}</option>
            </select>
            <small class="text-danger">{{ form.errors.first("project_type_id") }}</small>
          </div>

          <div class="form-group col-lg-6">
            <label for="">बजेट</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">रु.</div>
              </div>
              <input type="number" v-model="form.budget" class="form-control" />
            </div>
            <small class="text-danger">{{ form.errors.first("budget") }}</small>
          </div>

          <div class="form-group col-lg-6">
            <label for="">बजेट उपशीर्षक न.(ब.उ.शी.न.)</label>
            <div class="input-group mb-2">
              <input type="number" v-model="form.budget_upashirshakh" class="form-control" />
            </div>
            <small class="text-danger">{{ form.errors.first("budget_upashirshakh") }}</small>
          </div>

          <div class="form-group col-lg-6">
            <label>बजेट स्रोत</label>
            <!-- <input type="text" v-model="form.budget_source" class="form-control" /> -->
            <select v-model="form.budget_source" class="custom-select">
              <option value="">Please Select One</option>
              <template v-for="source in budgetSources">
                <option :value="source.title" :key="source.id">{{ source.title }}</option>
              </template>
            </select>
            <small class="text-danger">{{ form.errors.first("budget_source") }}</small>
          </div>
          <div class="form-group col-lg-6">
            <label for="">खर्च उपशीर्षक न.(ख.उ.शी.न.)</label>
            <div class="input-group mb-2">
              <input type="number" v-model="form.expenditure_upashirshakh" class="form-control" />
            </div>
            <small class="text-danger">{{ form.errors.first("expenditure_upashirshakh") }}</small>
          </div>

          <div class="form-group col-lg-6">
            <label>खर्च किसिम छान्नुहोस्</label>
            <select v-model="form.expenditure_type" class="custom-select">
              <option value="पुँजीगत खर्च">पुँजीगत खर्च</option>
              <option value="चालु खर्च">चालु खर्च</option>
            </select>
            <small class="text-danger">{{ form.errors.first("expenditure_type") }}</small>
          </div>

          <div class="form-group col-lg-12 ml-3">
            <input class="form-check-input" type="checkbox" value="" id="chk_box">
            <label class="form-check-label" for="flexCheckDefault">
              Default checkbox
            </label>
          </div>

          <div class="col-12 row" id="chk">
            <div class="form-group col-lg-6">
              <label for="">गत आर्थिक वर्षको खर्च</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">रु.</div>
                </div>
                <input type="number" v-model="form.last_year_expenditure" class="form-control" />
              </div>
              <small class="text-danger">{{ form.errors.first("last_year_expenditure") }}</small>
            </div>

            <div class="form-group col-lg-6">
              <label>गत आर्थिक वर्षको भौतिक प्रगति(%) </label>
              <div class="input-group mb-2">
                <input type="number" v-model="form.last_year_physical_progress" class="form-control" />
                <div class="input-group-prepend">
                  <div class="input-group-text">%</div>
                </div>
              </div>
              <small class="text-danger">{{ form.errors.first("last_year_physical_progress") }}</small>
            </div>

            <div class="form-group col-lg-6">
              <label>लाभाम्वित हुने जनसंख्या</label>
              <input type="text" v-model="form.population_to_be_benefited" class="form-control" />
              <small class="text-danger">{{ form.errors.first("population_to_be_benefited") }}</small>
            </div>
          </div>

          <div class="form-group col-lg-12">
            <label>विवरण</label>
            <!-- <textarea  cols="30" rows="10" class="form-control"></textarea> -->
            <vue-editor v-model="form.description"></vue-editor>
            <small class="text-danger">{{ form.errors.first("description") }}</small>
          </div>
          <button class="btn btn-primary z-depth-0">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Form from "form-backend-validation";
import { VueEditor } from "vue2-quill-editor";

export default {
  components: {
    VueEditor,
  },
  props: {
    organizations: {
      default: () => ({}),
    },
    projectTypes: {
      default: () => ({}),
    },

    project: {
      default: () => ({}),
    },
    budgetSources: {
      default: () => ({}),
    },
  },

  data() {
    return {

      updateMode: false,
      form: new Form(
        {
          title: "",
          organization_id: "",
          project_type_id: "",
          budget: "",
          budget_source: "",
          expenditure_type: "",
          last_year_expenditure: "",
          last_year_physical_progress: "",
          population_to_be_benefited: "",
          description: "",
          budget_upashirshakh: "",
          expenditure_upashirshakh: "",

        },
        {
          resetOnSuccess: false,
        }
      ),
    };
  },
  mounted() {
    if (this.project.id) {
      this.updateMode = true;
      this.form.title = this.project.title;
      this.form.organization_id = this.project.organization_id;
      this.form.project_type_id = this.project.project_type_id;
      this.form.budget = this.project.budget;
      this.form.budget_source = this.project.budget_source;
      this.form.expenditure_type = this.project.expenditure_type;
      this.form.last_year_expenditure = this.project.last_year_expenditure;
      this.form.last_year_physical_progress = this.project.last_year_physical_progress;
      this.form.population_to_be_benefited = this.project.population_to_be_benefited;
      this.form.description = this.project.description;
      this.form.budget_upashirshakh = this.project.budget_upashirshakh;
      this.form.expenditure_upashirshakh = this.project.expenditure_upashirshakh;

    }
  },

  methods: {
    submit() {
      this.updateMode ? this.update() : this.create();
    },

    create() {
      this.form.post("/project").then((response) => {
        this.$swal(response.message).then(() => (window.location.href = "/project"));
      });
    },

    update() {
      this.form.put(`/project/${this.project.id}`).then((response) => {
        this.$swal(response.message).then(() => (window.location.href = `/project/${this.project.id}`));
      });
    },
  },

};

</script>

<style>
  #chk{
    display: none;
  }
</style>